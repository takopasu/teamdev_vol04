<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Levcale｜レバカレ イベント一括管理</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--SEO施策-->
        <meta name="description" content="煩雑になっていたレバテックカレッジの重要イベントを逃さない。カレンダー機能のスケジュール一括管理が可能。">
        <!--SEO施策-->
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('/css/style.css') }}">
    </head>
    <body class="antialiased">
        <header>
            <h1><a href="/">レバカレ</a></h1><br>
            <h3>Levcale イベント一括管理サイト</h3>
            <nav id="global_navi">
                <ul>
                    <li class="current"><a href="/">HOME</a></li>
                    <li><a href="/mentor_calendar">メンター用</a></li>
                    <li><a href="/student_calendar">生徒用</a></li>
                    <li><a href="/login">ログイン</a></li>
                    <li><a href="/register">新規登録</a></li>
                </ul>
            </nav>
        </header>
        <div id="main_visual">
            <p><img src="https://rookie.levtech.jp/college/_nuxt/img/logo_ltcl_white.cbcac97.svg"></p>
        <div id="wrapper">
            <div id="main">
                <div id="breadcrumb">
                    <ol>
                        <li><a href="/welcome">HOME</a></li>
                        <li>メンター用</li>
                    </ol>
                </div>
            </div>
            <article>
                <main id="main">
                    <h1>メンター操作用カレンダー</h1>
                    <div id='mentor_calendar'></div>
                </main>
            </article>
        </div>
    </body>
        <footer id="footer">
	        <div class="footer-area">
	            <div class="footer-info">
	                <p class="footer-logo"><span>レバカレ</span></p>
	            </div>
	            <div class="footer-link">
                    <ul>
                       <li><a href="#">サイトマップ</a></li>
	                   <li><a href="#">FAQ</a></li>
	                   <li><a href="#">利用規約</a></li>
	                   <li><a href="#">プライバシーポリシー</a></li>
	                   <li><a heref="#">お問い合わせ</a></li>
	    	        </ul>
	    	        <ul class="sns-link">
                        <li><a href="https://twitter.com/levtech_inc"><img src="img/ico_tw.svg" alt="Twitter"></a></li>
                		<li><a href="https://www.instagram.com/levtech_college/"><img src="img/ico_insta.svg" alt="Instagram"></a></li>
            			<li><a href="https://www.facebook.com/levtech.inc"><img src="img/ico_fb.svg" alt="Facebook"></a></li>
        			</ul>
	            </div>  
	        </div>
	        <small>&copy; 2022 Levcale All rights Reserved.</small>
        </footer>
</html>