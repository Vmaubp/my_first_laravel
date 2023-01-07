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
        .NavTop {
            opacity: 1;
            z-index: 10;
            position: relative;
        }
        tbody>tr>td{
            width: 25%;
        }
        video{
            width: 100%;
            height: auto;
        }
        .btn-edit{
            background-color: green;
        }
        .btn-delete{
            background-color: red;
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
                <form class="form" action="" methon="GET">
                    {{-- action和methon需跟route對應 --}}
                    <h1>TopVideos 影片管理</h1>
                    <section>
                        {{-- //這裡是TopVideos的管理後台頁面 --}}
                        <table id="topvideos_table" class="display">
                            <thead>
                                <tr>
                                    <th>影片預覽</th>
                                    <th>影片時間</th>
                                    <th>影片權重</th>
                                    <th>功能</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><video src="{{asset('/NewVideos/CyberPunkTopdown1.mp4')}}" poster=""></video></td>
                                    <td>秒</td>
                                    <td>1</td>
                                    <td>
                                        <button class="btn-edit">編輯</button>
                                        <button class="btn-delete">刪除</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </form>
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
