<?php

namespace App\Services;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPdf;

class OrderInvoiceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function generate(Order $order): DomPdf
    {
        $order->loadMissing('items');

        return Pdf::loadView('pdf.order-invoice', [
            'order' => $order,
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
