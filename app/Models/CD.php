<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'judulCD',
        'namapenerbit',
        'penciptacd',
        'tahunterbit',
        'harga',
        'stok',
    ];
}
