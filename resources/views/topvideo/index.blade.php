<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/CyberCss.css">
    <link rel="stylesheet" href="./css/CyberCssLeftList.css">
    {{-- 載入datatable(需要依賴在Jquery版本) --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        .comment {
            width: 100%;
            /* height: auto; */
            background-color: lightsteelblue;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            padding-top: 2%;
            padding-bottom: 2%;
        }

        .comment .container {
            width: 50%;

            border: 2px solid black;
            border-radius: 15px;

            background-color: white;
            display: flex;
            flex-direction: column;

            padding: 1.5%;

        }

        .form-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-title a {
            font-size: 1.5rem;
            color: white;
            border: 2px solid black;
            border-radius: 15px;
            text-decoration: none;
            background-color: rgb(0, 128, 0);
            padding: 1%;
        }

        .form-title a:hover {
            background-color: rgb(3, 156, 3);
        }

        .NavTop {
            opacity: 1;
            z-index: 10;
            position: relative;
        }

        thead>tr th {
            /* font-size: 1rem; */
            /* width: auto; */
            white-space: nowrap;
        }

        tbody>tr>td {
            width: 13%;
        }

        .posrtr_videos {
            width: 35%;
        }

        video {
            width: 100%;
            height: auto;
        }

        td:nth-child(6) a {
            width: 100%;
            font-size: 1rem;
            color: white;
            border: 2px solid black;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            padding: 5%;
            margin: 5% 0;
        }

        td .btn-edit {
            background-color: rgb(0, 167, 0);
        }

        .btn-edit:hover {
            background-color: green;
            cursor: pointer;
        }

        td .btn-delete {
            background-color: rgb(216, 5, 5);
        }

        .btn-delete:hover {
            background-color: red;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <nav class="NavTop">
            <span id="headerBlack">
                <div id="DivLeft">
                    <div id="sLeftList" onclick="OpenLeftList()"></div>
                    <div><a href="/">Future</a></div>
                    <div><a href="/topvideos">TVSHOW</a></div>
                </div>

                <div id="DivLogoCenter"><img id="LogoCenter" class="Logo"
                        src="{{ asset('/Logo/CyberWorld Logo 04 三角 高斯模糊完成.png') }}">
                </div>

                <div class="GuestOption">
                    <div><a href="#content4">BBS</a></div>
                    <div><a href="#content3">Cart</a></div>
                    <div><a href="/dashboard">Log in</a></div>
                </div>
            </span>
        </nav>

        <div id="LeftList">
            <div>
                <div class="DivLeftListBack" onclick="CloseLeftList()"><span>X</span></div>
                <div id="LeftList1">
                    <img id="LeftListLogo" class="Logo" src="{{ asset('/Logo/CyberWorld Logo 04 三角 高斯模糊完成.png') }}">

                </div>
            </div>
            <div class="LeftList2-4" id="LeftList2">
                <p>First</p>
            </div>
            <div class="LeftList2-4" id="LeftList3"></div>
            <div class="LeftList2-4" id="LeftList4">Last</div>

        </div>
    </header>
    <main>
        <div class="comment">
            <div class="container">

                {{-- 下面提交鈕是使用button的onclick事件呼叫Route，這裡的action不能是空值否則會干擾造成跳轉失敗 --}}
                {{-- <form class="form" action="#" method="get"> --}}

                {{-- @csrf --}}

                {{-- action和methon需跟route對應 --}}
                <div class="form-title">
                    <h1>TopVideos 影片管理</h1>
                    <a href="/topvideos/create">新增TopVideos</a>
                </div>
                <section>
                    {{-- //這裡是TopVideos的管理後台頁面 --}}
                    <table id="topvideos_table" class="display">
                        <thead>
                            <tr>
                                <th>預覽</th>
                                <th>名稱</th>
                                <th>類型</th>
                                <th>長度(秒)</th>
                                <th>權重</th>
                                <th>功能</th>
                            </tr>
                        </thead>

                        <tbody>
                            {{-- 使用blade的template動態生成資料庫影片清單 --}}
                            @foreach ($topvideos as $topvideo)
                                <tr>
                                    <td class="posrtr_videos">
                                        <video src="{{ $topvideo->src }}"></video>
                                    </td>
                                    <td>{{ $topvideo->title }}</td>
                                    <td>{{ $topvideo->type }}</td>
                                    <td>{{ $topvideo->duration }}秒</td>
                                    <td>{{ $topvideo->weight }}</td>
                                    <td>
                                        {{-- <a class="btn-edit" href="/topvideos/edit/{{ $topvideo->id }}">編輯</button> --}}
                                        <button class="btn-edit"
                                            onclick="location.href='/topvideos/edit/{{ $topvideo->id }};'">編輯</button>

                                        {{-- 點擊本按鈕將會觸發Js事件去執行指定表單的submit功能(改用post方法submit而不是get) --}}
                                        <button class="btn-delete"
                                            onclick="document.querySelector('#deleteForm{{ $topvideo->id }}').submit();">刪除</button>

                                        {{-- 做一個隱藏表單專門給需要post方法的delete路由使用 --}}
                                        <form action="/topvideos/delete/{{ $topvideo->id }}" method="post" hidden
                                            id="deleteForm{{ $topvideo->id }}">

                                            @csrf

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
                {{-- </form> --}}
            </div>
        </div>
    </main>
    <footer></footer>

    {{-- 先載入Jquery本身 --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- 載入datatable(需要依賴在Jquery) --}}
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    {{-- Jq的初始化(順序是需要在載入Jq後才有東西可以初始化) --}}
    <script>
        $(document).ready(function() {
            $('#topvideos_table').DataTable();
        });
    </script>
</body>

</html>
