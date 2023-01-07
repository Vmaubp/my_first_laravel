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
            font-size: 2rem;
        }

        .comment .container .info_container .info .author {
            width: 30%;
            font-weight: bolder;
            color: black;
            display: flex;
            justify-content: flex-start;
            align-items: flex-end;
            font-size: 1.25rem;
        }

        .comment .container .info_container .date {
            width: 50%;
            color: black;
            font-size: 1.25rem;
            font-weight: bolder;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
        }

        .comment .container .textarea {
            font-size: 1.5rem;
            /* font-weight: bold; */
            /* border: 1px solid black;
            border-radius: 5px; */
            margin-top: 1%;
            margin-bottom: 1%;
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

        .form section {
            margin-top: 3%;
        }

        .content {
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

                {{-- 編輯表單 --}}
                <form class="form" action="/comment/update/{{$edit_comment->id}}" methon="GET">
                    {{-- action和methon需跟route對應 --}}
                    <h1>留言編輯</h1>
                    <section>
                        <h1>姓名</h1>

                        {{-- 因為使用first()方法抓資料所以不需要 --}}
                        {{-- @foreach ($edit_comments as $edit_comment) --}}
                        <input type="text" value="{{ $edit_comment->name }}" name="name">
                        <h1>標題</h1>
                        <input type="text" value="{{ $edit_comment->title }}" name="title">
                        <h1>內容</h1>
                        <input class="content" type="text" value="{{ $edit_comment->content }}" name="content"
                            placeholder="請勿輸入不雅文字...">

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
