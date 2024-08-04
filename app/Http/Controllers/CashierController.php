<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CashierController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('cashier.index', compact('orders'));
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->details = $request->input('details');
        $order->save();

        return redirect()->route('cashier.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('cashier.index');
    }
}
