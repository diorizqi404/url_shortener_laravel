 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Login | URL SHORTENER</title>
     <script src="https://cdn.tailwindcss.com"></script>
 </head>

 <body>
     <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
         <div class="sm:mx-auto sm:w-full sm:max-w-sm flex justify-center flex-col">
             <h1 class="text-6xl text-center">📎</h1>
             <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                 account</h2>
         </div>

         <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
             <form class="space-y-6" action="#" method="POST">
                 @csrf
                 <div>
                     <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                         address</label>
                     <div class="mt-2">
                         <input id="email" name="email" type="email" autocomplete="email" required
                             value="{{ old('email') }}"
                             class="form-control @error('email') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                         @error('email')
                             <span class="text-red-500 text-sm">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>

                 <div>
                     <div class="flex items-center justify-between">
                         <label for="password"
                             class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                         <div class="text-sm">
                             <a href="{{ route('password.request') }}"
                                 class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                         </div>
                     </div>
                     <div class="mt-2">
                         <input id="password" name="password" type="password" autocomplete="current-password" required
                             class="form-control @error('password') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                         @error('password')
                             <span class="text-red-500 text-sm">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>

                 <div>
                     <button type="submit"
                         class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                         in</button>
                 </div>
             </form>

             <p class="mt-10 text-center text-sm text-gray-500">
                 Belum punya akun?
                 <a href="{{ url('/register') }}"
                     class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar Sekarang!</a>
             </p>
         </div>
     </div>
 </body>

 </html>

 {{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                @if (session('error'))
                    {{ session('error') }}
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
