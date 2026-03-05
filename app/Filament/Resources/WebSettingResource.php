<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebSettingResource\Pages;
use App\Models\WebSetting;
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

class WebSettingResource extends Resource
{
    protected static ?string $model = WebSetting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Web Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Website')
                    ->schema([
                        TextInput::make('nama_web')->required()->default('RVPS Studio'),
                        FileUpload::make('logo')->image()->directory('settings')->label('Logo Web (Kecil)'),
                    ])->columns(2),

                Section::make('Pengaturan Hero Banner & Slideshow')
                    ->schema([
                        TextInput::make('hero_judul')->required(),
                        Textarea::make('hero_deskripsi')->required()->rows(2),
                        FileUpload::make('hero_slideshow')
                            ->label('Background Slideshow (Bisa pilih banyak foto sekaligus)')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->directory('hero')
                            ->columnSpanFull(),
                    ]),

                Section::make('Ubah Judul Bagian (Section)')
                    ->schema([
                        TextInput::make('judul_section_store')->label('Judul Store')->default('Produk Unggulan RVPS Store'),
                        TextInput::make('judul_section_blog')->label('Judul Blog')->default('Catatan & Tutorial Terbaru'),
                        TextInput::make('judul_section_portfolio')->label('Judul Galeri')->default('Momen & Aktivitas'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->square()->defaultImageUrl(url('https://ui-avatars.com/api/?name=RVPS')),
                TextColumn::make('nama_web')->searchable(),
                TextColumn::make('hero_judul')->limit(30),
            ])
            ->actions([Tables\Actions\EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebSettings::route('/'),
            'create' => Pages\CreateWebSetting::route('/create'),
            'edit' => Pages\EditWebSetting::route('/{record}/edit'),
        ];
    }
}