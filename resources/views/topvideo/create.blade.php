<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TopVideo管理-新增頁</title>
    <style>
        * {
            margin: 0px;
            box-sizing: border-box;
        }

        header {
            width: 100%;
            height: 10vh;
            background-color: powderblue;
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

        .comment .container>h1 {
            font-size: 2.5rem;
            font-weight: bolder;
        }

        .comment .container .info_container {
            width: 100%;
            height: 15%;
            background-color: lightgoldenrodyellow;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-end;

            margin-top: 2%;
        }

        .comment .container a {
            text-decoration: none;
        }

        .comment .container hr {
            margin-top: 1%;
        }

        .form {
            margin-top: 3%;
        }

        .form section div {
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            margin: 2% 0;
        }

        .form section div:nth-child(2) label:nth-child(1) {
            width: 100%;
            white-space: nowrap;
        }

        .form section div:nth-child(2) input {
            height: 100%;
        }

        .form section div:nth-child(1) input {
            width: 50%;
            padding-top: 1%;
        }

        input {
            width: 100%;
            height: 2.5rem;
            margin: 2% 0;
        }

        .submit_btn {
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 2%;
        }

        .submit {
            width: auto;
            color: white;
            background-color: green;
            margin: 1%;
            padding: 1%;
            cursor: pointer;
        }

        .reset {
            width: 10%;
            color: white;
            background-color: red;
            margin: 1%;
            padding: 1%;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header></header>
    <main>
        <div class="comment">
            <div class="container">

                {{-- 編輯表單 --}}
                {{-- 這裡action跟methon會對應Route的RESTful API格式 --}}
                <form class="form" action="/topvideos/store" method="post" enctype="multipart/form-data">

                    {{-- 埋入辨識金鑰避免CSRF攻擊 --}}
                    @csrf

                    {{-- action和methon需跟route對應 --}}
                    <h1>TopVideo新增</h1>
                    <section>

                        <div>
                            <label for="top_video">影片上傳:&emsp;</label>
                            <input type="file" name="top_video" id="top_video">
                        </div>

                        <label for="title">影片名稱:</label>
                        <input type="text" name="title" id="title">

                        <label>類型設定:</label>
                        <div>
                            <input type="radio" name="type" id="type_video_1" value="cyber"><label
                                for="type_video_1">Cyber</label>
                            <input type="radio" name="type" id="type_video_2" value="pixel"><label
                                for="type_video_2">Pixel</label>
                            <input type="radio" name="type" id="type_video_3" value="retro"><label
                                for="type_video_3">Retro</label>
                            <input type="radio" name="type" id="type_video_4" value="synthwave"><label
                                for="type_video_4">Synthwave</label>
                            <input type="radio" name="type" id="type_video_5" value="vaporwave"><label
                                for="type_video_5">Vaporwave</label>
                        </div>
                        {{-- <select name="type_video" id="type_video">
                            <option value="cyber"></option>
                            <option value="pixel"></option>
                            <option value="retro"></option>
                            <option value="synthwave"></option>
                            <option value="vaporwave"></option>
                        </select> --}}
                        {{-- <input type="text" name="type_video" id="type_video"> --}}

                        <label for="weight">權重設定:</label>
                        <input type="number" name="weight" id="weight">

                        <label for="duration">影片長度:</label>
                        <input type="number" name="duration" id="duration">

                        <div class="submit_btn">
                            <input class="submit" type="submit" value="新增TopVideo">
                            <input class="reset" type="reset" value="取消">
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>
