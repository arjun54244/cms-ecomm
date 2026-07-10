<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Order Items';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('product_name')
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->square()
                    ->defaultImageUrl(url('/images/placeholder.png')),

                TextColumn::make('product_name')
                    ->label('Product')
                    ->searchable()
                    ->description(fn($record) => $record->product_slug),

                TextColumn::make('price')
                    ->label('Unit Price')
                    ->money('INR'),

                TextColumn::make('quantity')
                    ->numeric(),

                TextColumn::make('total')
                    ->money('INR')
                    ->weight('bold'),
            ])
            // Order items are a permanent record of what was purchased —
            // never editable, creatable, or deletable from the admin panel.
            ->headerActions([])
            ->recordActions([])
            ->toolbarActions([]);
    }

    public function isReadOnly(): bool
    {
        return true;
    }
}