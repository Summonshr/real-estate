@extends('layout')

@section('content')
    <div class="flex w-full">
        <div id="sidebar" class="hidden sm:block sm:w-48 md:w-64 bg-blue-900 text-blue-100 h-screen ">
            <h2 class="w-full p-4 bg-gray-900">Logo|Site Title</h2>
            <div class="sidebar-list">
                <ul class="list-reset p-4">
                    <li><a href="{{route('properties')}}" class="bg-gray-800 block p-2 rounded-lg">Properties</a></li>
                    <li><a href="{{route('contacts')}}" class=" block p-2 rounded-lg">Contacts</a></li>
                    <li><a href="{{route('profile')}}" class=" block p-2 rounded-lg">Profile</a></li>
                    <li><a href="{{route('logout')}}" class=" block p-2 rounded-lg">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div id="content" class="flex-1 flex-grow overflow-y-auto h-screen w-full">
            <header class="p-4 bg-blue-200 flex justify-between">
                <span></span>
                <span>
                {{auth()->user()->getName()}} / <a href='{{route('logout')}}' class="text-gray-700 font-semibold">Log Out</a>
                </span>
            </header>
            <div class="content-area">
                @yield('main')
            </div>
        </div>
    </div>
@endsection