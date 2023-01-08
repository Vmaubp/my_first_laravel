<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Comment(自訂)是用Model取代DB去資料庫撈資料的特殊語法，更安全
use App\Models\Topvideo;

//這是laravel的本地儲存位置File Storage
use Illuminate\Support\Facades\Storage;

// 這裡是 /topvideos 的後台管理頁面

class TopVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $topvideos = Topvideo::get();
        // dd($topvideos);

        //讓Model從資料庫撈回"所有東西"($topvideos)並回傳到管理後台列表頁上去做blade的套版插入
        return view('topvideo.index', ['topvideos' => $topvideos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //開啟新增頁面
        return view('topvideo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //檢查檔案是否有新增，此時若出現419 | PAGE EXPIRED表示觸發了跨站請求偽造CSRF的安全機制
        // dd($request->all());

        //這裡有兩個參數，一個是檔案存入位置(指定位置路徑，若沒有該資料夾存在則會創立)，另一個是要填入你上傳的"檔案串流"(該物件)
        $path = Storage::disk('local')->put('public/topvideos', $request->top_video);

        // dd($path);

        //因為真正檔案路徑在Stroge裡(已建立從Public連到Storge裡的Public的捷徑)，所以需要對預設的$path做路徑名稱處理

        $path = str_replace('public', 'storage', $path);
        // dd($new_path);

        //呼叫Topvideo這個Model進行儲存到資料表裡
        //這裡尚未做防呆
        Topvideo::create([
            'title' => $request->title,
            'content' => $request->content,
            'src' => "/" . $path,
            'weight' => $request->weight,
            'duration' => $request->duration,
            'type' => $request->type
        ]);

        //單純重新導向(送出新的request)到後台列表頁
        return redirect('/topvideos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //用不到
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //根據id找到想編輯的資料，然後將資料回傳給blade頁面給用戶操作
        $edit_topvideo = Topvideo::find($id);

        //開啟編輯頁並將撈到的資料全部傳送過去blade頁面
        return view('topvideo.edit', compact('edit_topvideo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());

        //若有修改影片才進行新影片儲存與刪除舊影片
        if ($request->top_video != null) {

            //刪除資料夾內的舊檔案(先抓出舊檔案的id並取出路徑)
            $top_video_old = Topvideo::find($id);

            //因為從資料庫讀取來的路徑是"上傳檔案後透過捷徑連結的版本"，所以這裡如果直接填入讀取路徑會抓不到檔案，需要反過來用str_replace()再把它換回最原始的路徑樣貌
            $delete_target = str_replace('/storage', 'public', $top_video_old->src);

            // dd($delete_target, $top_video_old->src);

            Storage::disk('local')->delete($delete_target);

            // dd($top_video_old->src);

            //新影片儲存進資料夾內並修正路徑
            $path = Storage::disk('local')->put('public/topvideos', $request->top_video);
            $path = str_replace('public', 'storage', $path);
        }


        // 注意這裡操作文件規定是用where()不能用find()會報錯
        Topvideo::where('id', $id)->update([

            'title' => $request->title,
            'content' => $request->content,

            'weight' => $request->weight,
            'duration' => $request->duration,
            'type' => $request->type

        ]);

        //有修改影片才會改路徑
        if ($request->top_video != null) {
            Topvideo::where('id', $id)->update([
                'src' => "/" . $path,
            ]);
        }

        //單純重新導向(送出新的request)到後台列表頁
        return redirect('/topvideos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);

        //原則:先把真正資料刪完再刪資料庫，否則紀錄路徑的數據會遺失就找不到東西的位置
        $top_video_old = Topvideo::find($id);

        //刪除資料夾內的檔案
        $delete_target = str_replace('/storage', 'public', $top_video_old->src);
        Storage::disk('local')->delete($delete_target);

        //刪除資料表內的該筆資料
        Topvideo::where('id', $id)->delete();

        // dd($delete_target, $top_video_old->src);

        //單純重新導向(送出新的request)到後台列表頁
        return redirect('/topvideos');
    }
}
