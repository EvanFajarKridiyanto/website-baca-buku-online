<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentarbuku extends Model
{
    use HasFactory;
    protected $table ="komentar";
    protected $guarded =['id'];
    public function buku()
    {
        return $this->belongsTo(buku::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
