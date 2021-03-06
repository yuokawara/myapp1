@extends('layouts.admin')
@section('title', '登録済み投稿の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿の一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
              <div class="buttons">
                <a href="{{ action('Admin\MyAppController@add') }}" role="button" class="btn btn-primary">新規作成</a>
              </div>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\MyAppController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <div class="buttons">
                              <input type="submit" class="btn btn-primary" value="検索">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-app col-md-12 mx-auto">
                <div class="row">
                  <div class="table">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">タイトル</th>
                                <th width="20%">本文</th>
                                <th width="20%">画像</th>
                                <th width="20%">動画</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $app)
                                <tr>
                                    <th>{{ $app->id }}</th>
                                    <td>{{ str_limit($app->title, 50) }}</td>
                                    <td>{{ str_limit($app->body, 50) }}</td>
                                    <td>
                                      <div class="edit-image">
                                        <img src="{{$app->image_path}}" type="video/mp4">
                                      </div>
                                    </td>
                                    <td>
                                      <div class="edit-movie">
                                        <video src="{{$app->movie_path}}" type="video/mp4" controls autoplay muted></video>
                                      </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\MyAppController@edit', ['id' => $app->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\MyAppController@delete', ['id' => $app->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
        <div class="buttons">
        <a href="{{ action('MyAppController@index') }}" class="btn btn-block btn-primary">
          <span class="font">H</span>ome
        </a>
        </div>
    </div>
@endsection
