@extends('layouts.user')

@section('content')
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<strong>Success!</strong>
		{{ $message }}
	</div>
	@endif
	@foreach ($latestPosts as $post)
	<div class="card">
		<div class="card-body">
			<h3>{{ $post->subject }}</h3>
			{{ $post->content }}</br></br>
			<small style="text-align:right">Last Update : {{ $post->updated_at }}</small>
		</div>
	  </div>
	@endforeach
  </div>  
</div>
@endsection