<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CyberWorldVideo extends Model
{
    use HasFactory;

    protected $table = 'videos';
    protected $primarykey = 'id';
    protected $fillable = ['title', 'content', 'src', 'weight', 'duration'];
}
