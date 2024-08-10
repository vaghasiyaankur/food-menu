<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #FFF0F0;
            margin: 0;
        }
        .status-card img{
            width: 180px;
            height: 180px;
        }
        .status-card {
            background: #FFFFFF;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            width: 820px;
            margin: 0 20px;
        }
        .status-card.declined {
            border: 2px solid #dc3545;
        }
        .status-card h1 {
            font-size: 2rem;
            margin: 0;
        }
        .status-card p {
            font-size: 22px;
            margin: 0;
            line-height: 30px;
            color: #333333;
            font-weight: 500;
        }
        .status-card .button {
            display: inline-block;
            padding: 13px 20px;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin: 20px 0 35px 0;
            box-shadow: 2.5px -2.5px 2px 0px #863E2026 inset, 1px 1px 4px 0px #8F716459;
        }
        .status-card.approved .button {
            background-color: #F33E3E;
        }
        .status-card.declined .button {
            background-color: #dc3545;
        }
        .status-card .button:hover {
            background-color: #F33E3E;
        }
        .status-card .additional-info {
            font-size: 18px;
            color: #666;
            font-weight: 500;
            line-height: 28px;
            margin-bottom: 15px !important;
            max-width: 720px;
            margin: 0 auto;
        }
        .status-card .heading-main{
            font-size: 34px;
            font-weight: 600;
            margin-bottom: 40px;
            line-height: 40px;
            margin-top: 30px;
            color: #333333;
        }
        @media only screen and (max-width: 425px) {
            .status-card .heading-main{
                font-size: 26px;
                margin-bottom: 15px;
                margin-top: 20px;
                line-height: 34px;
            }
            .status-card{
                padding: 20px;
            }
            .status-card img{
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="status-card {{ $restaurant->request_status == 0 ? 'declined' : 'approved' }}">

        @if ($restaurant->request_status == 1)
            <img src="{{ asset('/storage/setting/3971_logo.png') }}" alt="">
            <p class="heading-main"> Dear {{ $restaurant->name }} </p>
            <p class="additional-info"> We are pleased to inform you that your restaurant, {{ $restaurant->name }}, has been approved! </p>
            <p class="additional-info"> Thank you for your patience. We are excited to welcome you to our platform and look forward to a successful partnership. </p>
            <p class="additional-info"> If you have any questions or need further assistance, feel free to reach out to us. </p>
            <a href="{{ route('admin') }}" class="button">Go to Dashboard</a>
            <p> Best regards, The E-waiting Team </p>

        @elseif ($restaurant->request_status == 0)

            <p> Dear {{ $restaurant->name }}, </p>
            <p class="additional-info"> We regret to inform you that your restaurant, {{ $restaurant->name }}, has not been approved at this time. </p>
            <p class="additional-info"> {{ $restaurant->declined_reason }} </p>
            <p class="additional-info"> Please review our guidelines and make any necessary adjustments before reapplying. If you have any questions or need feedback on your application, please contact us. </p>
            <p class="additional-info"> Thank you for your interest, and we hope to have the opportunity to work with you in the future. </p>
            
            <p> Best regards,<br>
            The E-waiting Team </p>

        @endif

    </div>
</body>
</html>