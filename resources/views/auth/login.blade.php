@extends('layouts.app')

@section('content')

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 rounded-lg">
        <div class="flex justify-center mb-6 pb-8">
              <img src="{{ asset('\img\logo.png' )}}" alt="" width="70" height="70" > 
        </div>
        @if(session('status'))
        <div class="bg-red-500 bg-opacity-50 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" id="email" placeholder="Your E-mail"
                    class="bg-gray-50 border-2 w-full p-4 font-semibold rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 mt-2 font-medium text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a Password"
                    class="bg-gray-50 border-2 w-full p-4 font-semibold rounded-lg @error('password') border-red-500 @enderror"
                    value="">
                @error('password')
                    <div class="text-red-500 mt-2 font-medium text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full hover:bg-blue-700 ">Login</button>
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>

                </div>
            </div>
        </form>
    </div>

</div>
@endsection
