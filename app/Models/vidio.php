<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vidio extends Model
{
    use HasFactory;
    protected $fillable = [ 'judul', 'author','isi', 'tanggal'];
    protected $table = 'vidio';
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function komentar()
{
    return $this->hasMany(komentar::class);
}
}
