<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Verification</title>
    <style>
        .text-center{
            text-align: center;
        }
        .restro-name h2{
            font-size: 30px;
            color: #38373D;
            font-weight: 600;
            margin: 15px 0 0;
        }
        .restro-name p{
            font-size: 18px;
            color: #6B6B6B;
            font-weight: 600;
            margin: 15px 0 30px;
        }
        .main {
            width:700px; 
            margin: auto;
            background : #fff6f2; 
            padding: 25px; 
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="text-center">
            <img src="{{ $message->embed('storage/'.$restaurant->logo) }}" alt="Logo" width="100" height="100">
        </div>
        <div class="text-center restro-name">
            <h2>{{ $restaurant->name }}</h2>
            <p>code- {{$restaurant->restaurant_code}}</p>
        </div>
        <div>
            <h3>Dear {{ $restaurant->name }} Team,</h3>
            <p>I am writing to confirm the details of my restaurant, {{ $restaurant->name }}, as we prepare to enhance our presence on your esteemed food delivery platform. Ensuring that our information is accurately listed is crucial for us to provide excellent service and to meet the expectations of our customers seamlessly.</p>
            <p><b>Please verify the following details of {{ $restaurant->name }}:</b></p>
            <p><b>• Address:</b> {{ $restaurant->location }}</p>
            <p><b>• Phone Number:</b> {{ $user->mobile_number }}</p>
            <p>Should there be any discrepancies, or if updates are required, kindly allow me to make the necessary adjustments through my profile dashboard or inform me of the alternative procedure to update our information.</p>
            <p><b>Contact Information:</b></p>
            <p>For any further queries or immediate assistance, please feel free to contact me directly:</p>
            <p><b>• Email:</b> {{ $user->email }}</p>
            <p><b>• Phone:</b> {{ $user->mobile_number }}</p>
        </div>
    </div>
</body>
</html>