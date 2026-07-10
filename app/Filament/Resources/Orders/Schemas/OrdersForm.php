<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrdersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Reference')
                    ->description('Read-only details captured at checkout.')
                    ->columns(3)
                    ->schema([
                        Placeholder::make('order_number')
                            ->label('Order Number')
                            ->content(fn ($record) => $record?->order_number),
                        Placeholder::make('customer_name')
                            ->label('Customer')
                            ->content(fn ($record) => $record?->customer_name),
                        Placeholder::make('grand_total')
                            ->label('Grand Total')
                            ->content(fn ($record) => $record ? '₹' . number_format((float) $record->grand_total, 2) : null),
                    ]),
 
                Section::make('Manage Order')
                    ->description('These are the only fields an admin should update after checkout.')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('status')
                                    ->label('Order Status')
                                    ->options([
                                        'pending'   => 'Pending',
                                        'confirmed' => 'Confirmed',
                                        'processing' => 'Processing',
                                        'shipped'   => 'Shipped',
                                        'delivered' => 'Delivered',
                                        'cancelled' => 'Cancelled',
                                    ])
                                    ->required()
                                    ->native(false),
 
                                Select::make('payment_status')
                                    ->label('Payment Status')
                                    ->options([
                                        'pending'  => 'Pending',
                                        'paid'     => 'Paid',
                                        'failed'   => 'Failed',
                                        'refunded' => 'Refunded',
                                    ])
                                    ->required()
                                    ->native(false),
                            ]),
 
                        Textarea::make('admin_note')
                            ->label('Admin Note')
                            ->rows(4)
                            ->columnSpanFull()
                            ->helperText('Internal note, not visible to the customer.'),
                    ]),
            ]);
    }
}
