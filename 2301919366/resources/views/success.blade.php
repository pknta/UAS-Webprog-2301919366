@extends('layout')
@section('content')
	<div class="container-xl mb-5 d-flex align-items-center" style="height: 90vh;">
		<div class="container p-5 mx-auto my-auto text-center">
			<h2>{{__('Success!')}}</h2>
			<h5><a href="{{route('home')}}">{{__('Click to go back to home')}}</a></h5>
		</div>
	</div>
@endsection        