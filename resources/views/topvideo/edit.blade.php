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

        .topvideo {
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

        .topvideo .container {
            width: 50%;

            border: 2px solid black;
            border-radius: 15px;

            background-color: white;
            display: flex;
            flex-direction: column;

            padding: 1.5%;

        }

        .topvideo .container>h1 {
            font-size: 2.5rem;
            font-weight: bolder;
        }

        .topvideo .container .info_container {
            width: 100%;
            height: 15%;
            background-color: lightgoldenrodyellow;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: flex-end;

            margin-top: 2%;
        }

        .topvideo .container .info_container .info {
            width: 50%;
            display: flex;
            flex-direction: row;
        }

        .topvideo .container .info_container .info .title {
            width: 70%;
            font-weight: bolder;
            color: black;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            font-size: 2rem;
        }

        .topvideo .container .info_container .info .author {
            width: 30%;
            font-weight: bolder;
            color: black;
            display: flex;
            justify-content: flex-start;
            align-items: flex-end;
            font-size: 1.25rem;
        }

        .topvideo .container .info_container .date {
            width: 50%;
            color: black;
            font-size: 1.25rem;
            font-weight: bolder;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
        }

        .topvideo .container .textarea {
            font-size: 1.5rem;
            /* font-weight: bold; */
            /* border: 1px solid black;
            border-radius: 5px; */
            margin-top: 1%;
            margin-bottom: 1%;
        }

        .topvideo .container a {
            text-decoration: none;
        }

        .topvideo .container hr {
            margin-top: 1%;
        }

        .form {
            margin-top: 3%;
        }

        .form section {
            margin-top: 3%;
        }

        .form section video {
            width: 100%;
        }

        .form section div {
            font-size: 1.5rem;
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
            padding: 1%;
            margin: 1% 0;
        }

        .form section .type_video {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        input {
            width: 100%;
            height: 2.5rem;
        }

        button {
            width: 100%;
            height: 2.5rem;
            margin: 2% 0;
        }

        h1 {
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
            width: auto;
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
        <div class="topvideo">
            <div class="container">

                {{-- ????????????TopVideo????????????????????????update --}}
                <form class="form" action="/topvideos/update/{{ $edit_topvideo->id }}" method="post"
                    enctype="multipart/form-data">
                    {{-- action???methon??????route?????? --}}
                    <h1>{{ $edit_topvideo->title }}????????????</h1>
                    <section>

                        @csrf

                        <h1>????????????:</h1>
                        <video src="{{ $edit_topvideo->src }}"></video>

                        <div>
                            <label for="top_video">????????????:&emsp;</label>
                            <input type="file" name="top_video" id="top_video">
                        </div>

                        {{-- ????????????first()????????????????????????????????????????????? --}}
                        <h1>????????????</h1>
                        <input type="text" value="{{ $edit_topvideo->title }}" name="title">

                        <h1>????????????</h1>
                        <div class="type_video">
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

                        <h1>????????????</h1>
                        <input type="text" value="{{ $edit_topvideo->duration }}" name="duration">

                        <h1>????????????</h1>
                        <input type="text" value="{{ $edit_topvideo->weight }}" name="weight">

                        {{--
                        <h1>??????</h1>
                        <input type="text" value="{{ $edit_topvideo->type }}" name="title"> --}}

                        <div class="submit_btn">
                            <button class="reset" type="reset" onclick="location.href='/topvideos'">??????</button>
                            <button class="submit" type="submit">??????</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <footer></footer>
</body>

</html>
