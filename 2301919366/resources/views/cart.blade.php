@extends('layout')
@section('content')
	<div class="container-xl mb-5 d-flex align-items-center" style="height: 90vh;">
		<div class="container p-5 mx-auto my-auto text-center">
			@if($ebooks->first() != NULL)
				<table class="table">
					<thead>
						<tr>
							<th scope="col" colspan="2" class="text-start"> {{__('Title')}} </th>
						</tr>
					</thead>
					<tbody>
						@foreach($ebooks as $ebook)
							<tr> 
								<td class="text-start">{{$ebook->ebook->title}}</td>
								<td class="text-end">
									<button class="btn btn-danger" form="{{'delete'.$ebook->ebook_id}}"> {{__('Delete')}} </button>
								</td>
							</tr>
							<form method="POST" action="{{route('cart_delete', ['ebook_id'=>$ebook->ebook_id])}}" id="{{'delete'.$ebook->ebook_id}}">
								@method('DELETE')
								@csrf
							</form>
						@endforeach
					</tbody>
				</table>
				<form method="POST">
					@csrf
					<button class="btn btn-warning form-control" type="submit"> {{__('Submit')}} </button>
				</form>
			@else
				<h2> {{__('Cart is empty')}} </h2>
			@endif
		</div>
	</div>
@endsection        