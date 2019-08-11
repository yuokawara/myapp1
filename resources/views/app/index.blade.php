@extends('layouts.front')

@section('content')
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
				                   <a href="#" class="btn btn-outline-secondary">SEE SAMPLE</a>
			                  </div>
		                </div>
	                 </div>

	                 <div class="col-md-6">
		                <div class="card">
                    @foreach($posts as $app)
			               <video class="card-img-top" src="{{$headline->movie_path}}" type="video/mp4" controls autoplay muted></video>
                    @endforeach
			                <div class="card-body">
				               <h4 class="card-title">SAMPLE</h4>
				                <p class="card-text">samplesamplesample</p>
				                 <a href="#" class="btn btn-outline-secondary">SEE SAMPLE</a>
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
				         <a href="#" class="btn btn-outline-secondary">SEE SAMPLE</a>
			          </div>
              @endif
		         </div>
	          </div>

	        <div class="col-md-4">
		       <div class="card">
            @foreach($posts as $app)
			       <video class="card-img-top" src="{{$app->movie_path}}" type="video/mp4" controls autoplay muted></video>
			        <div class="card-body">
				       <h4 class="card-title">SAMPLE</h4>
				       <p class="card-text">samplesamplesample</p>
				       <a href="#" class="btn btn-outline-secondary">SEE SAMPLE</a>
			        </div>
            @endforeach
		       </div>
	        </div>

	          <div class="col-md-4">
		         <div class="card">
			        <img class="card-img-top" src="img/main.png">
			         <div class="card-body">
				        <h4 class="card-title">SAMPLE</h4>
				         <p class="card-text">samplesamplesample</p>
				         <a href="#" class="btn btn-outline-secondary">SEE SAMPLE</a>
			         </div>
		         </div>
	          </div>
          </div>
        @endforeach
      </div>


        <!-- <div class="row">
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
    </div> -->
@endsection
