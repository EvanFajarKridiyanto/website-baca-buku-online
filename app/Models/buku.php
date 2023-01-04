<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'judul', 'penulis', 'category','foto','isi'];
    protected $table = 'bukus';
    public $timestamps = false;
    
    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
//     public function categories()
//     {
//         return $this->belongsTo(categories::class);
//     }
}
