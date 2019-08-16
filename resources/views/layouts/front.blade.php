<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="canonical" href="https://syncer.jp/Web/HTML/Reference/Element/video/"> -->
        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
        <!-- オリジナルアプリ用 -->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
        <script src="https://sdk.form.run/js/v2/formrun.js"></script>
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバーです。 --}}
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}

            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
                @yield('content')
            </main>
            <!-- START CONTACT -->
<section class="section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2><span class="font-weight-bold">Contact</span> Us</h2>
                </div>
            </div>
        </div>
        <div class="row mt-5">

            <div class="col-lg-2">
                <div class="text-center">
                    <div>

                    </div>
                    <div class="mt-3">

                    </div>
                </div>
            </div>

        </div>
        <!-- START CONTACT -->
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="form-kerri">
              <form class="formrun" action="https://form.run/api/v1/r/jc99edxucstbmc0ixjhd2zeq" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group mt-2">
                      <input name="name" id="name" type="text" class="form-control" placeholder="Your Name*" data-formrun-required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group mt-2">
                      <input name="email" id="email" type="email" class="form-control" placeholder="Your Email*" data-formrun-required>
                      <div data-formrun-show-if-error="メールアドレス">メールアドレスを正しく入力してください</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group mt-2">
                      <input type="text" class="form-control" id="subject" placeholder="Your Subject.." data-formrun-required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group mt-2">
                      <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Your message..." data-formrun-required></textarea>
                      <div data-formrun-show-if-error="お問い合わせ">お問い合わせ入力してください</div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 text-right mb-3">
                    <button type="submit" class="btn btn-primary" data-formrun-error-text="未入力の項目があります" data-formrun-submitting-text="送信中...">Submit</button>
                    <!-- <a href="#" class="btn btn-custom" data-formrun-error-text="未入力の項目があります" data-formrun-submitting-text="送信中...">Submit</a> -->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- END CONTACT -->
            <footer>
              <div id="contact" class="offset">

                <div class="row justify-content-center">
                  <div class="col-md-5 text-center">
                    <!-- ここにイメージタグ　-->

                    
                    <p>000-0000-0000<br>email@samplemk.com</p>

                  </div>

                  <hr class="socket">
                  &copy; YU ORANGE.

                </div>
              </div>
            </footer>
        </div>
    </body>
</html>
