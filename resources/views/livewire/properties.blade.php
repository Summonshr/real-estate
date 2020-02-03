<div>
    <div class="w-full flex justify-between">
        <a href=""></a>
    </div>
    <div class="max-w-3xl bg-gray-100 rounded-sm">
        <h3 class="bg-blue-900 text-gray-300 p-2 px-4 flex justify-between"><span>My Properties</span>
            <a href="{{route('properties.create')}}" class="align-middle bg-green-300 text-green-900 transition px-2 rounded hover:bg-green-900 hover:text-green-100 text-sm"><span>Add New</span>
                <svg class="inline w-4 h-4 align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="64px" height="64px">
                    <path fill="#32BEA6" d="M7.9,256C7.9,119,119,7.9,256,7.9C393,7.9,504.1,119,504.1,256c0,137-111.1,248.1-248.1,248.1C119,504.1,7.9,393,7.9,256z" />
                    <path fill="#FFF" d="M391.5,214.5H297v-93.9c0-4-3.2-7.2-7.2-7.2h-68.1c-4,0-7.2,3.2-7.2,7.2v93.9h-93.9c-4,0-7.2,3.2-7.2,7.2v69.2c0,4,3.2,7.2,7.2,7.2h93.9v93.4c0,4,3.2,7.2,7.2,7.2h68.1c4,0,7.2-3.2,7.2-7.2v-93.4h94.5c4,0,7.2-3.2,7.2-7.2v-69.2C398.7,217.7,395.4,214.5,391.5,214.5z" /></svg>
            </a>
        </h3>
        <div class="p-4">
            <div class="flex flex-wrap justify-between">
                <select name="border border-gray-800 leading-loose" wire:key="display" wire:model="display" class="border" id="display">
                    <option value="all">All</option>
                    <option value="with-trashed">With Trashed</option>
                    <option value="only-trashed">Only Trashed</option>
                </select>
                <input type="text" wire:model.debounce.500ms="search" wire:key="search" class="border p-1 px-2" placeholder="Search my property...">
            </div>
            <table class="w-full mb-4">
                <thead>
                    <tr class="border-b">
                        <th wire:click="sortWith('name')" class="cursor-pointer text-left text-gray-700 p-2 ">Name</th>
                        <th wire:click="sortWith('type')" class="cursor-pointer text-left text-gray-700 p-2 ">Type</th>
                        <th wire:click="sortWith('purpose')" class="cursor-pointer text-left text-gray-700 p-2 ">For</th>
                        <th wire:click="sortWith('price')" class="cursor-pointer text-right text-gray-700 p-2 ">Price</th>
                        <th class="text-gray-700 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($properties->isEmpty())
                    <tr class="border-b">
                        <td class="text-gray-800 p-2" colspan="5">Nothing found...</td>
                    </tr>
                    @endif
                    @foreach($properties as $property)
                    <tr class="border-b @if($loop->even) bg-blue-100 @endif" wire:key="{{$property->id}}">
                        <td class="text-gray-800 p-2 "><a class="text-blue-800 font-semibold" href="{{route('properties.show',$property)}}">{{$property->name}}</a></td>
                        <td class="text-gray-800 p-2 ">{{$property->type}}</td>
                        <td class="text-gray-800 p-2 ">{{$property->purpose}}</td>
                        <td class="text-gray-800 p-2 text-right">Rs. {{$property->price}}/{{$property->unit}}</td>
                        <td>
                            <div class="flex flex-wrap justify-around">
                                <a href="{{route('properties.edit',$property)}}">
                                    @include('svgs.edit')
                                </a>
                                <a href="{{route('properties.media', $property)}}">
                                    @include('svgs.camera')
                                </a>
                                <form x-data="{}" x-ref="delete_property_{{$property->id}}" action="{{route('properties.destroy', $property)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click="destroy({{$property->id}})" type="button">
                                        @include('svgs.trash')
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$properties->links()}}
        </div>
    </div>
</div>