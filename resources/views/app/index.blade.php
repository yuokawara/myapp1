@extends('layouts.front')

@section('content')
<!-- Navigasion -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="{{ action('MyAppController@index') }}"><span class="font">H</span>ome</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ action('Admin\MyAppController@create') }}"><span class="font">C</span>reate</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ action('Admin\MyAppController@index') }}"><span class="font">E</span>dit</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ action('HomeController@index') }}"><span class="font">R</span>egister</a>
			</li>
		</ul>
	</div>
</nav>

<!-- End Navigation -->
<!-- carousel -->
<div id="slides" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    @foreach ($sliders as $slider)
    <li data-target="#slides" data-slide-to="{{$slider->id}}" class="active"></li>
    @endforeach
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ $headline->image_path }}">
      <div class="carousel-caption">
        <h1 class="display-2"><span class="font">M</span>y <span class="font">V</span>log <span class="font">C</span>reater</h1>

        <button type="button" class="btn btn-outline-light btn-lg"><span class="font">S</span>tart <span class="font">C</span>reate</button>
      </div>
    </div>
    @foreach ($sliders as $slider)
    <div class="carousel-item">
      <img src="{{ $slider->image_path }}">
    </div>
    @endforeach
  </div>
</div>
<!-- carousel end -->

<div class="container">
  <hr color="#c0c0c0">
  @if (!is_null($headline))
  <div class="row">
    <!--- Cards -->
    <div class="container-fluid padding">
      <div class="row padding">
        <div class="col-md-6">
          <div class="card">
            @if ($headline->image_path)
            <img class="card-img-top" src="{{ $headline->image_path }}">
            @endif
            <div class="card-body">
              <h4 class="text-center">{{ str_limit($headline->title, 70) }}</h4>
              <p class="card-text">{{ str_limit($headline->body, 300) }}</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            @if ($headline->movie_path)
            <video class="card-img-top" src="{{$headline->movie_path}}" type="video/mp4" controls autoplay muted></video>
            @endif
            <div class="card-body">
              <div class="date text-center">
                {{ $headline->updated_at->format('Y年m月d日') }}
              </div>
              <!-- <h4 class="text-center">{{ str_limit($headline->title, 70) }}</h4>
              <p class="card-text">{{ str_limit($headline->body, 300) }}</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

<hr color="#c0c0c0">

<div class="container">
  <div class="row">
    <div class="container-fluid padding">
      @foreach($posts as $post)
      <div class="row padding">
        <div class="col-md-6">
          <div class="card">
            @if ($post->image_path)
            <img class="card-img-top" src="{{ $post->image_path }}">
            <div class="card-body">
              <h4 class="text-center">{{ str_limit($post->title, 70) }}</h4>
              <p class="card-text">{{ str_limit($post->body, 650) }}</p>
              <a href="{{ action('Admin\MyAppController@index') }}" class="btn btn-outline-secondary">編集に戻る</a>
            </div>
            @endif
          </div>
        </div>

        <div class="col-md-6">
          <div class="card">
            @if ($post->movie_path)
            <video class="card-img-top" src="{{$post->movie_path}}" type="video/mp4" controls autoplay muted></video>
            <div class="card-body">
              <div class="date text-center">
                {{ $post->updated_at->format('Y年m月d日') }}
              </div>
              <!-- <h4>{{ str_limit($post->title, 70) }}</h4>
              <p class="card-text">{{ str_limit($post->body, 650) }}</p>
              <a href="#" class="btn btn-outline-secondary">編集に戻る</a> -->
            </div>
            @endif
          </div>
        </div>
      </div>
      <hr color="#c0c0c0">
      @endforeach
    </div>
  </div>
</div>
@endsection
