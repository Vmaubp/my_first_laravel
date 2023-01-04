<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

            padding-top: 5%;
        }

        .comment .container {
            width: 50%;

            border: 2px solid black;
            border-radius: 15px;

            background-color: white;
            display: flex;
            flex-direction: column;

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

        .comment .container .info_container .info {
            width: 50%;
            display: flex;
            flex-direction: row;
        }

        .comment .container .info_container .info .title {
            width: 70%;
            font-weight: bolder;
            color: black;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            font-size: 2.5rem;
        }

        .comment .container .info_container .info .author {
            width: 30%;
            font-weight: bolder;
            color: black;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            font-size: 1.25rem;
        }

        .comment .container .info_container .date {
            width: 50%;
            color: black;
            font-size: 2.5rem;
            font-weight: bolder;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
        }

        .comment .container .textarea {
            width: 100%;
            height: 20vh;
        }

        .form {
            margin-top: 3%;
        }

        .form section{
            margin-top: 3%;
        }

        .content{
            height: 20vh;
        }

        input {
            width: 100%;
            height: 2.5rem;

        }

        .submit_btn {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .submit {
            width: 10%;
        }

        .reset {
            width: 10%;
        }

    </style>
</head>

<body>
    <header></header>
    <main>
        <div class="comment">
            <div class="container">
                <h1>留言板</h1>
                <div class="info_container">
                    <div class="info">
                        <div class="title">測試標題</div>
                        <div class="author">作者名</div>
                    </div>
                    <div class="date">發文時間</div>
                </div>
                <div class="textarea">內文內文內文內文內文內文內文內文內文內文內文內文內文</div>

                <hr>

                <div class="info_container">
                    <div class="info">
                        <div class="title">測試標題</div>
                        <div class="author">作者名</div>
                    </div>
                    <div class="date">發文時間</div>
                </div>
                <div class="textarea">內文內文內文內文內文內文內文內文內文內文內文內文內文</div>

                <hr>

                <div class="info_container">
                    <div class="info">
                        <div class="title">測試標題</div>
                        <div class="author">作者名</div>
                    </div>
                    <div class="date">發文時間</div>
                </div>
                <div class="textarea">內文內文內文內文內文內文內文內文內文內文內文內文內文</div>

                <hr>

                {{-- 填寫表單 --}}
                <form class="form" action="/comment/save" methon="GET">
                    {{-- action和methon需跟route對應 --}}
                    <h1>我有話想說...</h1>
                    <section>
                        <h1>姓名</h1>
                        <input type="text" value="" name="name">
                        <h1>標題</h1>
                        <input type="text" value="" name="title">
                        <h1>內容</h1>
                        <input class="content" type="text" value="" name="content" placeholder="請勿輸入不雅文字...">
                        <div class="submit_btn">
                            <input class="submit" type="submit" value="送出">
                            <input class="reset" type="reset" value="清除">
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>
