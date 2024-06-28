<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            font-family: Inter;
        }
        body {
            min-height: 100dvh;
            padding: 70px 30px 75px;
            background-image: url('file://{{ public_path("images/main-bg.png") }}');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            /* background-position: center; */
            background-color: rgba(250, 250, 250, 1);
            /* background-color: black; */
        }
        .text-left {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
        .company-logo {
            max-width: 105px;
            max-height: 100px;
            width: 100%;
            height: 100%;
            margin: 0 auto 10px;
        }
        .company-logo img {
            max-width: 105px;
            max-height: 100px;
            width: 100%;
            height: 100%;
        }
        .invoice-header{
            margin: 10px 0 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .invoice-header hr {
            width: 100%;
            border: none;
            border-top: 1px solid rgba(153, 153, 153, 0.4);
        }
        .biller-content h2 {
            font-size: 22px;
            font-weight: 600;
            line-height: 27px;
            color: #38373D;
            text-transform: capitalize;
        }
        .biller-content p {
            margin-top: 10px;
            font-size: 15px;
            font-weight: 400;
            line-height: 18px;
            color: #38373D;
            text-transform: capitalize;
        }
        .invoice-content {
            width: 100%;
            margin: 10px 0;
            font-size: 18px;
            font-weight: 600;
            line-height: 22px;
            text-align: left;
            color: #38373D;
            text-transform: capitalize;
        }
        .invoice-content span{
            display: inline-block;
        }
        .invoice-content span:first-child {
            width: 220px;
        }
        .invoice-content span:nth-child(2) {
            text-align: center;
            width: 300px;
        }
        .invoice-content span:last-child {
            text-align: right;
            width: 220px;
        }
        .invoice-order {
            margin-top: 30px;
        }
        .invoice-order table.table-items {
            border-collapse: collapse;
            border: none;
            border-radius: 5px;
        }
        /* .invoice-order table.table-items thead {
            border-bottom: 10px solid transparent;
        } */
        .invoice-order table.table-items thead tr {
            background-color: rgba(243, 62, 62, 0.8);
            color: #fff;
        }
        .invoice-order table.table-items thead tr th {
            padding: 13px 15px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            line-height: 19px;
            text-align: left;
            color: #fff;
        }
        .invoice-order table.table-items thead tr th:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
        .invoice-order table.table-items thead tr th:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .invoice-order table.table-items tbody {
            background-color: #fff;
        }
        .invoice-order table.table-items tbody tr td {
            border: none;
            padding: 10px 15px;
            font-size: 15px;
            font-weight: 400;
            line-height: 18px;
            text-align: left;
            color: #38373D;
        }
        .invoice-order table.table-items tbody tr:first-child td {
            padding-top: 15px;
        }
        .invoice-order table.table-items tbody tr:first-child td:first-child {
            border-top-left-radius: 5px;
        }
        .invoice-order table.table-items tbody tr:first-child td:last-child {
            border-top-right-radius: 5px;
        }
        .invoice-order table.table-items tbody tr:last-child td {
            padding-bottom: 15px;
        }
        .invoice-order table.table-items tbody tr:last-child td:first-child {
            border-bottom-left-radius: 5px;
        }
        .invoice-order table.table-items tbody tr:last-child td:last-child {
            border-bottom-right-radius: 5px;
        }
        .invoice-order table.table-items thead tr th:not(:first-child),
        .invoice-order table.table-items tbody tr td:not(:first-child) {
            text-align: right;
        }
        .invoice-data {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            background-color: #fff;
            font-size: 16px;
            font-weight: 600;
            line-height: 19px;
            text-align: left;
            color: #38373D;
        }
        .invoice-data .invoice-sub-total,
        .invoice-data .invoice-tax,
        .invoice-data .invoice-total-amount {
        }
        .invoice-data .invoice-sub-total span,
        .invoice-data .invoice-tax span,
        .invoice-data .invoice-total-amount span{
            display: inline-block;
        }
        .invoice-data .invoice-sub-total span:first-child,
        .invoice-data .invoice-tax span:first-child,
        .invoice-data .invoice-total-amount span:first-child{
            width: 355px;
        }
        .invoice-data .invoice-sub-total span:last-child,
        .invoice-data .invoice-tax span:last-child,
        .invoice-data .invoice-total-amount span:last-child {
            width: 355px;
            text-align: right;
        }
        .invoice-data .invoice-tax {
            margin: 15px 0;
        }
        .invoice-data hr {
            width: 100%;
            border: none;
            border-top: 1px dashed rgba(153, 153, 153, 0.5);
        }
        .invoice-data .invoice-total-amount {
            margin-top: 15px;
        }
        footer p {
            font-size: 22px;
            font-weight: 600;
            line-height: 27px;
            text-align: center;
            color: #000;
            margin: 40px auto 0;
            text-transform: capitalize
        }
        .footer-divider{
            border-top: 2px dashed #878A99;
            border-bottom: 2px dashed #878A99;
            border-left: none;
            border-right: none;
            padding : 2px;
        }
        .table-items{
            width: 100%;
        }
        .table-items, .table-items th, .table-items td{
            border: 1px solid #878A99;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        <div class="text-center company-logo">
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/'.$restaurant->logo))) }}">
        </div>
        <div class="invoice-header">
            <div class="text-center biller-content">
                <h2>{{ $setting->bill_header }}</h2>
                <p>{{ $setting->address }}</p>
            </div>
        </div>

        <hr>
        <div class="invoice">
            <div class="text-center invoice-content">
                <span>Invoice: #{{ $order->id }} </span>
                <span>Created Date: {{ $order->created_at->format('d-m-Y') }} </span>
                <span>Total: {{ $setting->currency_symbol }}{{ number_format($order->payable_amount,2) }}</span>
            </div>
        <hr>
    </header>
    <main>
        <div class="invoice-order">
            <div class="invoice-table">
                <table class="table table-items">
                    <thead>
                        <tr>
                            <th>Item Description</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orderProduct as $orderPro)
                            <tr>
                                <td>{{$orderPro->product->productRestaurantLanguages[0]->name}}</td>
                                <td>{{$orderPro->quantity}}</td>
                                <td>{{ $setting->currency_symbol }} {{ number_format($orderPro->price, 2) }}</td>
                                <td>{{ $setting->currency_symbol }} {{ number_format($orderPro->total_price, 2) }}</td>
                            </tr>                            
                        @empty
                            <tr>
                                <td colspan="4">No Item Found !!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="invoice-data">
            <div class="invoice-sub-total">
                <span>Sub Total: ({{count($orderProduct)}} items)</span>
                <span>{{ $setting->currency_symbol }}{{ number_format($order->total_price,2) }}</span>
            </div>
            <div class="invoice-tax">
                <span>Discount</span>
                <span>{{ $setting->currency_symbol }}{{ number_format($order->discount_amount, 2) }}</span>
            </div>
            <hr>
            <div class="invoice-total-amount">
                <span>Total</span>
                <span>{{ $setting->currency_symbol }}{{ number_format($order->payable_amount, 2) }}</span>
            </div>
        </div>
    </main>
    <footer class="text-center">
        <p>{{ $setting->bill_footer }}</p>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set the background image dynamically
            var imagePath = atob(atob('/images/main-bg.png'));
            document.body.style.backgroundImage = 'url(' + imagePath + ')';
        });
    </script>
</body>
</html>