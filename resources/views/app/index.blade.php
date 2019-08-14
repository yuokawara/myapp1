@extends('layouts.front')

@section('content')
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
			<h1 class="display-2">Sample Making2</h1>
			<h3>Sample Layout</h3>
			<button type="button" class="btn btn-outline-light btn-lg">
			DEMO
			</button>
			<button type="button" class="btn btn-primary btn-lg">
			DEMO2
			</button>
		</div>
	</div>

  @foreach ($sliders as $slider)
  <div class="carousel-item">
		<img src="{{ $slider->image_path }}">
	</div>
  @endforeach
</div>
</div>
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
				                 <h4>{{ str_limit($headline->title, 70) }}</h4>
				                  <p class="card-text">{{ str_limit($headline->body, 300) }}</p>
			                  </div>
		                </div>
	                 </div>

	                 <div class="col-md-6">
		                <div class="card">
                    @foreach($posts as $app)
			               <video class="card-img-top" src="{{$headline->movie_path}}" type="video/mp4" controls autoplay muted></video>
                    @endforeach
			                <div class="card-body">
				               <h4>{{ str_limit($headline->title, 70) }}</h4>
				                <p class="card-text">{{ str_limit($headline->body, 300) }}</p>
			                </div>
		                </div>
	                 </div>
                </div>
              </div>
            </div>
          @endif

        <hr color="#c0c0c0">

      <div class="container-fluid padding">
        @foreach($posts as $post)
          <div class="row padding">
	          <div class="col-md-4">
		         <div class="card">
              @if ($post->image_path)
			         <img class="card-img-top" src="{{ $post->image_path }}">
			          <div class="card-body">
				         <h4>{{ str_limit($post->title, 70) }}</h4>
				         <p class="card-text">{{ str_limit($post->body, 650) }}</p>
                 <a href="{{ action('Admin\MyAppController@index') }}" class="btn btn-outline-secondary">編集に戻る</a>
			          </div>
              @endif
		         </div>
	          </div>

	        <div class="col-md-8">
		       <div class="card">
            @foreach($posts as $app)
			       <video class="card-img-top" src="{{$app->movie_path}}" type="video/mp4" controls autoplay muted></video>
			        <div class="card-body">
				       <h4>{{ str_limit($post->title, 70) }}</h4>
				       <p class="card-text">{{ str_limit($post->body, 650) }}</p>
               <a href="#" class="btn btn-outline-secondary">編集に戻る</a>
			        </div>
            @endforeach
		       </div>
	        </div>

          </div>
        @endforeach
      </div>
@endsection
