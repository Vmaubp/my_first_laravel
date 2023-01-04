<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{


    //新增一個自己網頁版的分工函式index(函式名子會給web.php寫分工功能時用來對照)
    public function index()
    {
        //測試抓資料
        // $data = DB::table('news')->get();
        // dd這是測試用印出函式
        // dd($data);

        //抓舊3筆
        $bedata = DB::table('news')->take(3)->get();

        //抓最新3筆，利用排序功能將id倒過來抓
        $afdata = DB::table('news')->orderBy('id', 'desc')->take(3)->get();

        //隨機抓3筆
        $randata = DB::table('news')->inRandomOrder()->take(3)->get();
        // dd($bedata, $afdata, $randata);


        // $data = $bedata->concat($afdata)->concat($randata);

        //抓取各news的title
        $data = DB::table('news')->get('title');
        // dd($data);
        $text = DB::table('news')->inRandomOrder()->take(3)->get('content');

        //指定第幾筆，例如第3筆
        // $pdata = DB::table('news')->find(3);
        // dd($pdata);
        // dd(gettype($data));

        //抓取TopVideo的影片
        $topvideo = DB::table('topvideos')->where('title', 'cyber')->get();
        // dd($topvideo);

        //抓取第2區的影片
        $c2svido = DB::table('videos')->get();

        //回傳路由跳轉+撈取到的資料庫資料
        return view('cyberworld', ['data' => $data, 'text' => $text, 'topvideo' => $topvideo, 'c2svido' => $c2svido]);
    }
}

// <!-- 這裡是透過php artisan make:controller NewsControlnal 指令新增的自訂Controller -->
