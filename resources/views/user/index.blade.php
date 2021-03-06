@extends('layouts/main')
@section('content')
<body>
	<h1 class="justify-content-center text-primary bg-success text-center">User List</h1>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Profile</th>
				<th>Created_At</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td> <img src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}"></td>
				<td>{{ $user->created_at }}</td>
			</tr>
		</tbody>
		@endforeach
	</table>
	@endsection
