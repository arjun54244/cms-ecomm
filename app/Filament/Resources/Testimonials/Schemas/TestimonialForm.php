<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Testimonial')

                    ->schema([

                        Grid::make(2)

                            ->schema([

                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('designation'),

                                TextInput::make('company'),

                                Select::make('rating')
                                    ->options([
                                        5 => '★★★★★',
                                        4 => '★★★★☆',
                                        3 => '★★★☆☆',
                                        2 => '★★☆☆☆',
                                        1 => '★☆☆☆☆',
                                    ])
                                    ->default(5)
                                    ->required(),

                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('testimonials'),

                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),

                            ]),

                        Textarea::make('review')
                            ->rows(6)
                            ->required()
                            ->columnSpanFull(),

                        Grid::make(2)

                            ->schema([

                                Toggle::make('is_featured')
                                    ->default(true),

                                Toggle::make('is_active')
                                    ->default(true),

                            ])

                    ])

            ]);
    }
}
