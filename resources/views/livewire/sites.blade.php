<div class="flex flex-justify-between p-4">
    @foreach(auth()->user()->sites as $site)
    <div class="w-1/4 h-64 relative">
        <img src="{{$site->image_url}}" class="h-full" alt="{{$site->name}}">
        <a href="{{route('sites.show', $site)}}" class="absolute p-2 px-4 bottom-0 bg-blue-800 w-full text-blue-100 block">{{$site->name}}</a>
    </div>
    @endforeach
</div>