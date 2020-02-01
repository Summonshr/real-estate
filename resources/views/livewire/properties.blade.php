<div>
<div class="max-w-3xl bg-gray-100 rounded-sm">
    <h3 class="bg-blue-900 text-gray-300 p-2 px-4">My Properties</h3>
    <div class="p-4">
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
            @foreach($properties as $property)
            <tr class="border-b">
                <td class="text-gray-800 p-2 ">{{$property->name}}</td>
                <td class="text-gray-800 p-2 ">{{$property->type}}</td>
                <td class="text-gray-800 p-2 ">{{$property->purpose}}</td>
                <td class="text-gray-800 p-2 text-right">Rs. {{$property->price}} {{$property->unit}}</td>
                <td><a href="">Edit</a><a href="">photos</a><a href="">trash</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$properties->links()}}
    </div>
</div>
</div>
