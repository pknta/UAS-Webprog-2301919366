@extends('layout')
@section('content')
	<div class="container-xl mb-5 d-flex align-items-center" style="height: 90vh;">
		<div class="container p-5 mx-auto my-auto text-center">
			@if($ebooks->first())
				<table class="table">
					<thead>
						<tr>
							<th scope="col"> {{__('Author')}} </th>
							<th scope="col"> {{__('Title')}} </th>
						</tr>
					</thead>
					<tbody>
						@foreach($ebooks as $ebook)
							<tr class="text-start"> 
								<td>{{$ebook->author}}</td>
								<td><a href="{{route('ebook', ['ebook_id'=>$ebook->ebook_id])}}">{{$ebook->title}}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<h2> {{__('No E-Book available yet!')}} </h2>
			@endif
		</div>
	</div>
@endsection        