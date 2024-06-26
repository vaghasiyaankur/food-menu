<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .text-left {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .invoice-header{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .footer-divider{
            border-top: 2px dashed #878A99;
            border-bottom: 2px dashed #878A99;
            border-left: none;
            border-right: none;
            padding : 2px;
        }
    </style>
</head>
<body>
    <header>
        <div class="text-center">
            <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="Logo" style="width:100%; max-width:150px;">
        </div>
        <div class="invoice-header">
            <div class="text-left">
                <h2>{{ $setting->bill_header }}</h2>
                <p>{{ $setting->address }}</p>
            </div>
            <div class="text-right">
                <p>
                    Invoice: #{{ $order->id }} <br>
                    Created Date: {{ $order->created_at->format('d-m-Y') }} <br>
                    Total: {{ $setting->currency_symbol . $order->payable_amount }}
                </p>
            </div>
        </div>
    </header>
    <main>
        <div class="invoice-order">
            <div class="invoice-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="text-center">
        <p>{{ $setting->bill_footer }}</p>
        <hr class="footer-divider">
    </footer>
</body>
</html>