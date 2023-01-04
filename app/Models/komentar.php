<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    protected $table ="komentar";
    protected $guarded =['id'];

    public function vidio()
{
    return $this->belongsTo(vidio::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
}
