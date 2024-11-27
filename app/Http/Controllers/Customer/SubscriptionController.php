<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index($slug)
    {
        $paket = null;

        // Menggunakan switch-case untuk meningkatkan readability
        switch ($slug) {
            case 'paket-basic':
                $paket = 'basic';
                break;
            case 'paket-premium':
                $paket = 'premium';
                break;
            case 'paket-eksklusif':
                $paket = 'eksklusif';
                break;
            default:
                // Jika slug tidak sesuai, bisa redirect atau set $paket sebagai null
                return redirect()->route('home')->with('error', 'Paket tidak ditemukan.');
        }

        // Mengecek apakah ada pesanan dengan alamat pengiriman NULL
        $checkOrder = Order::where('user_id', Auth::user()->id)->where('shipping_address', NULL)->first();

        if ($checkOrder) {
            return redirect()->route('orders.index')->with('error', 'Anda masih memiliki pesanan yang belum lengkap.');
        }

        // Mengembalikan tampilan dengan data paket
        return view('pages.customers.subscription.index', compact('paket'));
    }


    public function store(Request $request, $paket)
    {
        $request->validate([
            'bukti-pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:10024',
        ], [
            'bukti-pembayaran.required' => 'Bukti pembayaran harus diupload.',
            'bukti-pembayaran.file' => 'Bukti pembayaran harus berupa file.',
        ]);

        if ($request->hasFile('bukti-pembayaran')) {
            $file = $request->file('bukti-pembayaran');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('bukti-pembayaran', $fileName, 'public');
            $validatedData['bukti_pembayaran'] = str_replace('public/', '', $filePath);
        } 

        $total_price = 0;

        if ($paket == 'basic') {
            $total_price = 199000;
        } else if ($paket == 'premium') {
            $total_price = 299000;
        } else if ($paket == 'eksklusif') {
            $total_price = 499000;
        }

        $orders = new Order();
        $orders->user_id = auth()->user()->id;
        $orders->total_price = $total_price;
        $orders->status = 'pending';
        $orders->save();
        
        $payments = new Payment();
        $payments->order_id = $orders->id;
        $payments->receipt_image = $validatedData['bukti_pembayaran'];
        $payments->transactions_date = now();
        $payments->save();

        return redirect()->route('home.index')->with('success', 'Pembayaran berhasil dikirimkan.');
    }
}
