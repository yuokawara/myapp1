@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->body, 650) }}</p>
                        </div>
                        <tbody>
                            @foreach($posts as $app)
                              <div class="movie col-md--6 text-right mt-4">
                                  <tr>
                                    <td><video id="mv-{{$app->id}}" class="col-10" autobuffer>
                                      <source src="movie/dog.mov">
                                        <source src="movie/dog.ogv">
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
                              </div>
                            @endforeach
                        </tbody>
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
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                            <div class="movie col-md--6 text-right mt-4">
                              <tbody>
                                @foreach($posts as $app)
                                    <tr>
                                        <td><video id="mv-{{$app->id}}" class="col-10" autobuffer>
                                          <source src="movie/dog.mov">
                                            <source src="movie/dog.ogv">
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
