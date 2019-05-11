@extends('layouts.admin')

@section('content')
	<h3>Edit Post</h3>
	  <form action="/editPostAdmin/{{ $post->id }}" method="post">
		 @if (count($errors) > 0)
		<div class="error">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="form-group">
		  <label for="subject">Subject:</label>
		  @csrf
		  <input type="hidden" name="id" value="{{ $post->id }}">
		  <input type="text" class="form-control" id="subject" placeholder="Enter Subject" name="subject" required value="{{ $post->subject }}">
		</div>
		<div class="form-group">
		  <label for="pwd">Content:</label>
		  <textarea class="form-control" id="content" name="content" required>{{ $post->content }}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	  </form>
	</div>  
</div>
@endsection