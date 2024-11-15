<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $table = 'journals';
    /**
     * fillable
     *
     * @var array
     * 
     */

    protected $fillable = [
        'juduljurnal',
        'namapembuat',
        'tahunterbit',
        'jumlahhalaman',
    ];

        // @var string
        // protectes $table = 'Book';
    public $timestamps = false;
    
}
