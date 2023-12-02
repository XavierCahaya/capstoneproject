<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{

    public function checkout(Request $request)
    {
        $arrayId = json_decode($request->input('array_id'));
        $arrayName = json_decode($request->input('array_name'));
        $arrayQty = json_decode($request->input('array_qty'));
        $arraySubtotal = json_decode($request->input('array_subtotal'));
        $totalSubtotal = intval(array_sum($arraySubtotal)) * 1000;

        $itemDetails = array();

        // Perulangan untuk memasukkan nilai ke dalam item_details
        foreach ($arrayId as $key => $id) {
            $price = intval($arraySubtotal[$key]) * 1000;
            $quantity = intval($arrayQty[$key]);

            // Memastikan quantity tidak nol untuk menghindari pembagian oleh nol
            $quantity = max(1, $quantity);

            // Memasukkan data ke dalam item_details
            $itemDetails[] = array(
                'id' => $id,
                'price' => $price / $quantity,
                'quantity' => $quantity,
                'name' => $arrayName[$key],
            );
        }

        $totalPrice = 0;
        foreach ($itemDetails as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        $statusPembayaran = ($request->input('payment_option') == 'non-tunai') ? 'pending' : 'capture';

        $deliveryOption = $request->input('delivery_option');
        $phone = null;
        $address = null;

        if ($deliveryOption == 'delivery') {
            $phone = $request->input('phone');
            $address = $request->input('address');
        }

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalPrice,
            ),

            'item_details' => $itemDetails,

            'customer_details' => array(
                'first_name' => $request->input('orderer_name'),
                'phone' => $phone,
                'billing_address' => array(
                    'address' => $address
                ),
            ),
            'callbacks' => [
                'finish' => "http://127.0.0.1:8000/webhooks/midtrans",
            ]
        );


        if ($request->input('payment_option') === 'tunai') {
            $order = Order::create([
                'delivery_option' => $deliveryOption,
                'orderer_name' => $request->input('orderer_name'),
                'phone' => $phone,
                'address' => $address,
                'total_price' => $totalPrice,
                'payment_option' => $request->input('payment_option'),
                'status_pembayaran' => $statusPembayaran,
            ]);

            $orderDetails = $this->createOrderDetails(
                $order->id,
                $arrayId,
                $arrayName,
                $arrayQty,
                $arraySubtotal
            );

            $order->orderDetails()->saveMany($orderDetails);

            return redirect()->route('product')->with('message', 'Pemesanan Berhasil, silahkan cek pesanan anda pada halaman "Cek Pesanan"');
        }

        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);

        $response = json_decode($response->body());


        $redirectURL = $response->redirect_url;

        $order = Order::create([
            'delivery_option' => $deliveryOption,
            'order_id' => $params['transaction_details']['order_id'],
            'orderer_name' => $request->input('orderer_name'),
            'phone' => $phone,
            'address' => $address,
            'total_price' => $totalPrice,
            'payment_option' => $request->input('payment_option'),
            'checkout_link' =>  $redirectURL,
            'status_pembayaran' => $statusPembayaran,
        ]);


        $orderDetails = $this->createOrderDetails(
            $order->id,
            $arrayId,
            $arrayName,
            $arrayQty,
            $arraySubtotal
        );

        $order->orderDetails()->saveMany($orderDetails);

        return redirect()->away($response->redirect_url);

    }

    private function createOrderDetails($orderId, $arrayId, $arrayName, $arrayQty, $arraySubtotal)
    {
        $orderDetails = [];

        // Create order details
        foreach ($arrayId as $key => $productId) {
            $orderDetails[] = new OrderDetail([
                'order_id' => $orderId,
                'product_id' => $productId,
                'name' => $arrayName[$key],
                'qty' => $arrayQty[$key],
                'subtotal' => number_format(floatval($arraySubtotal[$key]), 2, '.', '') * 1000,
            ]);
        }

        return $orderDetails;
    }

    public function webHook(Request $request){
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get("https://api.sandbox.midtrans.com/v2/{$request->order_id}/status");

        $response = json_decode($response->body());

        $payment = Order::where('order_id', $response->order_id)->first();

        if ($payment->status === 'settlement' || $payment->status === 'capture'){
            return response()->json(["status_code" => "200", "message" => "Pembayaran sudah diproses"]);
        }

        if ($response->transaction_status === 'capture') {
            $payment->status_pembayaran = 'capture';
        } else if($response->transaction_status === 'settlement'){
            $payment->status_pembayaran = 'settlement';
        }else if($response->transaction_status === 'pending'){
            $payment->status_pembayaran = 'pending';
        }

        $payment->save();

        // dd(session('success'));

        return redirect()->route('product')->with('success', 'Pembayaran Berhasil, silahkan cek pesanan anda pada halaman "Cek Pesanan"');

    }

}
