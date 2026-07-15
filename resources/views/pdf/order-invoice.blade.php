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

        /* ── Header ── */
        .header {
            width: 100%;
            border-bottom: 2px solid #111827;
            padding-bottom: 16px;
            margin-bottom: 20px;
        }
        .header table { width: 100%; border-collapse: collapse; }
        .store-name {
            font-size: 20px;
            font-weight: bold;
            color: #111827;
        }
        .store-meta {
            font-size: 10px;
            color: #6b7280;
            margin-top: 4px;
            line-height: 1.6;
        }
        .invoice-title {
            font-size: 22px;
            font-weight: bold;
            text-align: right;
            color: #111827;
            letter-spacing: 2px;
        }
        .invoice-meta {
            text-align: right;
            color: #4b5563;
            font-size: 11px;
            margin-top: 4px;
            line-height: 1.6;
        }

        /* ── Billing / Payment sections ── */
        .section { width: 100%; margin-bottom: 20px; }
        .section table { width: 100%; }
        .section-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 12px 14px;
        }
        .label {
            font-size: 9px;
            text-transform: uppercase;
            color: #6b7280;
            letter-spacing: 0.8px;
            margin-bottom: 4px;
        }
        .value { font-size: 11px; color: #111827; line-height: 1.6; }

        /* ── Items table ── */
        table.items {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table.items thead th {
            background: #111827;
            color: #ffffff;
            text-align: left;
            padding: 9px 10px;
            font-size: 10px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        table.items thead th.text-right { text-align: right; }
        table.items tbody tr:nth-child(even) td { background: #f9fafb; }
        table.items tbody td {
            padding: 9px 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 11px;
            vertical-align: top;
        }
        table.items tbody td.text-right { text-align: right; }
        .variant-pill {
            display: inline-block;
            background: #e5e7eb;
            color: #374151;
            border-radius: 3px;
            padding: 2px 7px;
            font-size: 9px;
            margin-top: 3px;
            margin-right: 3px;
        }

        /* ── Totals ── */
        table.totals {
            width: 260px;
            float: right;
            margin-top: 14px;
            border-collapse: collapse;
        }
        table.totals td { padding: 5px 8px; font-size: 12px; }
        table.totals td.label-cell { color: #6b7280; }
        table.totals td.value-cell { text-align: right; color: #111827; }
        table.totals tr.grand-total td {
            border-top: 2px solid #111827;
            font-weight: bold;
            font-size: 14px;
            padding-top: 10px;
        }

        /* ── Badges ── */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .badge-paid    { background: #d1fae5; color: #065f46; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-failed  { background: #fee2e2; color: #991b1b; }
        .badge-cod     { background: #dbeafe; color: #1e40af; }

        /* ── Status bar ── */
        .status-bar {
            background: #111827;
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 11px;
        }
        .status-bar table { width: 100%; border-collapse: collapse; color: #fff; }

        /* ── Footer ── */
        .footer {
            margin-top: 60px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
            font-size: 10px;
            color: #9ca3af;
            text-align: center;
            clear: both;
        }
        .clearfix::after { content: ""; display: table; clear: both; }
    </style>
</head>
<body>
<div class="container">

    {{-- ── HEADER ── --}}
    <div class="header">
        <table>
            <tr>
                <td style="width:55%; vertical-align:top;">
                    <div class="store-name">{{ $settings?->site_name ?? config('app.name') }}</div>
                    <div class="store-meta">
                        @if($settings?->address) {{ $settings->address }}<br>@endif
                        @if($settings?->email) {{ $settings->email }}<br>@endif
                        @if($settings?->phone) {{ $settings->phone }}@endif
                    </div>
                </td>
                <td style="width:45%; vertical-align:top;">
                    <div class="invoice-title">INVOICE</div>
                    <div class="invoice-meta">
                        Order: <strong>#{{ $order->order_number }}</strong><br>
                        Date: {{ optional($order->created_at)->format('d M Y') }}<br>
                        @if($order->paid_at)
                            Paid At: {{ $order->paid_at->format('d M Y, h:i A') }}
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

    {{-- ── STATUS BAR ── --}}
    <div class="status-bar">
        <table>
            <tr>
                <td>
                    Order Status:
                    <strong>{{ ucfirst($order->status) }}</strong>
                </td>
                <td>
                    Payment:
                    <strong>{{ strtoupper($order->payment_method) }}</strong>
                </td>
                <td style="text-align:right;">
                    Payment Status:
                    <strong>{{ ucfirst($order->payment_status) }}</strong>
                </td>
            </tr>
        </table>
    </div>

    {{-- ── BILLING & PAYMENT ── --}}
    <div class="section clearfix">
        <table>
            <tr>
                <td style="width:50%; padding-right:10px; vertical-align:top;">
                    <div class="section-box">
                        <div class="label">Billed To</div>
                        <div class="value">
                            <strong>{{ $order->customer_name }}</strong><br>
                            {{ $order->address }}<br>
                            {{ $order->city }}, {{ $order->state }} {{ $order->postal_code }}<br>
                            {{ $order->country }}<br>
                            {{ $order->email }}<br>
                            {{ $order->phone }}
                        </div>
                    </div>
                </td>
                <td style="width:50%; padding-left:10px; vertical-align:top;">
                    <div class="section-box">
                        <div class="label">Payment Details</div>
                        <div class="value">
                            Method:
                            <span class="badge {{ $order->payment_method === 'cod' ? 'badge-cod' : 'badge-paid' }}">
                                {{ strtoupper($order->payment_method) }}
                            </span><br><br>
                            Status:
                            <span class="badge {{ $order->payment_status === 'paid' ? 'badge-paid' : ($order->payment_status === 'failed' ? 'badge-failed' : 'badge-pending') }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                            @if($order->razorpay_payment_id)
                                <br><br>Payment ID:<br>
                                <span style="font-size:9px; color:#6b7280;">{{ $order->razorpay_payment_id }}</span>
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    {{-- ── ITEMS TABLE ── --}}
    <table class="items">
        <thead>
            <tr>
                <th style="width:45%;">Product</th>
                <th style="width:15%;">Variant</th>
                <th class="text-right" style="width:15%;">Unit Price</th>
                <th class="text-right" style="width:10%;">Qty</th>
                <th class="text-right" style="width:15%;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>
                        @if($item->selected_size)
                            <span class="variant-pill">Size: {{ $item->selected_size }}</span>
                        @endif
                        @if($item->selected_color)
                            <span class="variant-pill">Color: {{ $item->selected_color }}</span>
                        @endif
                        @if(!$item->selected_size && !$item->selected_color)
                            <span style="color:#9ca3af;">—</span>
                        @endif
                    </td>
                    <td class="text-right">&#8377;{{ number_format($item->price, 2) }}</td>
                    <td class="text-right">{{ $item->quantity }}</td>
                    <td class="text-right">&#8377;{{ number_format($item->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ── TOTALS ── --}}
    <div class="clearfix">
        <table class="totals">
            <tr>
                <td class="label-cell">Subtotal</td>
                <td class="value-cell">&#8377;{{ number_format($order->subtotal, 2) }}</td>
            </tr>
            <tr>
                <td class="label-cell">Shipping</td>
                <td class="value-cell">
                    {{ (float) $order->shipping_charge > 0 ? '&#8377;' . number_format($order->shipping_charge, 2) : 'Free' }}
                </td>
            </tr>
            @if ((float) $order->discount > 0)
                <tr>
                    <td class="label-cell">Discount</td>
                    <td class="value-cell">- &#8377;{{ number_format($order->discount, 2) }}</td>
                </tr>
            @endif
            @if ((float) $order->tax > 0)
                <tr>
                    <td class="label-cell">Tax</td>
                    <td class="value-cell">&#8377;{{ number_format($order->tax, 2) }}</td>
                </tr>
            @endif
            <tr class="grand-total">
                <td class="label-cell">Grand Total</td>
                <td class="value-cell">&#8377;{{ number_format($order->grand_total, 2) }}</td>
            </tr>
        </table>
    </div>

    {{-- ── CUSTOMER NOTE ── --}}
    @if($order->customer_note)
        <div style="margin-top: 80px; clear:both; border:1px solid #e5e7eb; border-radius:6px; padding:10px 14px;">
            <div class="label">Customer Note</div>
            <div class="value">{{ $order->customer_note }}</div>
        </div>
    @endif

    {{-- ── FOOTER ── --}}
    <div class="footer">
        This is a computer-generated invoice for order #{{ $order->order_number }} and does not require a signature.
        @if($settings?->site_name) | {{ $settings->site_name }} @endif
    </div>

</div>
</body>
</html>