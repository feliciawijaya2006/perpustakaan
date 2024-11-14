<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Newspapers extends Model
{
    use HasFactory;

    protected $table = 'newspapers';
    /**
     * fillable
     *
     * @var array
     * 
     */

    protected $fillable = [
        'tanggalterbit',
        'namapenerbit',
        'harga',
        'stok',
    ];

        // @var string
        // protectes $table = 'Book';
    public $timestamps = false;
}
