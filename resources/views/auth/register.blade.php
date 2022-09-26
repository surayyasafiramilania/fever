<!DOCTYPE html>
<html class="h-100" lang="en">

    <head>
        @include('partials.head')
    </head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="text-center mb-4">
                                    <span class="logo-compact"><img src="{{ asset('template/images/differ-2.png')}}" alt=""></span>
                                    <p class="text-primary">Diagnosis Of A Fever</p>
                                </div>
                                <form  method="POST" action="{{ route('register') }}" class="login-input">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Masukan Nama" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Masukan Password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input id="password-confirm" type="password" name="password_confirmation"  class="form-control" placeholder="Masukan Password" required autocomplete="new-password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">{{ __('Register') }}</button>
                                </form>
                                    <p class="mt-3 login-form__footer">Have account <a href="{{ route('login') }}" class="text-primary">Login</a> now</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Scripts-->
    @include('partials.script')
    <!--Script end-->
</body>
</html>