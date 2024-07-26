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
            background-color: #f0f0f0;
            margin: 0;
        }
        .status-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 300px;
        }
        .status-card.approved {
            border: 2px solid #28a745;
        }
        .status-card.declined {
            border: 2px solid #dc3545;
        }
        .status-card h1 {
            font-size: 2rem;
            margin: 0;
        }
        .status-card p {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .status-card .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .status-card.approved .button {
            background-color: #28a745;
        }
        .status-card.declined .button {
            background-color: #dc3545;
        }
        .status-card .button:hover {
            background-color: #0056b3;
        }
        .status-card .additional-info {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="status-card {{ $restaurant->request_status == 0 ? 'declined' : 'approved' }}">

        @if ($restaurant->request_status == 1)

            <p> Dear {{ $restaurant->name }} </p>,
            <p class="additional-info"> We are pleased to inform you that your restaurant, {{ $restaurant->name }}, has been approved! </p>
            <p class="additional-info"> Thank you for your patience. We are excited to welcome you to our platform and look forward to a successful partnership. </p>
            <p class="additional-info"> If you have any questions or need further assistance, feel free to reach out to us. </p>
            
            <a href="javascript:void(0)" class="button">Go to Dashboard</a>
            
            <p> Best regards,<br>
            The E-waiting Team </p>
        

        @elseif ($restaurant->request_status == 0)

            <p> Dear {{ $restaurant->name }}, </p>
            <p class="additional-info"> We regret to inform you that your restaurant, {{ $restaurant->name }}, has not been approved at this time. </p>
            <p class="additional-info"> Please review our guidelines and make any necessary adjustments before reapplying. If you have any questions or need feedback on your application, please contact us. </p>
            <p class="additional-info"> Thank you for your interest, and we hope to have the opportunity to work with you in the future. </p>
            
            <a href="javascript:void(0)" class="button">Go to Dashboard</a>

            <p> Best regards,<br>
            The E-waiting Team </p>

        @endif

    </div>
</body>
</html>