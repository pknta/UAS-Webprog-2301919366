<!DOCTYPE html>
<html lang="en">
<head>
  <title>Amazing E-Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <div class="me-auto">
          <a href="{{route('locale.toggle')}}" class="btn btn-warning"> {{Config::get('app.locale')}} </a>
        </div>
        <a class="ms-auto navbar-brand justify-content-center">Amazing E-Book</a>
        @if(Auth::check() == False)
          <div class="ms-auto">
            <a href="{{route('register')}}" class="btn btn-warning me-2"> {{__('Sign Up')}} </a>
            <a href="{{route('login')}}" class="btn btn-warning me-2"> {{__('Log In')}} </a>
          </div>
        @else
          <div class="ms-auto">
            <a href="{{route('logout')}}" class="btn btn-warning me-2"> {{__('Log Out')}} </a>
          </div>
        @endif
    </div>
  </nav>

  @if(Auth::check())
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning d-flex justify-content-center">
        <div class="mx-3">
          <a href="{{route('home')}}"> {{__('Home')}} </a>
        </div>
        <div class="mx-3">
          <a href="{{route('cart')}}"> {{__('Cart')}} </a>
        </div>
        <div class="mx-3">
          <a href="{{route('profile')}}"> {{__('Profile')}} </a>
        </div>
        @if(Auth::user()->isAdmin())
          <div class="mx-3">
            <a href="{{route('acc_maintenance')}}"> {{__('Account Maintenance')}} </a>
          </div>
        @endif
    </nav>
  @endif

  <div class="container-xl">
    @yield('content')
  </div>

  <nav class="navbar fixed-bottom navbar-dark bg-primary">
    <div class="ms-auto me-auto headerfont text-white">
      © Amazing E-Book 2022
    </div>
  </nav>
</body>
</html>