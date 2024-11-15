<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRequest extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak menggunakan konvensi plural
    protected $table = 'access_requests';

    // Tentukan atribut yang dapat diisi (mass assignment)
    protected $fillable = [
        'student_name',
        'material_type',  // Misalnya: Buku, Jurnal, FYP, CD, Koran
        'status',         // Pending, Approved, Rejected
    ];

    // Tentukan atribut yang tidak boleh diisi secara massal (optional)
    protected $guarded = [];
}
