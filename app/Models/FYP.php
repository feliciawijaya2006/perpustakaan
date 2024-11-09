<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FYP extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'namapenulis',
        'tahunterbit',
        'doi',
        'jumlahhalaman',
    ];
}
