<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPdf;

class OrderInvoiceService
{
    public function generate(Order $order): DomPdf
    {
        $order->loadMissing('items');

        $settings = Setting::getSettings();

        return Pdf::loadView('pdf.order-invoice', [
            'order'    => $order,
            'settings' => $settings,
        ])->setPaper('a4');
    }

    /**
     * The filename used for the downloaded invoice.
     */
    public function filename(Order $order): string
    {
        return 'invoice-' . $order->order_number . '.pdf';
    }
}
