<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class OrdersInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Overview')
                    ->columns(4)
                    ->schema([
                        TextEntry::make('order_number')
                            ->label('Order Number')
                            ->weight(FontWeight::Bold)
                            ->copyable(),
 
                        TextEntry::make('status')
                            ->label('Order Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending'    => 'gray',
                                'confirmed'  => 'info',
                                'processing' => 'warning',
                                'shipped'    => 'primary',
                                'delivered'  => 'success',
                                'cancelled'  => 'danger',
                                default      => 'gray',
                            }),
 
                        TextEntry::make('payment_status')
                            ->label('Payment Status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'paid'     => 'success',
                                'pending'  => 'warning',
                                'failed'   => 'danger',
                                'refunded' => 'gray',
                                default    => 'gray',
                            }),
 
                        TextEntry::make('created_at')
                            ->label('Placed At')
                            ->dateTime('d M Y, h:i A')
                            ->timezone('Asia/Kolkata'),
                    ]),
 
                Section::make('Customer & Shipping')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('customer_name')->label('Name'),
                        TextEntry::make('email')->label('Email')->copyable(),
                        TextEntry::make('phone')->label('Phone')->copyable(),
                        TextEntry::make('country')->label('Country'),
                        TextEntry::make('address')
                            ->label('Address')
                            ->columnSpanFull(),
                        TextEntry::make('city')->label('City'),
                        TextEntry::make('state')->label('State'),
                        TextEntry::make('postal_code')->label('Postal Code'),
                    ]),
 
                Section::make('Payment & Totals')
                    ->columns(3)
                    ->schema([
                        TextEntry::make('subtotal')
                            ->money('INR'),
                        TextEntry::make('shipping_charge')
                            ->label('Shipping')
                            ->money('INR'),
                        TextEntry::make('discount')
                            ->money('INR'),
                        TextEntry::make('tax')
                            ->money('INR'),
                        TextEntry::make('grand_total')
                            ->label('Grand Total')
                            ->weight(FontWeight::Bold)
                            ->money('INR'),
                        TextEntry::make('payment_method')
                            ->label('Payment Method')
                            ->badge(),
                        TextEntry::make('razorpay_order_id')
                            ->label('Razorpay Order ID')
                            ->copyable()
                            ->placeholder('—'),
                        TextEntry::make('razorpay_payment_id')
                            ->label('Razorpay Payment ID')
                            ->copyable()
                            ->placeholder('—'),
                        TextEntry::make('paid_at')
                            ->label('Paid At')
                            ->dateTime('d M Y, h:i A')
                            ->timezone('Asia/Kolkata')
                            ->placeholder('—'),
                    ]),
 
                Section::make('Notes')
                    ->columns(2)
                    ->collapsible()
                    ->schema([
                        TextEntry::make('customer_note')
                            ->label('Customer Note')
                            ->placeholder('—')
                            ->columnSpanFull(),
                        TextEntry::make('admin_note')
                            ->label('Admin Note')
                            ->placeholder('—')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
