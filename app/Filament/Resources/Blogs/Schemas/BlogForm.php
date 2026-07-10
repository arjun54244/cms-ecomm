<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Title and Slug')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->maxLength(255)
                            ->afterStateUpdated(function ($state, Set $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Textarea::make('short_description')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Publish')
                    ->schema([

                        Toggle::make('is_active')
                            ->default(true),

                        DateTimePicker::make('published_at')
                            ->seconds(false)
                            ->default(now()),

                    ])
                    ->columns(2),

                Section::make('General Information')
                    ->schema([

                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('blogs')
                            ->imageEditor()
                            ->columnSpanFull(),

                    ])
                    ->columnSpanFull(),

                Section::make('SEO')
                    ->schema([

                        TextInput::make('meta_title')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->rows(4)
                            ->columnSpanFull(),

                        Textarea::make('meta_keywords')
                            ->rows(3)
                            ->columnSpanFull(),

                    ]),



            ]);
    }
}