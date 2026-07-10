<?php

namespace App\Filament\Resources\Testimonials\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->disk('public')
                ->circular(),

            TextColumn::make('name')
                ->searchable()
                ->sortable(),

            TextColumn::make('designation'),

            TextColumn::make('company'),

            TextColumn::make('rating')
                ->badge()
                ->color('warning'),

            IconColumn::make('is_featured')
                ->boolean(),

            IconColumn::make('is_active')
                ->boolean(),

            TextColumn::make('sort_order'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
