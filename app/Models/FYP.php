<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FYP extends Model
{
    use HasFactory;

    protected $table = 'fyps';
    /**
     * fillable
     *
     * @var array
     * 
     */

    protected $fillable = [
        'judulfyp',
        'namapenulis',
        'tahunterbit',
        'jumlahhalaman',
    ];

        // @var string
        // protectes $table = 'Book';
    public $timestamps = false;

}
