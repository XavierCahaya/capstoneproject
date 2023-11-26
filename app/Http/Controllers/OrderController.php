<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{

    public function checkout(Request $request)
    {

        $arrayId = json_decode($request->input('array_id'));
        $arrayName = json_decode($request->input('array_name'));
        $arrayQty = json_decode($request->input('array_qty'));
        $arraySubtotal = json_decode($request->input('array_subtotal'));

        $deliveryOption = $request->input('delivery-option');
        $phone = null;
        $address = null;

        // Memeriksa nilai 'delivery-option'
        if ($deliveryOption == 'delivery') {
            // Jika 'delivery-option' adalah 'delivery', isi 'phone' dan 'address' dari request
            $phone = $request->input('phone');
            $address = $request->input('address');
        }

        // Create a new order
        $order = Order::create([
            'delivery-option' => $deliveryOption,
            'orderer_name' => $request->input('orderer_name'),
            'phone' => $phone,
            'address' => $address,
            'total_price' => number_format(floatval($request->input('total_price')), 2, '.', '') * 1000,
        ]);
        
        // Attach order details to the order
        $orderDetails = $this->createOrderDetails(
            $order->id, 
            $arrayId, 
            $arrayName, 
            $arrayQty, 
            $arraySubtotal);

        $order->orderDetails()->saveMany($orderDetails);

        // Redirect or respond as needed
        return redirect()->route('product')->with('message', 'Pemesanan Berhasil, silahkan cek pesanan anda pada halaman "Cek Pesanan"'); 
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

    /**
     * Display a listing of the resource.
     */
    public function masuk()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
