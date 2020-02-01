@extends('layout')

@section('content')
<div class="container h-full flex justify-center items-center m-auto">
    <div class="w-1/3">
        <h1 class="font-hairline text-xl font-semibold mb-6 text-center text-gray-700">Sign Up with US</h1>
        <div class="border-t-4 border-blue-800 p-8 border-t-12 bg-gray-200 mb-6 rounded-lg shadow-lg">
            <form method="POST" action="{{route('post:sign-up')}}">
                @csrf
                <div class="mb-4">
                    <label class="font-bold text-gray-darker block mb-2">Email</label>
                    <input name="email" required type="text" class="block @error('email') border-2 border-red-500 @else border border-gray-100 @enderror appearance-none w-full bg-white hover:border-gray-600 px-2 py-2 rounded shadow" placeholder="Your Username">
                    @error('email') <span>{{$errors->first('email')}}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="font-bold text-gray-darker block mb-2">Password</label>
                    <input name="password" required type="password" class="block appearance-none w-full bg-white border border-gray-100 hover:border-gray-600 px-2 py-2 rounded shadow" placeholder="Your Password">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-teal-800 hover:bg-teal text-white font-bold py-2 px-4 rounded">
                        Sign Up
                    </button>

                    <a class="no-underline inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-700 float-right" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
        <div class="text-center">
            <p class="text-gray-dark text-sm">Already an user? <a href="{{route('login')}}" class="no-underline text-blue-500 font-bold">Log In Now</a>.</p>
        </div>
    </div>
</div>
@endsection