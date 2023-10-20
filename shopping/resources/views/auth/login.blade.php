{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}
@extends('layouts.assets')
@section('content')

<main class="main" id="top">
    <div class="container-fluid px-0" data-layout="container">
      <div class="container">
        <div class="row flex-center min-vh-100 py-5">
          <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a class="d-flex flex-center text-decoration-none mb-4" href="../../../index.html">
              <div class="d-flex align-items-center fw-bolder fs-5 d-inline-block"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/2x/external-shopping-cart-technology-ecommerce-flaticons-lineal-color-flat-icons.png" class="rounded-full"
                width="40" height="40" style="overflow:hidden" class="rounded img-fluid"/></div>
            </a>
            <div class="text-center mb-7">
              <p class="text-700">Get access to your account</p>
            <div class="position-relative mt-4">
              <hr class="bg-200" />
              <div class="divider-content-center">or use email</div>
            </div>
            <form method="post" action="{{route('login')}}">
                @csrf
            <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label>
              <div class="form-icon-container"><input class="form-control form-icon-input" id="email" type="email" name="email"  placeholder="name@example.com" required/><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
            </div>
            <div class="mb-3 text-start"><label class="form-label"  for="password">Password</label>
              <div class="form-icon-container"><input class="form-control form-icon-input" name="password"  type="password" placeholder="Password" required/><span class="fas fa-user text-900 fs--1 form-icon"></span></div>
            </div>
            <div class="row flex-between-center mb-7">
              <div class="col-auto">
                <div class="form-check mb-0"><input class="form-check-input" id="basic-checkbox" type="checkbox" checked="checked" /><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label></div>
              </div>
              <div class="col-auto"><a class="fs--1 fw-semi-bold" href="{{ route('password.request')}} ">Forgot Password?</a></div>
            </div>
            
            <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
            </form>
            <div class="text-center"><a class="fs--1 fw-bold" href="{{route('register')}}">Create an account</a></div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection