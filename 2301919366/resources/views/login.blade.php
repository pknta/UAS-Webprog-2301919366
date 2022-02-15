@extends('layout')
@section('content')
   <div class="card m-5">
      <div class="card-header">
         {{__('Login')}}
      </div>
      <div class="card-body">
         @if(!empty($message))
            <div class="alert alert-danger mt-1" role="alert">
               {{$message}}
            </div>
         @endif
         <form method="POST" action="{{route('login_request')}}">
            @csrf
            <div class="form-group mb-2">
               <label for="email"> {{__('Email Address')}} </label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}" autocomplete="off">
               @error('email')
                  <div class="alert alert-danger mt-1" role="alert">
                     {{$message}}
                  </div>
               @enderror
            </div>
            <div class="form-group mb-2">
               <label for="password"> {{__('Password')}} </label>
               <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" placeholder="Enter password" autocomplete="off">
               @error('password')
                  <div class="alert alert-danger mt-1" role="alert">
                     {{$message}}
                  </div>
               @enderror
            </div>
            <button type="submit" class="btn btn-warning"> {{__('Submit')}} </button>
         </form>
      </div>
   </div>
@endsection        