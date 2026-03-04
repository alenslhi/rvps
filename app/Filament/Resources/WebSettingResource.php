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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas Website')
                    ->schema([
                        TextInput::make('nama_web')->label('Nama Brand / Web')->required()->default('RVPS Studio'),
                    ]),
                Section::make('Pengaturan Hero Banner')
                    ->schema([
                        TextInput::make('hero_judul')->required(),
                        Textarea::make('hero_deskripsi')->required()->rows(3),
                        FileUpload::make('hero_gambar')->image()->directory('settings'),
                    ]),
                Section::make('Pengaturan Footer (Jam Layanan)')
                    ->schema([
                        TextInput::make('jam_senin_kamis')->label('Senin - Kamis')->required(),
                        TextInput::make('jam_jumat')->label('Jumat')->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('hero_gambar')->square(),
                TextColumn::make('nama_web')->searchable(),
                TextColumn::make('hero_judul')->limit(30),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWebSettings::route('/'),
            'create' => Pages\CreateWebSetting::route('/create'),
            'edit' => Pages\EditWebSetting::route('/{record}/edit'),
        ];
    }
}