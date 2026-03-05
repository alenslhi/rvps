<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Produk')
                    ->schema([
                        TextInput::make('nama_produk')->required(),
                        TextInput::make('kategori')->required()->placeholder('Ketik kategori bebas... (Misal: Jasa Web)'),
                        TextInput::make('harga')->numeric()->required(),
                        TextInput::make('stok')->numeric()->default(0)->required()->label('Jumlah Stok'),
                        Textarea::make('deskripsi_singkat')->required()->columnSpanFull(),
                    ])->columns(2),

                Section::make('Media & Galeri')
                    ->schema([
                        FileUpload::make('gambar')
                            ->label('Gambar Utama (Cover)')
                            ->image()
                            ->directory('produk')
                            ->required(),
                        FileUpload::make('galeri_produk')
                            ->label('Galeri Tambahan (Bisa upload banyak)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('produk-detail'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')->square(),
                TextColumn::make('nama_produk')->searchable(),
                TextColumn::make('kategori')->badge(),
                TextColumn::make('stok')
                    ->badge()
                    ->color(fn (string $state): string => $state > 0 ? 'success' : 'danger'),
                TextColumn::make('harga')->money('IDR', locale: 'id'),
            ])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
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