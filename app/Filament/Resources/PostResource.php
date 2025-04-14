<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Toggle, Textarea, RichEditor, FileUpload, DateTimePicker, TagsInput};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, IconColumn, ImageColumn, TagsColumn, ToggleColumn};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
{
    return $form
        ->schema([
            TextInput::make('title')
    ->required()
    ->live(onBlur: true)
    ->afterStateUpdated(function ($state, callable $set) {
        $set('slug', \Str::slug($state));
    }),
            
            TextInput::make('slug')
                ->disabled()
                ->required(),

            Textarea::make('excerpt')
                ->rows(3)
                ->placeholder('A short summary for previews...'),

            RichEditor::make('content')
                ->required()
                ->columnSpanFull(),

            TextInput::make('category')
                ->placeholder('e.g., Dev Notes, Faith, Projects'),

            TagsInput::make('tags'),

            FileUpload::make('featured_image')
                ->directory('blog-images')
                ->image()
                ->imageEditor()
                ->nullable(),

            Toggle::make('published')
                ->label('Publish this post?'),

            DateTimePicker::make('published_at')
                ->label('Publish Date')
                ->seconds(false)
                ->default(now()),
        ])
        ->columns(2);
}


public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            ImageColumn::make('featured_image')->square(),
            TextColumn::make('title')->searchable()->sortable(),
            TextColumn::make('category')->badge(),
            TagsColumn::make('tags'),
            ToggleColumn::make('published'),
            TextColumn::make('published_at')->dateTime()->sortable(),
        ])
        ->defaultSort('published_at', 'desc');
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
