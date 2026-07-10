<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('General Information')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                Select::make('parent_id')
                                    ->label('Parent Category')
                                    ->relationship('parent', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->placeholder('None'),

                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $set('slug', Str::slug($state));
                                    }),

                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),

                            ]),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),

                    ]),

                Section::make('Images')
                    ->schema([

                        Grid::make(2)
                            ->schema([

                                FileUpload::make('image')
                                    ->label('Category Image')
                                    ->disk('public')
                                    ->directory('categories')
                                    ->image()
                                    ->imageEditor(),

                                FileUpload::make('banner')
                                    ->label('Category Banner')
                                    ->disk('public')
                                    ->directory('categories')
                                    ->image()
                                    ->imageEditor(),

                            ]),

                    ]),

                Section::make('Settings')
                    ->schema([

                        Grid::make(3)
                            ->schema([

                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),

                                Toggle::make('is_featured')
                                    ->default(false),

                                Toggle::make('is_active')
                                    ->default(true),

                            ]),

                    ]),

                Section::make('SEO')
                    ->collapsible()
                    ->collapsed()
                    ->schema([

                        TextInput::make('meta_title')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->rows(3),

                        Textarea::make('meta_keywords')
                            ->rows(3)
                            ->helperText('Separate keywords with commas.'),

                    ]),

            ]);
    }
}
