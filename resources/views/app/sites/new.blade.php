@extends('template')

@section('main')
@if(auth()->user()->hasEnoughBalance() || $site->exists)
<div x-data="{name: '{{old('name', $site->name)}}', url: '{{old('url', $site->url)}}'}"  class="p-8 flex flex-wrap">
    <div class="bg-gray-100 max-w-xl border rounded-sm p-2">
        <h3 class="w-full px-2 pb-1 text-blue-700 font-semibold">{{$site->exists? 'Edit' : 'New'}} site</h3>
        <div class="">
            <hr class="mx-2">
            <form method="POST" action="{{route($site->exists ? 'sites.update' : 'sites.store', $site)}}">
                @csrf
                @if($site->exists)
                    @method('PUT')
                @endif
                <div class="flex flex-wrap">
                    <div class="p-2 w-full">
                        <label for="name">Name</label>
                        <input x-model="name" type="text" required name="name" class="@error('name') border-2 border-red-500 @else border @enderror  p-2 w-full" placeholder="e.g Ghar Gadi Nepal Sangathan">
                        @error('name') <span class="text-red-700">{{$errors->first('name')}}</span>@enderror
                    </div>
                    <div class="p-2 w-full">
                        <label for="name">Website Url</label>
                        <div class="flex flex-wrap justify-between">
                            <input x-model="url" required name="url" placeholder="https://ghargadijagga.com" class="@error('url') border-2 border-red-500 @else border @enderror  p-2 flex-1 flex-grow align-midde" >
                        </div>
                        @error('url') <span class="text-red-700">{{$errors->first('url')}}</span>@enderror
                    </div>
                    @if($site->exists)
                    <div class="p-2 w-full">
                        <label for="theme">Theme</label>
                        <select name="theme_id" @change="$refs.preview.src=event.target.options[event.target.options.selectedIndex].dataset.image" class="@error('theme_id') border-red border @enderror w-full border p-2">
                            @foreach(\App\Theme::all() as $theme)
                            <option @if($theme->id === $site->theme_id) selected @endif class="leading-loose text-blue-100 bg-blue-900" data-image="{{$theme->image_url}}" value="{{$theme->id}}">{{$theme->name}}</option>
                            @endforeach
                        </select>
                        @error('theme_id') <span class="text-red-700">{{$errors->first('theme_id')}}</span>@enderror
                    </div>
                    @endif
                    <div class="w-full p-2">
                        <button class="@if($site->exists) bg-green-800 text-green-100  hover:bg-green-700 @else bg-blue-800 text-gray-100 hover:bg-blue-700 @endif p-2 mr-2 px-4 rounded" type="submit">{{$site->exists ? 'Update' : 'Add'}}</button>
                        @if($site->exists)
                            <button type="button" x-on:click="confirm('Are you sure') && $refs.delete.submit()" class="text-red-800">Trash</button>
                        @else
                            <button class=" p-2 px-4 text-red-800 rounded outline-none" type="reset">Clear</button>
                        @endif
                    </div>
                </div>
            </form>
            @if($site->exists)
            <form class="hidden" x-ref="delete" action="{{route('sites.destroy', $site)}}" method="POST">
                @method('delete')
                @csrf
            </form>
            @endif
        </div>
    </div>
    @if($site->exists)
    <div class="flex-1 flex-grow">
        <img src="{{$site->image_url}}" x-ref='preview' alt="" srcset="">
    </div>
    @endif
</div>
@else
    @include('insufficient',['type'=>'site'])
@endif
@endsection
