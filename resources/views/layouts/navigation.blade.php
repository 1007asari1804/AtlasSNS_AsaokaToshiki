        <div id="head">
            <h1><a class="top-page" href="/top"><img src="images/atlas.png"></a></h1>
            <div id="profile">
                <p>{{ Auth::user()->username }}さん</p>
                <span class="accordion-button"></span>
                <img src="images/icon1.png">
                <div class="accordion-menu">
                    <ul class="accordion-content">
                        <li class="accordion home"><a href="/top">ホーム</a></li>
                        <li class="accordion profile"><a href="/profile">プロフィール</a></li>
                        <li class="accordion logout"><a href="{{ route('logout') }}">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
