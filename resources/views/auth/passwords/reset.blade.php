@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-lg">
                    <div class="bg-gray-100 px-6 py-4 border-b">
                        {{ __('Reset Password') }}
                    </div>

                    <div class="px-6 py-4">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    {{ __('Email Address') }}
                                </label>
                                <div class="mt-1">
                                    <input id="email" type="email"
                                        class="form-input block w-full @error('email') border-red-500 @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">
                                    {{ __('Password') }}
                                </label>
                                <div class="mt-1">
                                    <input id="password" type="password"
                                        class="form-input block w-full @error('password') border-red-500 @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <p class="mt-2 text-sm text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="block text-sm font-medium text-gray-700">
                                    {{ __('Confirm Password') }}
                                </label>
                                <div class="mt-1">
                                    <input id="password-confirm" type="password" class="form-input block w-full"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
