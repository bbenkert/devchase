<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

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
                    ->live()
                    ->afterStateUpdated(function (string $state, Set $set, Get $get): void {
                        if (! $get('slugManuallyEdited')) {
                            $set('slug', \Str::slug($state));
                        }
                    }),

                TextInput::make('slug')
                    ->required()
                    ->helperText('URL slug (e.g., my-first-post)')
                    ->afterStateUpdated(function (string $state, Set $set): void {
                        $set('slugManuallyEdited', true);
                    }),

                Hidden::make('slugManuallyEdited')
                    ->default(false)
                    ->dehydrated(false), // Don't store in DB

                Textarea::make('excerpt')
                    ->rows(3)
                    ->placeholder('A short summary for previews...'),

                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'h1', 'h2', 'h3', 'h4', 'h5', 'h6', // All heading levels
                        'bold', 'italic', 'underline', 'strike', 'superscript', 'subscript',
                        'link', 'blockquote', 'codeBlock', 'alignLeft', 'alignCenter', 'alignRight',
                        'bulletList', 'orderedList', 'table', 'image', 'video', 'horizontalRule',
                        'undo', 'redo',
                    ])
                    ->placeholder('Write your post content here...')
                    ->extraInputAttributes(['style' => 'min-height: 300px;']),
                TextInput::make('category')
                    ->placeholder('e.g., Dev Notes, Faith, Projects'),

                TagsInput::make('tags'),

                FileUpload::make('featured_image')
                    ->directory('blog-images')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('675')
                    ->optimize('webp')
                    ->imageQuality(85)
                    ->maxSize(5120) // 5MB max
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->preserveFilenames(false)
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
            // Add relations if needed
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
