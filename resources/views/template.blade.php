@extends('layout')

@section('content')
<div class="flex w-full">
    <div id="sidebar" class="hidden sm:block sm:w-48 md:w-64 bg-blue-900 text-blue-100 h-screen ">
        <h2 class="block p-4 bg-gray-900 font-bold text-xl italic">Real Estate</h2>
        <div class="sidebar-list">
            <ul class="list-reset p-4">
                <li><a href="{{route('properties.index')}}" class="@if(url()->current() === route('properties.index')) bg-gray-800  @endif block p-2 rounded-lg">Properties</a></li>
                <li><a href="{{route('themes.index')}}" class="@if(url()->current() === route('themes.index')) bg-gray-800  @endif block p-2 rounded-lg">Themes</a></li>
                <li><a href="{{route('recharge')}}" class="@if(url()->current() === route('recharge')) bg-gray-800  @endif block p-2 rounded-lg">Recharge</a></li>
            </ul>
        </div>
    </div>
    <div id="content" class="flex-1 flex-grow overflow-y-auto h-screen w-full">
        <header class="px-4 py-2 bg-gray-100 ">
            <div class="flex justify-between px-4">
                <span class="text-gray-700 font-bold align-middle">Account Activity</span>
                <span class="pt-1">
                    {{auth()->user()->getName()}} / <a href='{{route('logout')}}' class="text-gray-700 font-semibold">Log Out</a>
                </span>
            </div>
            <div class="w-full px-4 py-2">
                <span class="text-2xl font-bold text-blue-800 align-middle mr-8">
                    Agent Account
                </span>
                <span class="active bg-green-200  hover:bg-green-800 px-2 py-1 uppercase rounded text-green-800 hover:text-green-100 font-bold">Active</span>
                <a href="/profile" class="inline-block align-middle -mt-1">
                    <svg class="w-6 h-6 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                        <path fill="#607D8B" d="M39.6,27.2c0.1-0.7,0.2-1.4,0.2-2.2s-0.1-1.5-0.2-2.2l4.5-3.2c0.4-0.3,0.6-0.9,0.3-1.4L40,10.8c-0.3-0.5-0.8-0.7-1.3-0.4l-5,2.3c-1.2-0.9-2.4-1.6-3.8-2.2l-0.5-5.5c-0.1-0.5-0.5-0.9-1-0.9h-8.6c-0.5,0-1,0.4-1,0.9l-0.5,5.5c-1.4,0.6-2.7,1.3-3.8,2.2l-5-2.3c-0.5-0.2-1.1,0-1.3,0.4l-4.3,7.4c-0.3,0.5-0.1,1.1,0.3,1.4l4.5,3.2c-0.1,0.7-0.2,1.4-0.2,2.2s0.1,1.5,0.2,2.2L4,30.4c-0.4,0.3-0.6,0.9-0.3,1.4L8,39.2c0.3,0.5,0.8,0.7,1.3,0.4l5-2.3c1.2,0.9,2.4,1.6,3.8,2.2l0.5,5.5c0.1,0.5,0.5,0.9,1,0.9h8.6c0.5,0,1-0.4,1-0.9l0.5-5.5c1.4-0.6,2.7-1.3,3.8-2.2l5,2.3c0.5,0.2,1.1,0,1.3-0.4l4.3-7.4c0.3-0.5,0.1-1.1-0.3-1.4L39.6,27.2z M24,35c-5.5,0-10-4.5-10-10c0-5.5,4.5-10,10-10c5.5,0,10,4.5,10,10C34,30.5,29.5,35,24,35z" />
                        <path fill="#455A64" d="M24,13c-6.6,0-12,5.4-12,12c0,6.6,5.4,12,12,12s12-5.4,12-12C36,18.4,30.6,13,24,13z M24,30c-2.8,0-5-2.2-5-5c0-2.8,2.2-5,5-5s5,2.2,5,5C29,27.8,26.8,30,24,30z" /></svg></a>
            </div>
            <div class="px-4 py-2 flex flex-wrap justify-between">
                <div class="flex flex-wrap justify-between flex-1 flex-grow max-w-xs pt-2">
                    <p class="">
                        <span class="text-gray-600 font-normal uppercase" >Phone Number</span>
                        <br>
                        <span class="font-semibold text-gray-700">{{auth()->user()->phone ?? 9841145614}}</span>
                    </p>
                    <p class="">
                        <span class="text-gray-600 font-normal uppercase" >Type</span>
                        <br>
                        <span class="font-semibold text-gray-700">{{ucfirst(auth()->user()->role)}}</span>
                    </p>
                    <p class="">
                        <span class="text-gray-600 font-normal uppercase" >Joined at</span>
                        <br>
                        <span class="font-semibold text-gray-700">{{auth()->user()->created_at->toFormattedDateString()}}</span>
                    </p>
                </div>
                <p class="">
                    <span class="text-gray-600 font-normal uppercase text-base">Balance</>
                        <br>
                        <span class="font-extrabold text-gray-700 text-green-800 text-3xl align-middle">Rs. {{auth()->user()->balance}}</span>
                        @if(route('recharge') !== url()->current())
                        <a href="{{route('recharge')}}" class="py-1 align-middle hover:bg-green-800 bg-green-200 hover:text-green-200 text-green-800 text-xs rounded-full px-4">Recharge</a>
                        @endif
                </p>
            </div>
        </header>
        <div class="content-area">
            @yield('main')
        </div>
    </div>
</div>
@endsection
