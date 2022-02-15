@extends('layout')
@section('content')
   <div class="card m-5">
      <div class="card-header">
         {{__('Update Role')}}
      </div>
      <div class="card-body">
         <form method="POST">
            @csrf
            <div class="form-group mb-2">
               <label> {{$user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name}} </label>
            </div>
            <div class="form-group mb-2">
               <label for="role"> {{__('Role')}} </label>
               <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                  <option value="Admin" {{ old('role', $user->role->role_desc) == 'Admin' ? 'selected' : ''}}> {{__('Admin')}} </option>
                  <option value="User"{{ old('role', $user->role->role_desc) == 'User' ? 'selected' : ''}}> {{__('User')}} </option>
               </select>
            </div>
            <button type="submit" class="btn btn-warning"> {{__('Save')}} </button>
         </form>
      </div>
   </div>
@endsection        