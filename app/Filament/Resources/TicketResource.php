<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ticket;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TicketResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TicketResource\RelationManagers;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        do {
            $nomorTicket = str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (\App\Models\Ticket::where('nomor_ticket', $nomorTicket)->exists());

        $data['nomor_ticket'] = $nomorTicket;

        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('master_layanan_informasi_id')
                    ->relationship('jenisLayanan', 'name')
                    ->label('Kategori Layanan Informasi')
                    ->required(),

                TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Select::make('master_kat_pemohon_id')
                    ->relationship('kategoriPemohon', 'name')
                    ->label('Kategori Pemohon')
                    ->required(),
                TextInput::make('nomor_identitas')
                    ->label('Nomor Identitas')
                    ->required(),
                FileUpload::make('lampiran_identitas')
                    ->label('Lampiran Identitas')
                    ->directory('lampiran-identitas')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->maxSize(1024) // KB
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('no_telepon')
                    ->label('No. Handphone')
                    ->required(),
                Textarea::make('alamat')
                    ->required(),
                Select::make('master_kat_bidang_id')
                    ->relationship('kategoriBidang', 'name')
                    ->label('Kategori Bidang')
                    ->required(),
                Textarea::make('rincian_informasi')
                    ->label('Rincian Informasi')
                    ->required(),
                FileUpload::make('lampiran_dukung')
                    ->label('Lampiran Data Dukung')
                    ->directory('lampiran-dukung')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(1024) // KB
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_ticket')
                    ->label('Nomor Ticket'),
                TextColumn::make('jenisLayanan.name')
                    ->label('Jenis Layanan'),
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap'),
                TextColumn::make('kategoriPemohon.name')
                    ->label('Kategori Pemohon'),
                TextColumn::make('kategoriBidang.name')
                    ->label('Kategori Bidang'),
                TextColumn::make('rincian_informasi')
                    ->limit(50)
                    ->label('Rincian Informasi'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match ($state) {
                        'in_progress' => 'warning',
                        'closed' => 'danger',
                        default => 'secondary',
                    })
                    ->formatStateUsing(fn(string $state) => match ($state) {
                        'in_progress' => 'Dalam Proses',
                        'closed' => 'Ditutup',
                        default => 'Tidak Diketahui',
                    }),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Updated At'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
        ];
    }
}
