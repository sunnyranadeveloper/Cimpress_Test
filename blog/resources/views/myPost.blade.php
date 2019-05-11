@extends('layouts.user')

@section('content')
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<strong>Success!</strong>
		{{ $message }}
	</div>
	@endif
	@foreach ($myPosts as $post)
	<div class="card">
		<div class="card-body">
			<h3>{{ $post->subject }}</h3>
			| <a href="/editPost/{{ $post->id }}" class="">Edit</a> | 
			| <a href="javascript:void(0)" onclick="deletePost({{ $post->id }})">Delete</a> <br>
			{{ $post->content }}</br></br>
			<small style="text-align:right">Last Update : {{ $post->updated_at }}</small>
		</div>
	  </div>
	@endforeach
  </div>
</div>
<script>
function deletePost(id) {
	var check = confirm('Are You sure.');
	if(check) {
		window.location.href = '/deleteUserPost/'+id;
	}
}
</script>
@endsection