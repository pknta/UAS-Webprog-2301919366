@extends('layout')
@section('content')
	<div class="container-xl mb-5 d-flex align-items-center" style="height: 90vh;">
		<div class="container p-5 mx-auto my-auto text-center">
			<table class="table text-start">
				<thead>
					<tr>
						<th scope="col" colspan="2"> {{__('E-Book Detail')}} </th>
					</tr>
				</thead>
				<tbody>
					<tr> 
						<td scope="row">{{__('Title')}}</td>
						<td> {{$ebook->title}} </td>
					</tr>
					<tr> 
						<td scope="row">{{__('Author')}}</td>
						<td> {{$ebook->author}} </td>
					</tr>
					<tr> 
						<td scope="row">{{__('Description')}}</td>
						<td> {{$ebook->description}} </td>
					</tr>
				</tbody>
			</table>
			<form method="POST" action="{{route('ebook_addcart', ['ebook_id'=>$ebook->ebook_id])}}">
				@csrf
				<button class="btn btn-warning form-control" type="submit"> {{__('Rent')}} </button>
			</form>
		</div>
	</div>
@endsection        