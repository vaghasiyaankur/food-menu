<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h3, p, a{
            color: #000000;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <img src="{{ $message->embed('storage/' . $restaurant->logo) }}" alt="Logo" style="width:100%; max-width:150px;">
    </div>
    <h3>Dear {{ $order->name }},</h3>
    <p>I hope this email finds you well.</p>
    <p>Attached to this email, you will find the invoice for your recent order with <b> {{ $setting->restaurant_name }}</b>. We appreciate your business and trust you had a pleasant experience with our service.</p>
    <p>If you have any questions regarding this invoice or need further assistance, please feel free to contact us at <a href="tel:{{ $setting->phone_number }}">{{ $setting->phone_number }}</a>.</p>
    <p>We appreciate your prompt payment and look forward to serving you again.</p>
    <p>Warm regards,<br>
    {{ Auth::user()->name }}<br>
    {{ Auth::user()->role }}<br>
    {{ $restaurant->name }}</p>
</body>
</html>