<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pinjambuku extends Model
{

    protected $table = 'pinjam_bukus';

    protected $fillable = [
        'user_id',
        'book_id', 
        'tanggal_pinjam',
        'tanggal_kembali',
        'jangka',
        'status',
    ];

public function user ()
{
    return $this->belongsTo(User::class);
}


public function book ()
{
    return $this->belongsTo(book::class);
}


}