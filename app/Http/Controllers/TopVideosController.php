<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Comment(自訂)是用Model取代DB去資料庫撈資料的特殊語法，更安全
use App\Models\Topvideo;

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
        //讓Model從資料庫撈東西在回傳到管理後台頁面
        $topvideos = Topvideo::get();
        // dd($topvideos);

        return view('topvideo.index', ['topvideos'=> $topvideos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        dd($request->all());

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
        // dd($id);
        $edit_topvideo = Topvideo::find($id);
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
        // 注意這裡操作文件規定是用where()不能用find()會報錯
        Topvideo::where('id', $id)->update([

            'title' => $request->title,
            'type' => $request->type,
            'duration' => $request->duration,
            'weight' => $request->weight

        ]);

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
        //
        return redirect('/topvideos');
    }
}
