<div class="p-8">
<div class="max-w-xl bg-gray-100 rounded-sm p-2">
    <table class="w-full">
        <thead>
            <tr class="border-b">
                <th class="text-left text-gray-700 p-2 ">Name</th>
                <th class="text-left text-gray-700 p-2 ">Type</th>
                <th class="text-left text-gray-700 p-2 ">For</th>
                <th class="text-right text-gray-700 p-2 ">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr class="border-b">
                <td class="text-gray-800 p-2 ">{{$property->name}}</td>
                <td class="text-gray-800 p-2 ">{{$property->type}}</td>
                <td class="text-gray-800 p-2 ">{{$property->purpose}}</td>
                <td class="text-gray-800 p-2 text-right">Rs. {{$property->price}} {{$property->unit}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>