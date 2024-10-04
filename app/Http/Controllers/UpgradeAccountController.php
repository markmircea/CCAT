<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class UpgradeAccountController extends Controller
{
    public function show()
    {
        return Inertia::render('UpgradeAccount', [
            'paypalClientId' => config('services.paypal.client_id'),
        ]);
    }

    public function process(Request $request)
    {
        $request->validate([
            'paypal_order_id' => 'required|string',
        ]);

        $orderId = $request->input('paypal_order_id');

        // Verify the PayPal payment
        $response = Http::withBasicAuth(config('services.paypal.client_id'), config('services.paypal.secret'))
        ->withOptions([
            'verify' => false, // Only use this for local development!
        ])
        ->get("https://api-m.sandbox.paypal.com/v2/checkout/orders/{$orderId}");
        
        if ($response->successful() && $response['status'] === 'COMPLETED') {
            $user = $request->user();
            $user->has_paid_subscription = true;
            $user->subscription_started_at = now();
            $user->save();

            return redirect()->route('dashboard')->with('success', 'Your account has been successfully upgraded!');
        }

        return back()->with('error', 'There was an error processing your payment. Please try again.');
    }
}