<?php

namespace App\Filament\Resources\TicketResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Ticket;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Mail\AdminReplyMail;
use App\Jobs\SendAdminReplyEmail;
use Illuminate\Support\Facades\Mail;
use Filament\Resources\RelationManagers\RelationManager;

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
                        $ticket = $record->ticket; 

                        if (!empty($ticket->email)) {
                            SendAdminReplyEmail::dispatch(
                                $ticket,
                                $data['message'],   
                                $ticket->email      
                            );
                        }
                    })

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
