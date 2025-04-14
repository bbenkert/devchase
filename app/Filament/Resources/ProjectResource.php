<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\{TextInput, Textarea, TagsInput, FileUpload, Toggle, Grid};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, ToggleColumn, TagsColumn, ImageColumn};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
    
                    Toggle::make('is_featured')
                        ->label('Feature on homepage'),
                ]),
    
                Textarea::make('description')
                    ->rows(4)
                    ->maxLength(1000),
    
                TagsInput::make('tech_stack')
                    ->label('Tech Stack')
                    ->placeholder('e.g., Laravel, Tailwind, Livewire'),
    
                    FileUpload::make('screenshot')
                    ->image()
                    ->directory('project-screenshots')
                    ->disk('public')
                    ->imageEditor()
                    ->preserveFilenames()
                    ->label('Project Screenshot'),
    
                TextInput::make('demo_link')
                    ->url()
                    ->prefix('https://')
                    ->placeholder('https://your-project.live'),
    
                TextInput::make('github_link')
                    ->url()
                    ->prefix('https://github.com/')
                    ->placeholder('https://github.com/yourrepo'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            ImageColumn::make('screenshot')->square(),
            TextColumn::make('title')->sortable()->searchable(),
            TagsColumn::make('tech_stack'),
            ToggleColumn::make('is_featured'),
            TextColumn::make('updated_at')->label('Last Updated')->dateTime()->sortable(),
        ])
        ->defaultSort('updated_at', 'desc');
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
