<!-- Registration page -->
<!-- OK1 -->

@extends('layout')
@section('content')
   <div class="card m-5">
      <div class="card-header">
         {{__('Register')}}
      </div>
      <div class="card-body">
         <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-2">
               <div class="form-group mb-2 col-6">
                  <label for="first_name"> {{__('First Name')}} </label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" aria-describedby="usernameHelp" placeholder="Enter first name" value="{{old('first_name')}}" autocomplete="off">
                  @error('first_name')
                     <div class="alert alert-danger mt-1" role="alert">
                        {{$message}}
                     </div>
                  @enderror
               </div>
               <div class="form-group mb-2 col-6">
                  <label for="middle_name"> {{__('Middle Name')}} </label>
                  <input type="text" class="form-control @error('middle_name') is-invalid @enderror" id="middle_name" name="middle_name" aria-describedby="usernameHelp" placeholder="Enter middle name" value="{{old('middle_name')}}" autocomplete="off">
                  @error('middle_name')
                     <div class="alert alert-danger mt-1" role="alert">
                        {{$message}}
                     </div>
                  @enderror
               </div>
               <div class="form-group mb-2 col-6">
                  <label for="last_name"> {{__('Last Name')}} </label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" aria-describedby="usernameHelp" placeholder="Enter last name" value="{{old('last_name')}}" autocomplete="off">
                  @error('last_name')
                     <div class="alert alert-danger mt-1" role="alert">
                        {{$message}}
                     </div>
                  @enderror
               </div>
               <div class="form-group mb-2 col-6">
                  <label for="email"> {{__('Email Address')}} </label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}" autocomplete="off">
                  @error('email')
                     <div class="alert alert-danger mt-1" role="alert">
                        {{$message}}
                     </div>
                  @enderror
               </div>
               <div class="form-group mb-2 col-6">
                  <label for="gender"> {{__('Gender')}} </label>
                  <br>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" {{old('gender')=='Male' ? 'checked': ''}}>
                     <label class="form-check-label" for="Male"> {{__('Male')}} </label>
                  </div>
                  <div class="form-check form-check-inline">
                     <input class="form-check-input" type="radio" name="gender" id="Female" value="Female" {{old('gender')=='Female' ? 'checked': ''}}>
                     <label class="form-check-label" for="Female"> {{__('Female')}} </label>
                  </div>
                  @error('gender')
                     <div class="alert alert-danger mt-1" role="alert">
                        {{$message}}
                     </div>
                  @enderror
               </div>
               <div class="form-group mb-2 col-6">
                  <label for="role"> {{__('Role')}} </label>
                  <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                     <option value="Admin"> {{__('Admin')}} </option>
                     <option value="User"> {{__('User')}} </option>
                  </select>
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
               <div class="form-group mb-3">
                 <label for="picture" class="form-label">{{__('Display Picture')}}</label>
                 <input class="form-control" type="file" id="picture" name="picture">
                 @error('picture')
                     <div class="alert alert-danger mt-1" role="alert">
                        {{$message}}
                     </div>
                  @enderror
               </div>
            </div>
            <button type="submit" class="btn btn-warning form-control"> {{__('Submit')}} </button>
         </form>
         <p class="text-center"> {{__('Already have an account?')}} <a href="{{route('login')}}"> {{__('Click here to log in.')}} </a> </p>
      </div>
   </div>
@endsection        