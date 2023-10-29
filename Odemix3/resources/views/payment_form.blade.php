<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Formu</title>
</head>
<body>
    <form method="post" action="https://www.paytr.com/odeme/guvenli">
        <input  name="merchant_id" value="{{ MERCHANT_ID }}" />
        <input  name="user_ip" value="{{ $_SERVER['REMOTE_ADDR'] }}" />
        <input type="hidden" name="merchant_oid" value="{{ time() }}" />
        <input type="hidden" name="email" value="{{ $email }}" />
        <input type="hidden" name="payment_amount" value="{{ $amount * 100 }}" />
        <input type="hidden" name="user_basket" value="{{ base64_encode(json_encode([])) }}" />
        <input type="hidden" name="debug_on" value="1" />
        <input type="hidden" name="no_installment" value="1" />
        <input type="hidden" name="max_installment" value="1" />
        <input type="hidden" name="currency" value="TL" />
        <input type="hidden" name="test_mode" value="1" />
        <input type="hidden" name="paytr_token" value="{{ $token }}" />

        <button type="submit">Ödemeyi Tamamla</button>
    </form>
</body>
</html>
