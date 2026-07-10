<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('General')
                    ->schema([

                        TextInput::make('site_name')
                            ->required(),

                        TextInput::make('site_tagline'),

                    ])
                    ->columns(2),

                Section::make('Payment Settings')
                    ->schema([
                        Toggle::make('enable_cod')
                            ->label('Enable Cash on Delivery (COD)')
                            ->default(false),
                    ])
                    ->columns(1),

                Section::make('Branding')
                    ->schema([

                        FileUpload::make('logo')
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->image(),

                        FileUpload::make('favicon')
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->image(),

                    ])
                    ->columns(2),
                Section::make('Homepage Banners')
                    ->schema([
                        FileUpload::make('banners')
                            ->label('Homepage Banners')
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->downloadable()
                            ->previewable()
                            ->disk('public')
                            ->maxFiles(10)
                            ->helperText('Upload hero banners for the homepage.'),
                    ]),

                Section::make('Contact')
                    ->schema([

                        TextInput::make('email')
                            ->email(),

                        TextInput::make('phone'),

                        TextInput::make('whatsapp'),

                        Textarea::make('address')
                            ->columnSpanFull(),
                        Textarea::make('google_map_embed')
                            ->label('Google Maps Embed URL')
                            ->rows(3)
                            ->helperText('Paste the Google Maps embed URL (the URL from the iframe src attribute).')
                            ->placeholder('https://www.google.com/maps/embed?...')
                            ->columnSpanFull(),

                    ])
                    ->columns(3),

                Section::make('Social Media')
                    ->schema([

                        TextInput::make('facebook')
                            ->url(),

                        TextInput::make('instagram')
                            ->url(),

                        TextInput::make('youtube')
                            ->url(),

                        TextInput::make('linkedin')
                            ->url(),

                        TextInput::make('twitter')
                            ->url(),

                    ])
                    ->columns(2),

                Section::make('Footer')
                    ->schema([

                        Textarea::make('footer_description'),

                        TextInput::make('copyright')->label('header note'),

                    ]),

                Section::make('SEO')
                    ->schema([

                        TextInput::make('meta_title'),

                        Textarea::make('meta_description'),

                        TagsInput::make('meta_keywords'),

                    ]),

            ]);
    }
}
