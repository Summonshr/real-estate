@extends('template')

@section('main')
@if(auth()->user()->hasEnoughBalance() || $site->exists)
<div class="p-8">
    <div x-data="{name: '{{old('name', $site->name)}}', type: '{{old('type', $site->type)}}', price: '{{old('price', $site->price)}}', unit: '{{old('unit', $site->unit)}}', purpose:'{{old('purpose',$site->purpose ?? 'sale')}}'}" class="bg-gray-100 max-w-xl border rounded-sm p-2">
        <h3 class="w-full px-2 pb-1 text-blue-700 font-semibold">New site</h3>
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
                            <div class="inline pt-2 bg-blue-200 text-blue-800 font-semibold px-2">https://</div>
                            <input x-model="url" required name="url" type="url" placehoder="https://ghargadijagga.com" class="@error('url') border-2 border-red-500 @else border @enderror  p-2 flex-1 flex-grow align-midde" placeholder="e.g Ghar Gadi Nepal Sangathan">
                        </div>
                        @error('url') <span class="text-red-700">{{$errors->first('url')}}</span>@enderror
                    </div>
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
            <form class="hidden" x-ref="delete" action="{{route('properties.destroy', $site)}}" method="POST">
                @method('delete')
                @csrf
            </form>
            @endif
        </div>
    </div>
</div>
@else
    @include('insufficient',['type'=>'site'])
@endif
@endsection
