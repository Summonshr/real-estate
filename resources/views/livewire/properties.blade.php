<div>
    <div class="w-full flex justify-between">
        <a href=""></a>
    </div>
    <div class="max-w-3xl bg-gray-100 rounded-sm">
        <h3 class="bg-blue-900 text-gray-300 p-2 px-4 flex justify-between"><span>My Properties</span>
        <a href="{{route('properties.create')}}" class="align-middle bg-green-300 text-green-900 transition px-2 rounded hover:bg-green-900 hover:text-green-100 text-sm"><span>Add New</span>
<svg class="inline w-4 h-4 align-middle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="64px" height="64px"><path fill="#32BEA6" d="M7.9,256C7.9,119,119,7.9,256,7.9C393,7.9,504.1,119,504.1,256c0,137-111.1,248.1-248.1,248.1C119,504.1,7.9,393,7.9,256z"/><path fill="#FFF" d="M391.5,214.5H297v-93.9c0-4-3.2-7.2-7.2-7.2h-68.1c-4,0-7.2,3.2-7.2,7.2v93.9h-93.9c-4,0-7.2,3.2-7.2,7.2v69.2c0,4,3.2,7.2,7.2,7.2h93.9v93.4c0,4,3.2,7.2,7.2,7.2h68.1c4,0,7.2-3.2,7.2-7.2v-93.4h94.5c4,0,7.2-3.2,7.2-7.2v-69.2C398.7,217.7,395.4,214.5,391.5,214.5z"/></svg>
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
                    <tr class="border-b" wire:key="{{$property->id}}">
                        <td class="text-gray-800 p-2 ">{{$property->name}}</td>
                        <td class="text-gray-800 p-2 ">{{$property->type}}</td>
                        <td class="text-gray-800 p-2 ">{{$property->purpose}}</td>
                        <td class="text-gray-800 p-2 text-right">Rs. {{$property->price}}/{{$property->unit}}</td>
                        <td>
                            <div class="flex flex-wrap justify-around">
                                <a href="{{route('properties.edit',$property)}}">
                                    <svg fill="#3a68bd" class="w-4 h-4" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 383.947 383.947" style="enable-background:new 0 0 383.947 383.947;">
                                        <g>
                                            <g>
                                                <g>
                                                    <polygon points="0,303.947 0,383.947 80,383.947 316.053,147.893 236.053,67.893" />
                                                    <path d="M377.707,56.053L327.893,6.24c-8.32-8.32-21.867-8.32-30.187,0l-39.04,39.04l80,80l39.04-39.04 C386.027,77.92,386.027,64.373,377.707,56.053z" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <a href="{{route('properties.photos', $property)}}">
                                    <svg class="w-4 h-4" version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 420.8 420.8" style="enable-background:new 0 0 420.8 420.8;">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M406.8,96.4c-8.4-8.8-20-14-33.2-14h-66.4v-0.8c0-10-4-19.6-10.8-26c-6.8-6.8-16-10.8-26-10.8h-120c-10.4,0-19.6,4-26.4,10.8c-6.8,6.8-10.8,16-10.8,26v0.8h-66c-13.2,0-24.8,5.2-33.2,14c-8.4,8.4-14,20.4-14,33.2v199.2C0,342,5.2,353.6,14,362c8.4,8.4,20.4,14,33.2,14h326.4c13.2,0,24.8-5.2,33.2-14c8.4-8.4,14-20.4,14-33.2V129.6C420.8,116.4,415.6,104.8,406.8,96.4z M400,328.8h-0.4c0,7.2-2.8,13.6-7.6,18.4s-11.2,7.6-18.4,7.6H47.2c-7.2,0-13.6-2.8-18.4-7.6c-4.8-4.8-7.6-11.2-7.6-18.4V129.6c0-7.2,2.8-13.6,7.6-18.4s11.2-7.6,18.4-7.6h77.2c6,0,10.8-4.8,10.8-10.8V81.2c0-4.4,1.6-8.4,4.4-11.2s6.8-4.4,11.2-4.4h119.6c4.4,0,8.4,1.6,11.2,4.4c2.8,2.8,4.4,6.8,4.4,11.2v11.6c0,6,4.8,10.8,10.8,10.8H374c7.2,0,13.6,2.8,18.4,7.6s7.6,11.2,7.6,18.4V328.8z" />
                                                    <path d="M210.4,130.8c-27.2,0-52,11.2-69.6,28.8c-18,18-28.8,42.4-28.8,69.6s11.2,52,28.8,69.6c18,18,42.4,28.8,69.6,28.8s52-11.2,69.6-28.8c18-18,28.8-42.4,28.8-69.6s-11.2-52-28.8-69.6C262.4,142,237.6,130.8,210.4,130.8z M264.8,284c-14,13.6-33.2,22.4-54.4,22.4S170,297.6,156,284c-14-14-22.4-33.2-22.4-54.4c0-21.2,8.8-40.4,22.4-54.4c14-14,33.2-22.4,54.4-22.4s40.4,8.8,54.4,22.4c14,14,22.4,33.2,22.4,54.4C287.6,250.8,278.8,270,264.8,284z" />
                                                    <circle cx="352.8" cy="150" r="19.6" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <form x-data="{}" x-on:submit="if(!confirm('Are you sure?')) return false;" action="{{route('properties.destroy', $property)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"> <svg fill="#942929" class="w-4 h-4" height="427pt" viewBox="-40 0 427 427.00131" width="427pt" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                            <path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                            <path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                            <path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" /></svg>
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