<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;

class SubscriptionController extends Controller
{
    public function index()
    {
        $pendingOrders = Order::where('shipping_address', NULL)->where('status', 'pending')->with(['user', 'payment'])->latest()->paginate(10);
        
        return view('pages.admin.subscription.index', compact('pendingOrders'));
    }

    public function approve(String $id)
    {
        $order = Order::find($id);

        $order->status = "completed";
        $order->save();

        $payment = Payment::where('order_id', $order->id)->first();

        $payment->payment_status = "paid";
        $payment->save();

        $user = User::find($order->user_id);

        $user->subscription_status = 1;
        $user->save();

        $type = NULL;

        if ($order->total_price == 199000) {
            $type = 'basic';
        } else if ($order->total_price == 299000) {
            $type = 'premium';
        } else if ($order->total_price == 499000) {
            $type = 'eksklusif';
        }

        $subscription = new Subscription();
        $subscription->user_id = $order->user_id;
        $subscription->subscriptions_type = $type;
        $subscription->status = "active";
        $subscription->start_date = now();
        $subscription->end_date = $subscription->start_date->addDays(30);
        $subscription->save();

        return redirect()->route('dashboard.subscriptions.index')->with('success', 'Langganan pengguna berhasil disetujui.');
    }

    public function reject(String $id)
    {
        $order = Order::find($id);

        $order->status = "rejected";
        $order->save();

        $payment = Payment::where('order_id', $order->id)->first();

        $payment->payment_status = "failed";
        $payment->save();
        
        return redirect()->route('dashboard.subscriptions.index')->with('success', 'Langganan pengguna berhasil ditolak.');
    }
}
