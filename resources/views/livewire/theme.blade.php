<div class="flex flex-wrap p-2">
    @foreach(\App\Theme::all() as $theme)
    <div class="w-1/4 p-2 relative">
        <div wire:click="" class="relative cursor-pointer  h-full">
            <a href="/preview" class="bg-green-100 hover:bg-green-900 text-green-900 mt-1 mr-1 hover:text-green-100 px-2 rounded-full absolute top-0 right-0">Preview</a>
            <img src="{{$theme->image_url}}" class="h-full object-cover w-full" alt="{{$theme->name}}">
            <div class="absolute z-20 bottom-0 w-full bg-blue-900 text-blue-100 px-2 py-1  flex flex-wrap justify-between w-full"><span>{{$theme->name}}</span></div>
        </div>
    </div>
    @endforeach
</div>