<?php

// app/Models/AccessRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRequest extends Model
{
    use HasFactory;

    protected $table = 'access_requests'; // Nama tabel di database

    protected $fillable = [
        'user_id',  // ID Pengguna
        'access_type', // Jenis Akses
        'reason', // Alasan pengajuan
        'status', // Status permintaan
    ];

    // Jika ingin mendefinisikan relasi, misalnya jika 'user_id' mengacu ke model User:
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

