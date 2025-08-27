<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use App\Mail\AdminReplyMail;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Textarea::make('message')
                ->label('Pesan')
                ->required(),
            Forms\Components\FileUpload::make('attachment')
                ->label('Lampiran')
                ->directory('attachments/comments')
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('message')
            ->columns([
                Tables\Columns\TextColumn::make('sender_name')
                    ->label('Pengirim'),
                Tables\Columns\TextColumn::make('message')
                    ->label('Pesan')
                    ->limit(50),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->dateTime(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        // Tambah info pengirim admin
                        $data['sender'] = 'admin';
                        $data['sender_name'] = auth()->user()->name ?? 'Admin';
                        return $data;
                    })
                    ->after(function ($record, $data) {
                        // Kirim email setelah komentar tersimpan
                        $ticket = $record->ticket; // Ambil relasi ticket
                        if (!empty($ticket->email)) {
                            Mail::to($ticket->email)->send(
                                new AdminReplyMail($ticket, $data['message'])
                            );
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
