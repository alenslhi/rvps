<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater; // <-- INI YANG KURANG TADI
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user'; // Ikon user

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Utama')
                    ->schema([
                        TextInput::make('nama_lengkap')->required(),
                        TextInput::make('peran')->required()->placeholder('Misal: Laravel Developer'),
                        TextInput::make('nim')->label('NIM / Identitas')->placeholder('Misal: F52123032'),
                        TextInput::make('usia')->label('Usia')->placeholder('Misal: 21'),
                        Textarea::make('bio_singkat')->required()->rows(4),
                        FileUpload::make('foto_profil')->image()->directory('profil'),
                    ])->columns(2),
                    
                Section::make('Kontak & Lokasi')
                    ->schema([
                        TextInput::make('alamat')->placeholder('Misal: Palu, Sulawesi Tengah'),
                        TextInput::make('email')->email(),
                        TextInput::make('whatsapp')->tel()->placeholder('Mulai dengan 62...'),
                    ])->columns(2),

                Section::make('Riwayat Pendidikan & Pengalaman')
                    ->schema([
                        Repeater::make('pendidikan')
                            ->label('Riwayat Pendidikan')
                            ->schema([
                                TextInput::make('institusi')->required()->placeholder('Misal: Universitas Tadulako'),
                                TextInput::make('tahun')->required()->placeholder('Misal: 2023 - Sekarang'),
                                Textarea::make('deskripsi')->required()->rows(2),
                            ])->columns(2)->columnSpan(1),

                        Repeater::make('pengalaman')
                            ->label('Pengalaman Organisasi / Kerja')
                            ->schema([
                                TextInput::make('posisi')->required()->placeholder('Misal: Web Developer Freelance'),
                                TextInput::make('tahun')->required()->placeholder('Misal: Jan 2026 - Sekarang'),
                                Textarea::make('deskripsi')->required()->rows(2),
                            ])->columns(2)->columnSpan(1),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto_profil')->circular(),
                TextColumn::make('nama_lengkap')->searchable(),
                TextColumn::make('peran'),
                TextColumn::make('alamat'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}