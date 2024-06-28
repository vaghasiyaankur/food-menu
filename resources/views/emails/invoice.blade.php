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
            background-image: url("http://127.0.0.1:8000/images/main-bg.png");
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
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 600;
            line-height: 22px;
            text-align: left;
            color: #38373D;
            text-transform: capitalize;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
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
            <div class="text-center invoice-content">
                <p>Invoice: #{{ $order->id }} </p>
                <p>Created Date: {{ $order->created_at->format('d-m-Y') }} </p>
                <p>Total: {{ $setting->currency_symbol }}{{ number_format($order->payable_amount,2) }}
                </p>
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
                <p>Sub Total: ({{count($orderProduct)}} items)</p>
                <p>{{ $setting->currency_symbol }}{{ number_format($order->total_price,2) }}</p>
            </div>
            <div class="invoice-tax">
                <p>Discount</p>
                <p>{{ $setting->currency_symbol }}{{ number_format($order->discount_amount, 2) }}</p>
            </div>
            <hr>
            <div class="invoice-total-amount">
                <p>Total</p>
                <p>{{ $setting->currency_symbol }}{{ number_format($order->payable_amount, 2) }}</p>
            </div>
        </div>
    </main>
    <footer class="text-center">
        <p>{{ $setting->bill_footer }}</p>
    </footer>
</body>
</html>