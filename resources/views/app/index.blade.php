@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-6">
                    <div class="row">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ $headline->image_path }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>

                        <div class="movie col-md-6 mt-4">
                          <tbody>
                              @foreach($posts as $app)
                                  <tr>
                                    <td>
                                      <!-- source要素の場合 -->
                                      <video controls>
                                      	<!-- source要素が先頭 -->
                                      	<source src="/video/dog.ogv" type="video/ogg">
                                      	<source src="/video/dog.webm" type="video/webm">
                                      	<source src="/video/dog.mp4" type="video/mp4">

                                      	<!-- 要素の最後にフォールバックコンテンツを配置 -->
                                      	<p>お使いのブラウザでは動画再生に対応していません…。</p>
                                      </video>
                                    </td>
                                  </tr>
                              @endforeach
                          </tbody>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-10 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 70) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 650) }}
                                </div>
                            </div>

                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ $post->image_path }}">
                                @endif
                            </div>
                            <div class="movie col-md-12 text-right mt-4">
                              <tbody>
                                @foreach($posts as $app)
                                    <tr>
                                        <td><video id="mv-{{$app->id}}" class="col-6" autobuffer>
                                          <source src="{{$app->image_path}}" type="video/ogg">
                                            <source src="{{$app->image_path}}" type="video/webm">
                                              <source src="{{$app->image_path}}" type="video/mp4">
                                              <p>HTML5に対応していません。</p>
                                            </video>
                                            <form>
                                              <button type ="button" onclick="movplay(0)">再生</button>
                                              <button type="button" onclick="movplay(1)">一時停止</button>
                                            </form>
                                          <script>
                                            function movplay(num)
                                            {
                                              var obj = document.getElementById("mv-{{$app->id}}");
                                              var n = parseInt(num);
                                              if ( n == 0 )
                                              {
                                                obj.play();
                                              }
                                              else
                                              {
                                                obj.pause();
                                              }
                                            }
                                          </script>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
