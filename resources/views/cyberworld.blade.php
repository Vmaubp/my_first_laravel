<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">





    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Swiper Demo styles -->
    <style>
        /* 整體輪播框架 */
        .swiper {
            width: 100%;
            height: 100%;
        }

        /* 圖片外框子層 */
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: rgb(255, 255, 255);
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        /*
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        } */

        /* 下方選項燈 */
        :root {
            --swiper-theme-color: yellow;
        }

        /* 預設為8px */
        .swiper-pagination-bullet {
            width: 16px;
            height: 16px;
            background-color: rgb(255, 253, 117);
            opacity: 0.1;
        }

        .swiper-pagination-bullet-active {
            filter: drop-shadow(0px 0px 10px rgb(223, 235, 66));
            opacity: 1;
        }
    </style>
    <link rel="stylesheet" href="./css/CyberCss.css">
    <link rel="stylesheet" href="./css/CyberCssLeftList.css">
    <title>CyberWorld</title>

</head>

<body>
    {{-- 黑幕浮動區塊 --}}
    <span class="BlackScreen"></span>
    <img class="ImgLarge"></img>
    <img class="messagelist" name="messagelist" src="{{ asset('/OtherImage/Pholltransparent.png') }}" alt="">
    <video class="VideoLarge" src="" autoplay loop controls></video>

    <header>
        <nav class="NavTop">
            <span id="headerBlack">
                <div id="DivLeft">
                    <div id="sLeftList" onclick="OpenLeftList()"></div>
                    <div><a href="/">Future</a></div>
                    <div><a href="#content5">TVSHOW</a></div>
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

        <div id="content">
            <!-- <img src="./OtherImage/dust.png" alt=""> -->
            <div id="content1">
                {{-- <video id="TopVideo" src="{{ asset('/NewVideos/CyberPunkTopdown1.mp4') }}" autoplay loop muted>
                </video> --}}

                {{-- 使用資料庫的資料來抓取影片連結 --}}
                <video id="TopVideo" src="{{$topvideo[0]->src}}" autoplay loop muted>
                </video>
                <div class="MuteButton" id="MB" onclick="MuteButton()"><img class="MuteImage"
                        src="{{ asset('/OtherImage/volume-high-unmuted.svg') }}" alt=""></div>
                <div class="Switch" id="SwitchLeft"><img src="{{ asset('/OtherImage/circle-chevron-left-solid.svg') }}"
                        alt=""></div>
                <div class="Switch" id="SwitchRight"><img
                        src="{{ asset('/OtherImage/circle-chevron-right-solid.svg') }}" alt="">
                </div>
                <div class="Article">
                    <p>CyberPunk</p>
                </div>
            </div>
            <div class="MainText01">
                <h1>賽博龐克是 ...<br>融合高端科技與低端生活的<br>『反烏托邦世界』</h1>
            </div>
            <div id="content2">
                <div class="content2Image">
                    <div class="C2LeftText">
                        <div class="C2TextArea">

                        </div>

                    </div>
                    <div class="C2RightImages">
                        <div class="C2Display">
                            <div class="Dimg"></div>
                            <video class="Dvid" src="" autoplay loop></video>
                        </div>
                    </div>

                    <!-- 小圖片清單 -->
                    <div data-type="img" class="C2Media">
                        <div class="C2Switch"><img src="{{ asset('/OtherImage/circle-chevron-left-solid.svg') }}"
                                alt=""></div>
                        <div class="C2sDiv">
                            <div data-type="img" class="C2sImg CI1">
                            </div>
                            <div data-type="img" class="C2sImg CI2"></div>
                            <div data-type="img" class="C2sImg CI3"></div>
                            <div data-type="img" class="C2sImg CI4"></div>
                            <div data-type="img" class="C2sImg CI5"></div>
                            {{-- <video data-type="vid" src="{{ asset('/NewVideos/TearsInRain.mp4') }}" class="C2sImg CV1"
                                poster="{{ asset('/NewVideos/poster/TearsinRain3.jpeg') }}"></video>
                            <video data-type="vid"
                                src="{{ asset('/NewVideos/EdgerunnersUpdate(Patch 1.6)OfficialLaunchTrailerEU.mp4') }}"
                                class="C2sImg CV2"
                                poster="{{ asset('/NewVideos/poster/EdgerunnersUpdatePoster2.jpg') }}"></video>
                            <video data-type="vid"
                                src="{{ asset('/NewVideos/Cyberpunk Bartender Action VA-11 Hall-A Final TrailerVHA.mp4') }}"
                                class="C2sImg CV3"
                                poster="{{ asset('/NewVideos/poster/va11ha11a_poster3.jpg') }}"></video>
                            <video data-type="vid"
                                src="{{ asset('/NewVideos/The Matrix Resurrections Official Trailer 1 TM.mp4') }}"
                                class="C2sImg CV4" poster="./NewVideos/poster/TheMatrixPoster.jpg')}}"></video>
                            <video data-type="vid" src="{{ asset('/NewVideos/GHOST IN THE SHELL.mp4') }}"
                                class="C2sImg CV5" poster="{{ asset('/NewVideos/poster/ghostposter.png') }}"></video> --}}

                                @for ($i=0;$i<5;$i++)

                                <video data-type="vid" src="{{ $c2svido[$i]->src }}" class="C2sImg CV1"
                                poster="{{ $c2svido[$i]->poster }}"></video>

                                @endfor
                        </div>
                        <div class="C2Switch"><img src="{{ asset('/OtherImage/circle-chevron-right-solid.svg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="change-media-btn">VIDEO</div>
                </div>
            </div>
            <div class="MainText02">
                <h1>賽博龐克是 ...<br>代替我們前進到未來，直面那些<br>『艱困無解的問題』</h1>
            </div>
            <div class="content3" id="content3">
                <div class="salecontainer">

                    <!-- Swiper -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/Screenshot_20221021_070958.jpg') }}" />
                                <div>
                                    <h1>VA-11 HALL-A 原聲帶</h1>
                                    <p>點擊圖片可放大、播放 ►</p>
                                    <a href="https://blackscreenrecords.com/products/va-11-hall-a-complete-sound-collection-vinyl-boxset-by-garoad?variant=39606445408359"
                                        target="_blank">產品詳細訊息</a>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/cobe.jpg') }}" />
                                <div>
                                    <h1>卡比之星霓虹燈</h1>
                                    <p>點擊圖片可放大</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/room.jpg') }}"></img>
                                <div>
                                    <h1>賽博龐克-電腦週邊</h1>
                                    <p>點擊圖片可放大、播放 ►</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>
                            </div>
                            <div class="swiper-slide">

                                <video src="{{ asset('/Products/fgo_fg.mp4') }}" autoplay loop muted></video>
                                <div>
                                    <h1>Saber Fate / Zero 模型</h1>
                                    <p>點擊圖片可放大、播放 ►</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/80sneoncyberpunkretrobeerlabelideaswanted.png') }}" />
                                <div>
                                    <h1>80s賽博龐克復古啤酒</h1>
                                    <p>點擊圖片可放大</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/2077clothes.jpg') }}" />
                                <div>
                                    <h1>《電馭叛客2077》-邊緣行者印刷服飾</h1>
                                    <p>點擊圖片可放大</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/flymodule.jpg') }}" />
                                <div>
                                    <h1>SoLo 太陽軌道飛行器</h1>
                                    <p>點擊圖片可放大</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/Products/lan01.jpg') }}" />
                                <div>
                                    <h1>手提式-網路分析儀</h1>
                                    <p>點擊圖片可放大</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <video src="{{ asset('/Products/firelighters.mp4') }}"
                                    poster="{{ asset('/Products/firelighters.jpg') }}"></video>
                                <div>
                                    <h1>電弧脈衝打火機</h1>
                                    <p>點擊圖片可放大、播放 ►</p>
                                    <a href="" target="_blank">產品詳細訊息</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>


                    <!-- <div>
                        <div class="product">
                            <div>
                                <img class="productimg Dimg"
                                    src="./Products/80s neoncyberpunkretro beer label ideas wanted.png" alt="">
                                <video class="productvideo" src="./Products/Snapinsta.app_156559292_1631658827022321_4507796969732858515_n.mp4" autoplay loop muted></video>
                            </div>
                            <div></div>
                        </div>
                    </div> -->

                    <video src="{{ asset('/NewVideos/BgVideo3.mp4') }}" muted loop></video>
                </div>


            </div>
            <div class="MainText03">
                <div>The Wall of&emsp;<img src="{{ asset('/OtherImage/sheep.gif') }}" alt="">

                    {{-- 這裡放置laravel的DB資料傳入練習 --}}

                    {{-- 方法一:使用Blade Template樣板插孔語法 --}}

                     {{-- 1.只印出文章A --}}

                     {{-- {{$data[0]->title}}; --}}

                     {{-- 2.印出所有的回傳資料，$item是每個索引值 --}}
                     @foreach ($data as $item)

                     {{$item->title}}

                     @endforeach

                     {{-- 方法二:使用php印出資料 --}}
                    <?php
                    // echo "<p>".gettype($data)."</p>";
                    // echo "<p>".$data."</p>";

                    //  for($i=0; $i<count($data); $i++){
                    //     echo "<p>${data}[${i}]</p>";
                    //  }
                    // echo "<p>${text}</p>";
                    ?>
                </div>
            </div>
            <div class="content4">
                <div id="content4"><video src="{{ asset('/NewVideos/Bar_10801 mp4.mp4') }}" loop muted></video>
                </div>
            </div>
            <!-- <div class="MainText03"><div></div><img src="./otherImage/Truss_Light.png" alt=""></div> -->
        </div>
    </main>

    <footer>
        <div>
            <p style="margin: 0px;"><a href="#Top">Copyright&nbsp; © &nbsp; CyberWorld Web All Rights Reserved.</a>
            </p>
        </div>
    </footer>
    <a href="#Top"><img id="CyberDog" src="{{ asset('/看板犬/Rad_Shiba.png') }}" alt=""></a>


</body>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination"
        }
    });
</script>

<script type="text/javascript" src="{{ asset('/js/CyberScript.js') }}"></script>



</html>
