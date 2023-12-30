<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sistersInSafar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>               
</head>
<body>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
     @if ($errors->any()) {
     <div class="alert alert-danger">

     <ul>
     @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
     </ul>

     </div>
     @endif
    <div class="container">
        <form action="/users/authenticate" method="post">
        @csrf
            <div class="mb-6">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="error text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('email') }}">
                @error('password')
                    <p class="error text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                <!-- <i class='bx bx-hide eye-icon'></i> -->
            </div>
            <div class="form-link">
                <a href="#" class="forgot-pass">Forgot password?</a>
            </div>
            <div class="mb-6">
                <button type="submit" class="py-2 px-4 hover-bg-pink text-white rounded">Login</button>
            </div>
   
            <div class="mt-8">
                <span>Don't have an account? <a href="signup.html" class="link signup-link">Sign up!</a></span>
            </div>
             </form>
            
    </div>
</body>
</html>