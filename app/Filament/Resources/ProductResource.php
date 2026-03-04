<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Section::make('Informasi Produk')
                ->schema([
                    TextInput::make('nama_produk')->required(),
                    Select::make('kategori')
                        ->options([
                            'Source Code' => 'Source Code',
                            'Jasa Web' => 'Jasa Pembuatan Web',
                            'Bot WhatsApp' => 'Bot WhatsApp',
                            'Desain UI/UX' => 'Desain UI/UX',
                        ])->required(),
                    TextInput::make('harga')
                        ->numeric()
                        ->prefix('Rp')
                        ->placeholder('Misal: 150000'),
                    Textarea::make('deskripsi_singkat')->required()->rows(3),
                ])->columnSpan(2),
                
            Section::make('Gambar Produk')
                ->schema([
                    FileUpload::make('gambar')->image()->directory('produk')->required(),
                ])->columnSpan(1),
        ])->columns(3);
}

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            ImageColumn::make('gambar')->square(),
            TextColumn::make('nama_produk')->searchable(),
            TextColumn::make('kategori')->badge(),
            TextColumn::make('harga')->money('IDR', locale: 'id'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
