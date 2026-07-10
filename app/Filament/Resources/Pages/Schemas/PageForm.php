<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Tabs::make('Page')

                    ->tabs([

                        Tabs\Tab::make('General')

                            ->schema([

                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', \Illuminate\Support\Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                                RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),

                            ]),

                        Tabs\Tab::make('SEO')

                            ->schema([

                                TextInput::make('meta_title'),

                                Textarea::make('meta_description'),

                                Textarea::make('meta_keywords'),

                            ]),

                        Tabs\Tab::make('Settings')

                            ->schema([

                                Toggle::make('is_active')
                                    ->default(true),

                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),

                            ]),

                    ])

                    ->columnSpanFull(),

            ]);
    }
}
