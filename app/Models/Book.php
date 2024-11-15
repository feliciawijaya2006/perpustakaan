<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    /**
     * fillable
     *
     * @var array
     * 
     */
    protected $fillable = [
        'judulbuku',
        'namapenerbit',
        'jenisbuku',
        'tahunterbit',
        'harga',
        'stok',
    ];

        // @var string
        // protectes $table = 'Book';
    public $timestamps = false;

}
