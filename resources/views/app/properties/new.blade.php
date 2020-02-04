@extends('template')

@section('main')
@if(auth()->user()->hasEnoughBalance() || $property->exists)
<div class="p-8">
    <div x-data="{name: '{{old('name', $property->name)}}', type: '{{old('type', $property->type)}}', price: '{{old('price', $property->price)}}', unit: '{{old('unit', $property->unit)}}', purpose:'{{old('purpose',$property->purpose ?? 'sale')}}'}" class="bg-gray-100 max-w-xl border rounded-sm p-2">
        <h3 class="w-full px-2 pb-1 text-blue-700 font-semibold">New property</h3>
        <div class="">
            <hr class="mx-2">
            <form x-on:submit="$refs.submit.disabled = true" method="POST" action="{{route($property->exists ? 'properties.update' : 'properties.store', $property)}}">
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
                            <input required x-model="purpose" class="align-middle w-4 h-4" name="purpose" type="radio" value="sale" id="sale"> <span>For Sale</span>
                        </span>
                        <span class="mr-4">
                            <input required x-model="purpose" class="align-middle w-4 h-4" name="purpose" type="radio" value="rent" id="rent"> <span>For Rent</span>
                        </span>
                    </div>
                    <div class="p-2 w-1/3">
                        <label for="type">Type</label>
                        <select required x-model="type" name="type" required class="w-full @error('type') border-2 border-red-500 @else border @enderror p-2">
                            <option value="">Select an type</option>
                            @foreach(\App\Type::all() as $type)
                            <option value="{{$type->key}}">{{ucfirst($type->key)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-2 w-1/3">
                        <label for="price">Price</label>
                        <input required x-model="price" type="text" required name="price" class="@error('price') border-2 border-red-500 @else border @enderror p-2 w-full">
                    </div>
                    <div class="p-2 w-1/3">
                        <label for="unit">Unit</label>
                        <template x-if="purpose=='rent'">
                            <select required x-model="unit" name="unit" class="w-full @error('unit') border-2 border-red-500 @else border @enderror p-2">
                                <option value="">Select a unit</option>
                                <option value="month">per Month</option>
                                <option value="year">per Year</option>
                                <option value="day">per Day</option>
                                <option value="week">per Week</option>
                            </select>
                        </template>
                        <template x-if="purpose=='sale'">
                            <select required x-model="unit" name="unit" class="w-full @error('unit') border-2 border-red-500 @else border @enderror p-2">
                                <option value="">Select a unit</option>
                                <option value="aana">per Aana</option>
                                <option value="ropani">per Ropani</option>
                            </select>
                        </template>
                    </div>
                    <div class="w-full p-2">
                        <button x-ref="submit" class="@if($property->exists) bg-green-800 text-green-100  hover:bg-green-700 @else bg-blue-800 text-gray-100 hover:bg-blue-700 @endif p-2 mr-2 px-4 rounded" type="submit">{{$property->exists ? 'Update' : 'Add'}}</button>
                        @if($property->exists)
                            <button x-ref="trash" type="button" x-on:click="confirm('Are you sure') && $refs.delete.submit()" class="text-red-800">Trash</button>
                        @else
                            <button x-ref="trash" class=" p-2 px-4 text-red-800 rounded outline-none" type="reset">Clear</button>
                        @endif
                    </div>
                </div>
            </form>
            @if($property->exists)
            <form class="hidden" x-ref="delete" action="{{route('properties.destroy', $property)}}" method="POST">
                @method('delete')
                @csrf
            </form>
            @endif
        </div>
    </div>
</div>
@else
    @include('insufficient',['type'=>'property'])
@endif
@endsection
