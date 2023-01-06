<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CyberWorldTopVideo extends Model
{
    use HasFactory;

    protected $table = 'topvideos';
    protected $primarykey = 'id';
    protected $fillable = ['title', 'content', 'src', 'weight', 'duration'];
}
