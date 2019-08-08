@extends('layouts.front')

@section('content')
      <div class="container">
        <hr color="#c0c0c0">
          @if (!is_null($headline))
            <div class="row">
              <div class="headline col-sm-4 mt-4">
                <div class="caption mx-auto">
                  <div class="image" style="display: table; margin: 0 auto;">
                    @if ($headline->image_path)
                      <img src="{{ $headline->image_path }}">
                    @endif
                  </div>
                    <div class="title p-2">
                      <h1>{{ str_limit($headline->title, 70) }}</h1>
                    </div>
                </div>
                  <p class="body mx-auto">{{ str_limit($headline->body, 300) }}</p>
              </div>


              <div class="movie col-lg-6 mx-auto">
                <tbody>
                  @foreach($posts as $app)
                    <tr>
                      <td>
                        <div class="video mt-4">
                          <video src="{{$headline->movie_path}}" type="video/mp4" controls autoplay muted></video>
                          <!-- 要素の最後にフォールバックコンテンツを配置 -->
                          <!-- <p>お使いのブラウザでは動画再生に対応していません…。</p> -->
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </div>
            </div>
          @endif
      </div>


        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-4 mx-auto mt-3">
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

                            <div class="image col-md-4 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ $post->image_path }}">
                                @endif
                            </div>
                            <div class="movie col-md-4 text-right mt-4">
                              <tbody>
                                @foreach($posts as $app)
                                    <tr>
                                        <td>
                                          <video src="{{$app->movie_path}}" type="video/mp4" controls autoplay muted></video>
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
