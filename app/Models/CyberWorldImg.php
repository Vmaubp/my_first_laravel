<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CyberWorldImg extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $primarykey = 'id';
    protected $fillable = ['title', 'content', 'src'];
}
