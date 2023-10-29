<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class PaytrController extends Controller
{
    private $merchantId = '199119';
    private $merchantKey = 'X4W6sNbmDoyhysXJ';
    private $merchantSalt = 'nELJReLoTZ6aUu4T';




    public function createPayment(Request $request)
    {
        // Ödeme bilgilerini alın
        $amount = $request->input('amount');
        $email = $request->input('email');

        // Token oluşturun
        $token = $this->generateToken($amount, $email);

        // Ödeme formunu döndürün
        return view('payment_form', ['token' => $token]);
    }

    private function generateToken($amount, $email)
    {
        // Parametreleri hazırlayın
        $params = [
            'merchant_id' => $this->merchantId,
            'user_ip' => $_SERVER['REMOTE_ADDR'],
            'merchant_oid' => time(),
            'email' => "abdullahsunnu42@gmail.com",
            'payment_amount' => $amount + 100, // Kuruş cinsinden
            'user_basket' => base64_encode(json_encode([])),
            'debug_on' => 1,
            'no_installment' => 1,
            'max_installment' => 1,
            'currency' => 'TL',
            'test_mode' => 1,
        ];

        // Hash oluşturun
        $hash = base64_encode(hash_hmac('sha256', implode('|', $params) . $this->merchantSalt, $this->merchantKey, true));
        $params['paytr_token'] = $hash;

        // Token isteği gönderin
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response);
        
        if ($result->status == 'success') {
            return $result->token;
        } else {
            throw new \Exception('Token oluşturma başarısız: ' . $result->reason);
        }
    }

    public function handleIpn(Request $request)
    {
        $merchant_oid = $request->input('merchant_oid');
        $status = $request->input('status');
        $total_amount = $request->input('total_amount');
        $hash = $request->input('hash');

        // Gelen hash'i kontrol edin
        $hash_check = base64_encode(hash_hmac('sha256', $this->merchantId . $merchant_oid . $status . $total_amount, $this->merchantKey, true));

        if ($hash_check != $hash) {
            // Hash doğrulanamazsa, hatalı bir bildirim olarak kabul edin
            return response('INVALID_HASH', 400);
        }

        // Ödeme durumunu kontrol edin
        if ($status == 'success') {
            // Ödeme başarılı olduysa, siparişinizi güncelleyin
            // Siparişinizi burada güncelleyin: Ödeme tamamlandı, sipariş durumunu "ödendi" olarak güncelleyin
        } elseif ($status == 'failed') {
            // Ödeme başarısız olduysa, siparişinizi güncelleyin
            // Siparişinizi burada güncelleyin: Ödeme başarısız oldu, sipariş durumunu "ödenmedi" olarak güncelleyin
        } else {
            // Geçersiz bir durum değeri alındığında
            return response('INVALID_STATUS', 400);
        }

        // IPN işlemi başarıyla tamamlandığında "OK" döndürün
        return response('OK', 200);

        // Ödeme durumunu kontrol edin
    if ($status == 'success') {
        // Ödeme başarılı olduysa, siparişinizi güncelleyin
        $order = Order::where('merchant_oid', $merchant_oid)->first();
        if ($order) {
            $order->status = 'paid';
            $order->save();
        }
    } elseif ($status == 'failed') {
        // Ödeme başarısız olduysa, siparişinizi güncelleyin
        $order = Order::where('merchant_oid', $merchant_oid)->first();
        if ($order) {
            $order->status = 'unpaid';
            $order->save();
        }
    } else {
        // Geçersiz bir durum değeri alındığında
        return response('INVALID_STATUS', 400);
    }

    // IPN işlemi başarıyla tamamlandığında "OK" döndürün
    return response('OK', 200);
    }



}
