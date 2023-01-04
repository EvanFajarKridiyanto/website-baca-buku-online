<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karya extends Model
{
    use HasFactory;
    protected $fillable = [ 'judul', 'author','foto','tag'];
    protected $table = 'karya';
    public $timestamps = false;
}
