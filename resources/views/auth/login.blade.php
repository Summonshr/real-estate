@extends('layout')

@section('content')
<div class="container h-full flex justify-center items-center m-auto">
    <div class="w-1/3">
        <h1 class="font-hairline mb-6 text-center">Login to our Website</h1>
        <div class="border-t-4 border-blue-800 p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
            <form action="{{route('post:sign-in')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="font-bold text-grey-darker block mb-2">Email</label>
                    <input type="text" value="{{old('email',\App\User::first()->email)}}" required name="email" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow" placeholder="Your Email">
                </div>
                <div class="mb-4">
                    <label class="font-bold text-grey-darker block mb-2">Password</label>
                    <input type="password" value="password" required name="password" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow" placeholder="Your Password">
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-teal-800 hover:bg-teal text-white font-bold py-2 px-4 rounded">
                        Login
                    </button>
                    <a class="no-underline inline-block align-baseline font-bold text-sm text-blue hover:text-blue-dark float-right" href="#">
                        Forgot Password?
                    </a>
                </div>
                @if($errors->count() > 0)
                    <span class="text-red-600 font-semibold">Invalid credentials.</span>
                @endif
            </form>
        </div>
        <div class="text-center">
            <p class="text-grey-dark text-sm">Don't have an account? <a href="{{route('sign-up')}}" class="no-underline text-blue font-bold">Create an Account</a>.</p>
        </div>
    </div>
</div>
@endsection