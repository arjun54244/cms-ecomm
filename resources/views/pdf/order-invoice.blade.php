<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $order->order_number }}</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 30px 40px;
        }
        .header {
            width: 100%;
            border-bottom: 2px solid #111827;
            padding-bottom: 16px;
            margin-bottom: 20px;
        }
        .header table {
            width: 100%;
            border-collapse: collapse;
        }
        .store-name {
            font-size: 20px;
            font-weight: bold;
            color: #111827;
        }
        .invoice-title {
            font-size: 22px;
            font-weight: bold;
            text-align: right;
            color: #111827;
        }
        .invoice-meta {
            text-align: right;
            color: #4b5563;
            font-size: 11px;
        }
        .section {
            width: 100%;
            margin-bottom: 20px;
        }
        .section table {
            width: 100%;
        }
        .label {
            font-size: 10px;
            text-transform: uppercase;
            color: #6b7280;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .value {
            font-size: 12px;
            color: #111827;
        }
        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.items thead th {
            background: #111827;
            color: #ffffff;
            text-align: left;
            padding: 8px 10px;
            font-size: 11px;
        }
        table.items thead th.text-right {
            text-align: right;
        }
        table.items tbody td {
            padding: 8px 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
            vertical-align: top;
        }
        table.items tbody td.text-right {
            text-align: right;
        }
        table.totals {
            width: 260px;
            float: right;
            margin-top: 14px;
            border-collapse: collapse;
        }
        table.totals td {
            padding: 5px 8px;
            font-size: 12px;
        }
        table.totals td.label-cell {
            color: #6b7280;
        }
        table.totals td.value-cell {
            text-align: right;
            color: #111827;
        }
        table.totals tr.grand-total td {
            border-top: 2px solid #111827;
            font-weight: bold;
            font-size: 14px;
            padding-top: 10px;
        }
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-paid {
            background: #d1fae5;
            color: #065f46;
        }
        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }
        .footer {
            margin-top: 60px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
            font-size: 10px;
            color: #9ca3af;
            text-align: center;
            clear: both;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <div class="store-name">{{ $settings->site_name }}</div>
                        <div class="value">{{ $settings->address }}</div>
                        <div class="value">{{ $settings->email }}</div>
                    </td>
                    <td style="width: 50%;">
                        <div class="invoice-title">INVOICE</div>
                        <div class="invoice-meta">
                            #{{ $order->order_number }}<br>
                            {{ optional($order->created_at)->format('d M Y') }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="section clearfix">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <div class="label">Billed To</div>
                        <div class="value"><strong>{{ $order->customer_name }}</strong></div>
                        <div class="value">{{ $order->address }}</div>
                        <div class="value">{{ $order->city }}, {{ $order->state }} {{ $order->postal_code }}</div>
                        <div class="value">{{ $order->country }}</div>
                        <div class="value">{{ $order->email }}</div>
                        <div class="value">{{ $order->phone }}</div>
                    </td>
                    <td style="width: 50%; vertical-align: top;">
                        <div class="label">Payment</div>
                        <div class="value">
                            Method: {{ ucfirst($order->payment_method) }}<br>
                            Status:
                            <span class="badge {{ $order->payment_status === 'paid' ? 'badge-paid' : 'badge-pending' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                            <br>
                            @if ($order->paid_at)
                                Paid At: {{ $order->paid_at->format('d M Y, h:i A') }}<br>
                            @endif
                            @if ($order->razorpay_payment_id)
                                Payment ID: {{ $order->razorpay_payment_id }}
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td class="text-right">&#8377;{{ number_format($item->price, 2) }}</td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">&#8377;{{ number_format($item->total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="clearfix">
            <table class="totals">
                <tr>
                    <td class="label-cell">Subtotal</td>
                    <td class="value-cell">&#8377;{{ number_format($order->subtotal, 2) }}</td>
                </tr>
                <tr>
                    <td class="label-cell">Shipping</td>
                    <td class="value-cell">&#8377;{{ number_format($order->shipping_charge, 2) }}</td>
                </tr>
                @if ($order->discount > 0)
                    <tr>
                        <td class="label-cell">Discount</td>
                        <td class="value-cell">- &#8377;{{ number_format($order->discount, 2) }}</td>
                    </tr>
                @endif
                <tr>
                    <td class="label-cell">Tax</td>
                    <td class="value-cell">&#8377;{{ number_format($order->tax, 2) }}</td>
                </tr>
                <tr class="grand-total">
                    <td class="label-cell">Grand Total</td>
                    <td class="value-cell">&#8377;{{ number_format($order->grand_total, 2) }}</td>
                </tr>
            </table>
        </div>

        <div class="footer">
            This is a computer-generated invoice for order {{ $order->order_number }} and does not require a signature.
        </div>

    </div>
</body>
</html>