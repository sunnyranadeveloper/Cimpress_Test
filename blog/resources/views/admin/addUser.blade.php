@extends('layouts.admin')

@section('content')
	<h3>Add User</h3>
	  <form action="/addUser" method="post">
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
		  <label for="name">Subject:</label>
		  @csrf
		  <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
		</div>
		<div class="form-group">
		  <label for="email">Email:</label>
		  <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
		</div>
		<div class="form-group">
		  <label for="password">Password:</label>
		  <input type="password" class="form-control" id="password" placeholder="Enter email" name="password" required>
		</div>
		<div class="form-group">
		  <label for="password">Type:</label>
		  <select class="form-control" id="type" placeholder="Enter email" name="type">
			<option value="1">End User</value>
			<option value="2">Admin User</value>
		  </select>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	  </form>
	</div>  
</div>
@endsection