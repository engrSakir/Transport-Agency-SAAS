@push('title')
    Forgot Password
@endpush
@extends('layouts.auth.app')
@push('style')

@endpush
@section('content')
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{ asset('assets/backend/images/background/login-register.jpg') }});">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <h3 class="text-center m-b-20">পাসওয়ার্ড ভুলে গেছেন?</h3>
                        @if ($status ?? '')
                            <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
                                {{ $status }}
                            </div>
                        @endif
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('ট্রান্সপোর্ট এজেন্সি সফটওয়্যার ব্যাবহার এর পাসওয়ার্ড ভুলে গেছেন! কোন সমস্যা নেই। আপনার ইমেইল নাম্বার অথবা ইউজারনেম যেকোনো একটি ব্যবহার করে খুব সহজেই পাসওয়ার্ড পুনরুদ্ধার করতে পারবেন।') }}
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" class="form-control" value="{{ old('email') }}" name="email" type="text" required="" autofocus placeholder="Email/Phone/Username">
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">পাসওয়ার্ড পুনরুদ্ধার</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')

@endpush

{{-- <x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


    </x-auth-card>
</x-guest-layout> --}}
