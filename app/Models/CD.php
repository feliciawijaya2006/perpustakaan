<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
    use HasFactory;

    protected $table = 'cds';
    /**
     * fillable
     *
     * @var array
     * 
     */

    protected $fillable = [
        'judulcd',
        'namapenerbit',
        'penciptacd',
        'tahunterbit',
        'harga',
        'stok',
    ];

        // @var string
        // protectes $table = 'Book';
    public $timestamps = false;

}
