<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ticket;
use App\Models\Pemohon;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Exports\TicketsExport;
use App\Models\LayananInformasi;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ExportAction;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use App\Filament\Exports\TicketExporter;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Maatwebsite\Excel\Excel as ExcelWriter;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\TicketResource\Pages;
use Filament\Actions\Exports\Enums\ExportFormat;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Filament\Resources\TicketResource\RelationManagers\CommentsRelationManager;
use Filament\Tables\Actions\ExportBulkAction;

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
                    ->required()
                    ->reactive(),

                TextInput::make('tujuan_permohonan_informasi')
                    ->label('Tujuan Permohonan Informasi')
                    ->visible(function (callable $get) {
                        return optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))->name === 'Permohonan Informasi';
                    }),

                Select::make('master_kat_informasi_id')
                    ->relationship('kategoriInformasi', 'name')
                    ->label('Cara Memperoleh Informasi')
                    ->required()
                    ->reactive()
                    ->visible(function (callable $get) {
                        return optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))->name === 'Permohonan Informasi';
                    }),

                TextInput::make('tujuan_keberatan')
                    ->label('Tujuan Mengajukan Keberatan')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengajuan Keberatan'
                    ),

                CheckboxList::make('kategoriKeberatan')
                    ->relationship('kategoriKeberatan', 'name')
                    ->label('Alasan Mengajukan Keberatan')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))->name === 'Pengajuan Keberatan'
                    ),

                TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Select::make('master_kat_pemohon_id')
                    ->relationship('kategoriPemohon', 'name')
                    ->label('Kategori Pemohon')
                    ->required()
                    ->reactive(),
                TextInput::make('nomor_identitas')
                    ->label('Nomor Identitas')
                    ->required(),
                FileUpload::make('lampiran_identitas')
                    ->label('Lampiran Identitas')
                    ->directory('lampiran-identitas')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->maxSize(1024) // KB
                    ->required(),
                FileUpload::make('lampiran_akta')
                    ->label('Lampiran Akta Pendirian Badan Hukum')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg'])
                    ->directory('lampiran-akta')
                    ->maxSize(1024)
                    ->visible(
                        fn(callable $get) =>
                        in_array(
                            optional(\App\Models\Pemohon::find($get('master_kat_pemohon_id')))->name,
                            ['LSM/NGO', 'Instansi Pemerintah']
                        )
                    ),
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
                    ->required()
                    ->visible(
                        fn(callable $get) =>
                        optional(LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name !== 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Pejabat'
                    ),
                FileUpload::make('lampiran_dukung')
                    ->label('Lampiran Data Dukung')
                    ->directory('lampiran-dukung')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(1024)
                    ->nullable()
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name !== 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Mitra Kerja'
                            && optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name !== 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Pejabat'
                            && optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name !== 'Pengajuan Keberatan'
                    ),

                TextInput::make('nama_pejabat')
                    ->label('Nama Pejabat')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Pejabat'
                    ),
                TextInput::make('nama_mitra')
                    ->label('Nama Mitra')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Mitra Kerja'
                    ),

                TextInput::make('jabatan_pejabat')
                    ->label('Jabatan')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Pejabat'
                    ),
                TextInput::make('jabatan_mitra')
                    ->label('Jabatan')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Mitra Kerja'
                    ),

                Textarea::make('penyalahgunaan_pejabat')
                    ->label('Penyalahgunaan yang Dilakukan')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Pejabat'
                    ),
                Textarea::make('penyalahgunaan_mitra')
                    ->label('Penyalahgunaan yang Dilakukan')
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Mitra Kerja'
                    ),

                FileUpload::make('lampiran_bukti_pejabat')
                    ->label('Lampiran Bukti Berkas')
                    ->directory('lampiran-bukti')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'])
                    ->maxSize(1024)
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Pejabat'
                    ),
                FileUpload::make('lampiran_bukti_mitra')
                    ->label('Lampiran Bukti Berkas')
                    ->directory('lampiran-bukti')
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png', 'image/jpg'])
                    ->maxSize(1024)
                    ->visible(
                        fn(callable $get) =>
                        optional(\App\Models\LayananInformasi::find($get('master_layanan_informasi_id')))
                            ->name === 'Pengaduan Penyalahgunaan Wewenang / Pelanggaran Mitra Kerja'
                    ),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            CommentsRelationManager::class,
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_ticket')
                    ->label('Nomor Ticket')
                    ->searchable(),
                TextColumn::make('jenisLayanan.name')
                    ->label('Jenis Layanan')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable(),
                TextColumn::make('kategoriPemohon.name')
                    ->label('Kategori Pemohon')
                    ->searchable(),
                TextColumn::make('kategoriBidang.name')
                    ->label('Kategori Bidang')
                    ->searchable(),
                TextColumn::make('rincian_informasi')
                    ->limit(50)
                    ->label('Rincian Informasi')
                    ->searchable(),
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
                    })
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Updated At'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'in_progress' => 'Dalam Proses',
                        'closed' => 'Ditutup',
                    ]),
                SelectFilter::make('master_layanan_informasi_id')
                    ->label('Jenis Layanan')
                    ->relationship('jenisLayanan', 'name'),
                SelectFilter::make('master_kat_pemohon_id')
                    ->label('Kategori Pemohon')
                    ->relationship('kategoriPemohon', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('close')
                    ->label('Close Ticket')
                    ->icon('heroicon-o-lock-closed')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->visible(fn($record) => $record->status !== 'closed')
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'closed',
                        ]);
                    }),
            ])

            // ->headerActions([
            //     ExportAction::make()
            //         ->exports([
            //             ExcelExport::make()
            //                 ->fromTable() // langsung ambil data dari tabel
            //                 ->askForFilename() // bisa tanya nama file
            //                 ->withFilename(fn() => 'tickets-' . now()->format('Y-m-d')) // default filename
            //         ]),
            // ])

            // ->headerActions([
            //     ExportAction::make('export')
            //         ->label('Export Excel')
            //         ->icon('heroicon-o-arrow-down-tray')
            //         ->exports([
            //             ExcelExport::make()
            //                 ->fromTable() // ambil kolom & formatting dari Table (ikut filter & search)
            //                 ->withWriterType(ExcelWriter::XLSX)
            //                 ->withFilename(fn() => 'tickets-' . now()->format('Y-m-d_H-i')),
            //             // ->only([...]) atau ->except([...]) kalau mau batasi kolom
            //             // ->modifyQueryUsing(fn ($query) => $query->where('status', 'open'))
            //         ]),
            // ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(TicketExporter::class),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()->exporter(TicketExporter::class),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'edit' => Pages\EditTicket::route('/{record}/edit'),
            'view' => Pages\ViewTicket::route('/{record}'),
        ];
    }
}
