<div class="bg-gray-100 w-full h-full p-4 py-2">
    <h3 class="border-b text-xl font-semibold text-green-800 mb-2">Details</h3>
    Choose tag and press submit
    <div class="flex flex-wrap">
        <select wire:model.debounce.500s="tag" class="border flex-1 flex-grow w-full p-2 mr-2">
            @foreach($this->options as $key=> $option)
            <option value="{{$key}}">{{$option}}</option>
            @endforeach
        </select>
        <button wire:click="add" class="w-24 bg-gray-800 text-gray-100">Add</button>
    </div>
</div>
