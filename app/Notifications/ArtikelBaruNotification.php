<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ArtikelBaruNotification extends Notification
{
    use Queueable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function via($notifiable)
    {
        return ['database']; // Menyimpan notifikasi ke dalam tabel database
    }

    public function toArray($notifiable)
    {
        // 1. Penentuan Judul & Kategori Karya secara dinamis
        $judul = $this->item->judul 
              ?? $this->item->istilah 
              ?? $this->item->teks 
              ?? $this->item->nama 
              ?? 'Karya Baru';

        $kategori = strtoupper($this->item->kategori ?? 'AJARAN BARU');

        return [
            'item_id'    => $this->item->id ?? null,
            'kategori'   => $kategori,
            'created_at' => now()->format('d M Y, H:i'),
            'title'      => 'Artikel Baru Diterbitkan',
            'judul'      => $judul,
            'url'        => url('/'),
        ];
    }
}