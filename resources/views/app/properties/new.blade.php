@extends('template')

@section('main')
@if(auth()->user()->balance >= 100 || $property->exists)
<div class="p-8">
    <div x-data="{name: '{{old('name', $property->name)}}', type: '{{old('type', $property->type)}}', price: '{{old('price', $property->price)}}', unit: '{{old('unit', $property->unit)}}', purpose:'{{old('purpose',$property->purpose ?? 'sale')}}'}" class="bg-gray-100 max-w-xl border rounded-sm p-2">
        <h3 class="w-full px-2 pb-1 text-blue-700 font-semibold">New property</h3>
        <div class="">
            <hr class="mx-2">
            <form method="POST" action="{{route($property->exists ? 'properties.update' : 'properties.store', $property)}}">
                @csrf
                @if($property->exists)
                    @method('PUT')
                @endif
                <div class="flex flex-wrap">
                    <div class="p-2 w-full">
                        <label for="name">Name</label>
                        <input x-model="name" type="text" required name="name" class="@error('name') border-2 border-red-500 @else border @enderror  p-2 w-full" placeholder="e.g 16 ropani hill land">
                        @error('name') <span class="text-red-700">{{$errors->first('name')}}</span>@enderror
                    </div>
                    <div class="p-2 w-full">
                        <label for="purpose" class="w-full mr-4">Purpose: </label>
                        <span class="mr-4">
                            <input x-model="purpose" class="align-middle w-4 h-4" name="purpose" type="radio" value="sale" id="sale"> <span>For Sale</span>
                        </span>
                        <span class="mr-4">
                            <input x-model="purpose" class="align-middle w-4 h-4" name="purpose" type="radio" value="rent" id="rent"> <span>For Rent</span>
                        </span>
                    </div>
                    <div class="p-2 w-1/3">
                        <label for="type">Type</label>
                        <select x-model="type" name="type" required class="w-full @error('type') border-2 border-red-500 @else border @enderror p-2">
                            <option value="">Select an type</option>
                            @foreach(\App\Type::all() as $type)
                            <option value="{{$type->key}}">{{ucfirst($type->key)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-2 w-1/3">
                        <label for="price">Price</label>
                        <input x-model="price" type="text" required name="price" class="@error('price') border-2 border-red-500 @else border @enderror p-2 w-full">
                    </div>
                    <div class="p-2 w-1/3">
                        <label for="unit">Unit</label>
                        <template x-if="purpose=='rent'">
                            <select x-model="unit" name="unit" class="w-full @error('unit') border-2 border-red-500 @else border @enderror p-2">
                                <option value="">Select a unit</option>
                                <option value="month">per Month</option>
                                <option value="year">per Year</option>
                                <option value="day">per Day</option>
                                <option value="week">per Week</option>
                            </select>
                        </template>
                        <template x-if="purpose=='sale'">
                            <select x-model="unit" name="unit" class="w-full @error('unit') border-2 border-red-500 @else border @enderror p-2">
                                <option value="">Select a unit</option>
                                <option value="aana">per Aana</option>
                                <option value="ropani">per Ropani</option>
                            </select>
                        </template>
                    </div>
                    <div class="w-full p-2">
                        <button class="@if($property->exists) bg-green-800 text-green-100  hover:bg-green-700 @else bg-blue-800 text-gray-100 hover:bg-blue-700 @endif p-2 mr-2 px-4 rounded" type="submit">{{$property->exists ? 'Update' : 'Add'}}</button>
                        @if($property->exists)
                            <button type="button" class="text-red-800">Trash</button>
                        @else
                            <button class=" p-2 px-4 text-red-800 rounded outline-none" type="reset">Clear</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="border-t-4 border-red-500 w-full shadow max-w-sm m-auto mt-8 h-64 bg-red-100 rounded-sm flex items-center flex-wrap">
    <p class="max-w-xs mx-auto text-center w-ful text-red-500 font-semibold">
        You do not have sufficient balance to add new property.
    </p>
    <div class='w-full flex justify-center'>
    <svg class="w-12 h-12" id="icons" enable-background="new 0 0 64 64" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg">
        <path d="m18.002 64h27.996c2.757 0 5-2.243 5-5v-7.996-34.004-12c0-2.757-2.243-5-5-5h-27.996c-2.757 0-5 2.243-5 5v12 34.004 7.996c0 2.757 2.243 5 5 5zm27.996-2h-27.996c-1.654 0-3-1.346-3-3v-4.021c.838.635 1.87 1.025 3 1.025h27.996c1.13 0 2.162-.391 3-1.025v4.021c0 1.654-1.346 3-3 3zm-30.996-57c0-1.654 1.346-3 3-3h27.996c1.654 0 3 1.346 3 3v12 34.004c0 1.654-1.346 3-3 3h-27.996c-1.654 0-3-1.346-3-3v-34.004z" />
        <path d="m20.998 58h-3c-.553 0-1 .447-1 1s.447 1 1 1h3c.553 0 1-.447 1-1s-.447-1-1-1z" />
        <path d="m26.997 58h-3c-.553 0-1 .447-1 1s.447 1 1 1h3c.553 0 1-.447 1-1s-.447-1-1-1z" />
        <path d="m46.016 58h-3c-.553 0-1 .447-1 1s.447 1 1 1h3c.553 0 1-.447 1-1s-.448-1-1-1z" />
        <path d="m28.025 28.09c.007.07.02.135.041.201.019.061.041.117.07.172.029.056.064.105.104.155.044.054.09.101.144.145.025.021.04.049.067.067.034.023.072.033.108.051.033.017.064.034.101.047.112.042.229.07.345.07h.001 4.131l-2.963 4.442c-.307.459-.183 1.08.277 1.387.17.113.363.168.554.168.323 0 .641-.156.833-.445l4-5.997c.018-.026.02-.057.034-.083.032-.059.057-.12.076-.186s.034-.13.04-.198c.003-.03.018-.057.018-.088 0-.033-.016-.061-.019-.093-.007-.069-.02-.134-.041-.201-.019-.061-.041-.117-.07-.172-.029-.056-.064-.105-.104-.155-.044-.054-.09-.101-.144-.145-.025-.021-.04-.049-.067-.067-.026-.018-.057-.02-.084-.034-.059-.032-.119-.056-.185-.076s-.131-.034-.199-.04c-.03-.003-.056-.018-.087-.018h-4.132l2.964-4.444c.307-.459.183-1.08-.277-1.387-.462-.308-1.081-.183-1.387.277l-4 5.999c-.018.026-.02.057-.034.084-.032.059-.057.119-.076.185s-.034.13-.04.198c-.003.03-.018.057-.018.088.001.034.016.062.019.093z" />
        <path d="m32 38.995c6.065 0 11-4.935 11-10.999 0-6.065-4.935-11-11-11s-11 4.935-11 11 4.935 10.999 11 10.999zm0-19.998c4.963 0 9 4.037 9 9 0 4.962-4.037 8.999-9 8.999s-9-4.037-9-8.999c0-4.963 4.037-9 9-9z" /></svg>

    </div>
    <a href="{{route('recharge')}}" class="mx-auto bg-blue-800 text-blue-200 p-2 rounded">Recharge</a>
</div>
@endif
@endsection
