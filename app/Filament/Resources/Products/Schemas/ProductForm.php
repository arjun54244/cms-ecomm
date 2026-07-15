<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Tabs::make('Product')

                    ->tabs([

                        /*
                        |--------------------------------------------------------------------------
                        | General
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('General')


                            ->schema([

                                Section::make()

                                    ->schema([

                                        Grid::make(2)

                                            ->schema([

                                                Select::make('category_id')
                                                    ->relationship('category', 'name')
                                                    ->searchable()
                                                    ->preload()
                                                    ->required(),

                                                TextInput::make('sku')
                                                    ->required()
                                                    ->unique(ignoreRecord: true),

                                                TextInput::make('name')
                                                    ->required()
                                                    ->live(onBlur: true)
                                                    ->afterStateUpdated(function ($state, callable $set) {
                                                        $set('slug', Str::slug($state));
                                                    }),

                                                TextInput::make('slug')
                                                    ->required()
                                                    ->unique(ignoreRecord: true),

                                            ]),

                                    ]),

                            ]),


                        Tabs\Tab::make('Pricing')


                            ->schema([

                                Grid::make(3)

                                    ->schema([

                                        TextInput::make('price')
                                            ->numeric()
                                            ->prefix('₹')
                                            ->required(),

                                        TextInput::make('sale_price')
                                            ->numeric()
                                            ->prefix('₹'),

                                        TextInput::make('cost_price')
                                            ->numeric()
                                            ->prefix('₹'),

                                    ]),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Inventory
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Inventory')


                            ->schema([

                                Grid::make(2)

                                    ->schema([

                                        TextInput::make('stock')
                                            ->numeric()
                                            ->default(0)
                                            ->required(),

                                        TextInput::make('weight')
                                            ->numeric()
                                            ->suffix('kg'),

                                    ]),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Images
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Images')


                            ->schema([

                                FileUpload::make('featured_image')

                                    ->disk('public')

                                    ->directory('products')

                                    ->image()

                                    ->imageEditor()

                                    ->required(),

                                Repeater::make('images')

                                    ->relationship()

                                    ->label('Gallery Images')

                                    ->reorderable()

                                    ->collapsible()

                                    ->schema([

                                        FileUpload::make('image')

                                            ->disk('public')

                                            ->directory('products/gallery')

                                            ->image()

                                            ->imageEditor()

                                            ->required(),

                                        TextInput::make('sort_order')
                                            ->numeric()
                                            ->default(0),

                                    ])

                                    ->defaultItems(0)

                                    ->addActionLabel('Add Image'),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Description
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Description')


                            ->schema([

                                Textarea::make('short_description')

                                    ->rows(4)

                                    ->columnSpanFull(),

                                RichEditor::make('description')

                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'h2',
                                        'h3',
                                        'link',
                                    ])

                                    ->columnSpanFull(),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Product Details
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Details')


                            ->schema([

                                Grid::make(3)

                                    ->schema([

                                        Select::make('gender')

                                            ->options([

                                                'Men' => 'Men',
                                                'Women' => 'Women',
                                                'Kids' => 'Kids',
                                                'Unisex' => 'Unisex',

                                            ])

                                            ->default('Unisex'),

                                        TextInput::make('fabric'),

                                        TextInput::make('fit'),

                                    ]),

                                Textarea::make('care_instruction')
                                    ->rows(4),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Variants (Sizes & Colors)
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Variants')

                            ->schema([

                                Grid::make(2)

                                    ->schema([

                                        CheckboxList::make('sizes')
                                            ->label('Available Sizes')
                                            ->options([
                                                'XS'   => 'XS — Extra Small',
                                                'S'    => 'S — Small',
                                                'M'    => 'M — Medium',
                                                'L'    => 'L — Large',
                                                'XL'   => 'XL — Extra Large',
                                                'XXL'  => 'XXL — Double XL',
                                                'XXXL' => 'XXXL — Triple XL',
                                            ])
                                            ->columns(2)
                                            ->helperText('Select all sizes this product is available in.'),

                                        TagsInput::make('colors')
                                            ->label('Available Colors')
                                            ->suggestions([
                                                'Red',
                                                'Pink',
                                                'Yellow',
                                                'Blue',
                                                'Green',
                                                'White',
                                                'Black',
                                                'Orange',
                                                'Purple',
                                                'Brown',
                                                'Grey',
                                                'Maroon',
                                                'Navy',
                                                'Beige',
                                            ])
                                            ->helperText('Type a color and press Enter, or pick from suggestions.'),

                                    ]),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | SEO
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('SEO')


                            ->schema([

                                TextInput::make('meta_title'),

                                Textarea::make('meta_description')
                                    ->rows(3),

                                Textarea::make('meta_keywords')
                                    ->rows(3),

                            ]),

                        /*
                        |--------------------------------------------------------------------------
                        | Settings
                        |--------------------------------------------------------------------------
                        */

                        Tabs\Tab::make('Settings')

                            ->schema([

                                Grid::make(3)

                                    ->schema([

                                        Toggle::make('is_featured'),

                                        Toggle::make('is_new'),

                                        Toggle::make('is_active')
                                            ->default(true),

                                    ]),

                            ]),

                    ])

                    ->columnSpanFull(),

            ]);
    }
}
