@extends('template')

@section('main')
<div class="p-8">
    @if(auth()->user()->properties()->count() === 0)
    <div class="m-auto h-64 w-full max-w-sm bg-gray-100 flex flex-col justify-around border-t-4 border-blue-700 rounded-sm">
        <div class="w-full flex justify-between">
            <svg class="w-24 h-24 mx-auto" id="Layer_1" enable-background="new 0 0 512.843 512.843" height="256" viewBox="0 0 512.843 512.843" width="256" xmlns="http://www.w3.org/2000/svg">
                <path d="m398.254 492.44c0 11.046-8.954 20-20 20s-20-8.954-20-20 8.954-20 20-20 20 8.954 20 20zm-288-19.964c-11.028 0-20-8.972-20-20v-246.489l166-151.439 166 151.439v72.147c13.732 3.002 27.121 7.419 40 13.19v-48.846l23.296 21.252 26.958-29.55-256.254-233.776-256.254 233.776 26.958 29.55 23.296-21.252v209.998c0 33.084 26.916 59.964 60 59.964h208.744l-39.957-39.964zm268-83.036c-24.131 0-50.247 11.167-68.241 29.143l-14.15 14.135 28.269 28.299 14.15-14.134c10.607-10.597 27.261-17.442 40.972-17.442 13.55 0 29.168 6.847 39.775 17.442l14.15 14.134 28.269-28.299-14.15-14.135c-17.996-17.977-45.074-29.143-69.044-29.143zm120.486-24.825c-32.822-33.002-75.379-51.177-119.833-51.176-44.463.001-87.021 18.176-119.834 51.178l-14.103 14.183 28.365 28.203 14.102-14.183c25.25-25.394 57.734-39.38 91.47-39.381 33.728-.001 66.213 13.985 91.471 39.383l14.103 14.181 28.362-28.207z" />
            </svg>
        </div>
        <p class="w-full text-center text-gray-700 font-semibold">You have no properties as of now.</p>
        <div class="w-full flex justify-center">
            <a class="bg-gray-700 text-gray-100 px-4 py-2 w-24 mx-auto" href="{{route('properties.create')}}">Add one</a>
        </div>
    </div>
    @else
        @livewire($component)
    @endif
</div>
@endsection