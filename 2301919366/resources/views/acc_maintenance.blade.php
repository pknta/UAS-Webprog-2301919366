@extends('layout')
@section('content')
	<div class="container-xl mb-5 d-flex align-items-center" style="height: 90vh;">
		<div class="container p-5 mx-auto my-auto text-center">
			@if($users->first())
				<table class="table">
					<thead>
						<tr>
							<th scope="col"> {{__('Account')}} </th>
							<th scope="col"> {{__('Action')}} </th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr class="text-start"> 
								<td>{{$user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name}}</td>
								<td class="text-end">
									<a class="btn btn-primary" href="{{route('role_update', ['account_id'=>$user->account_id])}}">{{__('Update Role')}}</a>
									<button class="btn btn-danger" form="{{'delete'.$user->account_id}}"> {{__('Delete')}} </button>
								</td>
							</tr>
							<form method="POST" action="{{route('delete_account', ['account_id'=>$user->account_id])}}" id="{{'delete'.$user->account_id}}">
								@csrf
							</form>
						@endforeach
					</tbody>
				</table>
			@else
				<h2> {{__('No users to display')}} </h2>
			@endif
		</div>
	</div>
@endsection        