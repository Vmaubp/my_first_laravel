<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    #加入這行指定你的table，也就是資料表名稱
    protected $table = 'comments';

    #加入這行指定你這個table的主key
    protected $primaryKey = 'id';

    #下面使用白名單$fillable限制可以被填寫的欄位
    protected $fillable = ['title', 'name', 'content', 'email'];
}
