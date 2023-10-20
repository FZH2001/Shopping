{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
            <div class="text-center mb-4">
              <h3>Sign Up</h3>
              <p class="text-700">Create your account today</p>
            </div>
           
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="mb-3 text-start"><label class="form-label" name="name">Name</label><input class="form-control" id="name" type="text" placeholder="Name" /></div>
              <div class="mb-3 text-start"><label class="form-label" name="email">Email address</label><input class="form-control" id="email" type="email" placeholder="name@example.com" /></div>
              <div class="row g-3 mb-3">
                <div class="col-md-6"><label class="form-label" name="password">Password</label><input class="form-control form-icon-input" type="password" placeholder="Password" /></div>
                <div class="col-md-6"><label class="form-label" name="password_confirmation">Confirm Password</label><input class="form-control form-icon-input" type="password" placeholder="Confirm Password" /></div>
              </div>
              <div class="form-check mb-3"><input class="form-check-input" id="termsService" type="checkbox" /><label class="form-label" for="termsService">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label></div>
              <button class="btn btn-primary w-100 mb-3" type="submit">Sign up</button>
              <div class="text-center"><a class="fs--1 fw-bold" href="{{route('login')}}">Sign in to an existing account</a></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection