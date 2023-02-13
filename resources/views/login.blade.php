<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wings Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('app-assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('app-assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img class="img-fluid" src="https://images.unsplash.com/photo-1573730220310-d771d86a05cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" style="background-size: cover; width:100%; height:100%;" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user auth-login-form" action="login" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Your email">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login</button>
                                    </form>
                                    @if(session()->has('success'))
                                        <div class="demo-spacing-0 mt-1">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <div class="alert-body"> {{ session('success') }} </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        </div>
                                    @endif
                                    @if(session()->has('LoginError'))
                                        <div class="demo-spacing-0 mt-1">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="alert-body"> {{ session('LoginError') }} </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('app-assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('app-assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('app-assets/js/sb-admin-2.min.js') }}"></script>
</body>

</html>