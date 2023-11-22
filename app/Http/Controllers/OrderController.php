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

        // dd($request->all());

        $request->validate([
            'orderer_name' => 'required',
            'phone' => 'required_if:delivery-option,delivery', // Only required for delivery
            'address' => 'required_if:delivery-option,delivery', // Only required for delivery
            'productId' => 'required',
            'qty' => 'required',
            'amount' => 'required',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Create a new order record
            $order = Order::create([
                'orderer_name' => $request->input('orderer_name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'status' => 'not success', // You may set a default status here
            ]);

            // Extract product IDs, quantities, and amounts from the form data
            $productIds = explode(',', $request->input('productId'));
            $quantities = explode(',', $request->input('qty'));
            $amounts = explode(',', $request->input('amount'));

            // Loop through the products and create order details records
            foreach ($productIds as $key => $productId) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'qty' => $quantities[$key],
                    'total_price' => $amounts[$key],
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Redirect or respond with a success message
            return redirect()->route('success-page')->with('success', 'Order placed successfully');
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();

            // Log the error or handle it appropriately
            return redirect()->back()->with('error', 'Error processing the order. Please try again.');
        }
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
