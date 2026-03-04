<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Konten Tutorial')
                ->schema([
                    TextInput::make('judul')
                        ->required()
                        ->live(onBlur: true) // Agar otomatis trigger saat selesai ngetik judul
                        ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        
                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                        
                    Select::make('kategori')
                        ->options([
                            'Laravel' => 'Tutorial Laravel',
                            'Android' => 'Android Studio',
                            'Baileys' => 'Bot WhatsApp Baileys',
                            'Info' => 'Info Project',
                        ])->required(),
                        
                    RichEditor::make('konten')
                        ->required()
                        ->toolbarButtons([
                            'blockquote', 'bold', 'bulletList', 'codeBlock', 'h2', 'h3', 'italic', 'link', 'orderedList', 'redo', 'strike', 'undo',
                        ])
                        ->columnSpanFull(),
                ])->columnSpan(2),

            Section::make('Pengaturan Publikasi')
                ->schema([
                    FileUpload::make('thumbnail')
                        ->image()
                        ->directory('artikel')
                        ->required(),
                        
                    Toggle::make('is_published')
                        ->label('Publikasikan Artikel')
                        ->default(true),
                ])->columnSpan(1),
        ])->columns(3);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('thumbnail')->square(),
            TextColumn::make('judul')->searchable()->limit(40),
            TextColumn::make('kategori')->badge(),
            IconColumn::make('is_published')->boolean(),
            TextColumn::make('created_at')->dateTime('d M Y')->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
