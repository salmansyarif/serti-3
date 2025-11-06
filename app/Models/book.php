<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
protected $fillable = 
[ 
  'judul',
  'penulis',
  'kategori',
  'tahun_terbit',
  'jumlah',
  'status',
  'loan_status',
  'deskripsi',
];

public function loans()
{
  return $this->hasMany(pinjambuku::class);
}

}
