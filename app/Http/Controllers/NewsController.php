<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{


    //新增一個自己網頁版的分工函式index(函式名子會給web.php寫分工功能時用來對照)
    public function index()
    {
        return view('cyberworld');
    }
}

// <!-- 這裡是透過php artisan make:controller NewsControlnal 指令新增的自訂Controller -->
