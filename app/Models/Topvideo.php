<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $title
 * @property string $content
 * @property string $src
 * @property integer $weight
 * @property integer $duration
 */
class Topvideo extends Model
{
    /**
     * @var array
     */

    //  這是用Krlove創出來的model
    //  創出來的Model會發現他只有白名單而沒有protected $table = 'topvideos'跟protected $primarykey = 'id';

    // 因為資料庫設計其實預設就會是自動去對應複數s資料表名子跟主key默認是id

    // 除非你的資料表這裡設計得很不同不然不用加也能運行
    protected $fillable = ['created_at', 'updated_at', 'title', 'content', 'src', 'weight', 'duration'];
}
