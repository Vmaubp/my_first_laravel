<?php

namespace App\Http\Controllers;

//Request這是傳遞資料(如input表單)接收參數的特殊語法
use Illuminate\Http\Request;

//DB是用來去資料庫撈資料的特殊語法
use Illuminate\Support\Facades\DB;

//Comment(自訂)是用Model取代DB去資料庫撈資料的特殊語法，更安全
use App\Models\Comment;
use App\Models\CyberWorldTopVideo;
use App\Models\CyberWorldVideo;
use App\Models\CyberWorldImg;

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
        // $bedata = DB::table('news')->take(3)->get();

        //抓最新3筆，利用排序功能將id倒過來抓
        // $afdata = DB::table('news')->orderBy('id', 'desc')->take(3)->get();

        //隨機抓3筆
        // $randata = DB::table('news')->inRandomOrder()->take(3)->get();


        //抓取各news的title
        $data = DB::table('news')->get('title');
        // dd($data);
        $text = DB::table('news')->inRandomOrder()->take(3)->get('content');

        //指定第幾筆，例如第3筆
        // $pdata = DB::table('news')->find(3);
        // dd($pdata);


        ///// CyberWorld部分 /////

        //抓取TopVideo的影片
        // $topvideo = DB::table('topvideos')->where('title', 'cyber')->get();

        //使用Model去抓資料
        $topvideo = CyberWorldTopVideo::where('type', 'cyber')->get();

        //抓取第2區的影片
        // $c2svido = DB::table('videos')->get();
        $c2svido = CyberWorldVideo::get();

        //回傳給veiw撈取到的特定資料庫資料
        return view('cyberworld', ['data' => $data, 'text' => $text, 'topvideo' => $topvideo, 'c2svido' => $c2svido]);
    }



    //路由跳轉到留言板頁面(注意/下一層這裡改為使用.代替)
    public function comment()
    {

        //用DB方式去資料庫撈出全部
        // $comments = DB::table('comments')->orderby('id', 'desc')->get();

        //用Model方式去資料庫撈出全部
        $comments = Comment::orderby('id', 'desc')->get();

        //從資料庫讀出留言板資料(撈出最新3筆)
        // $comments = DB::table('comments')->orderby('id', 'desc')->take(3)->get();

        //compact的功能是將複數讀取出來的資料組合成陣列傳到view去(comment.blade.php)
        return view('comment.comment', compact('comments'));
    }


    //新增資料進資料庫
    //當按下Submit時執行這個跳轉函式(使用傳值方式接收input來的資料)
    public function save_comment(Request $request)
    {
        //這裡參數有特殊寫法格式，先Request搭配一個$變數(常直接用request)

        // dd($request->content);
        // dd($request->all());
        //all()函式可以顯示所有input的資料(而不顯示用來給瀏覽器看的head)

        // 用DB方法將資料寫入資料表裡
        // DB::table('comments')->insert([

        //     'title' => $request->title,
        //     'name' => $request->name,
        //     'content' => $request->content,
        //     'email' => ''
        // ]);

        // 用Model方法將資料寫入資料表裡
        Comment::create([
            'title' => $request->title,
            'name' => $request->name,
            'content' => $request->content,
            'email' => ''
        ]);

        return redirect('/comment');
        #這裡重新導向頁面很重要，輸入的是"網址"
        #重新導向使用方法與使用view跳轉頁面方法不同
        #這裡只是重新導向，資料一樣會寫入資料庫但重新導向後上方網址不會因為GET而出現傳送資料訊息

        // return view('comment.comment');
        #這裡使用的是view，路徑跟"跳轉到comment頁面"相同
        #因為是透過GET送出表單，使用view方法會在網址上顯示傳送的內容資訊
    }

    //刪除留言
    public function delete_comment($id)
    {
        // dd($id);
        Comment::where('id', $id)->delete();

        return redirect('/comment');
    }

    //編輯留言
    public function edit_comment($id)
    {

        //重新抓取相應ID的資料並印到edit.blade.php頁面
        $edit_comment = Comment::where('id', $id)->first();
        //因為只會調出一筆來編輯，使用first()而不用get();這樣在view頁面就不需要[0]或@foreach!

        // dd($edit_comments);

        return view('comment.edit', compact('edit_comment'));
    }

    //完成更新編輯留言，有2參數，$id是目標留言，$request是編輯的新資料
    public function update_comment($id, Request $request)
    {
        // dd($id, $request);


        //方法1 DB操作 更新資料
        // 將編輯完資料覆蓋入資料表相應的ID欄裡-->where('id', $id)->update()，注意這裡操作文件規定是用where()不能用find()會報錯
        Comment::where('id', $id)->update([

            'title' => $request->title,
            'name' => $request->name,
            'content' => $request->content,
            'email' => '',
        ]);

        //方法2 物件操作 更新資料 此操作法9版laravel似乎被刪除了無法用
        // $comments = DB::table('comments')->find($id);

        // $comments->title = $request->title;
        // $comments->name = $request->name;
        // $comments->content = $request->content;

        // $comments->save($comments);



        return redirect('/comment');
    }
}

// <!-- 這裡是透過php artisan make:controller NewsControlnal 指令新增的自訂Controller -->
