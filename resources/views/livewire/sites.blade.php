<div>
    <div class="flex flex-wrap p-2">
        @foreach($sites as $site)
        <div class="p-2  w-1/4">
        <div class="border h-full relative">
            <img class="w-full h-full" src="{{$site->image_url ?? $site->dummy_image}}" alt="{{$site->name}}">
            <div class="absolute bottom-0 w-full">
                <p class="bg-gray-800 text-gray-100 font-semibold px-2 py-1"><a href="{{$site->url}}">{{$site->name}}</a></p>
            </div>
        </div>
        </div>
        @endforeach
    </div>
</div>