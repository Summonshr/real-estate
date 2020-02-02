<div class="bg-gray-100 max-w-5xl rounded-sm" id="dropzone">
    <h3 class="bg-gray-900 text-gray-100 p-2">Photos</h3>
    <div class="medias p-2">
        @foreach($this->property->getMedia('images')->groupby('mime_type') as $key => $medias)
        <div>
            <h4>
                {{ucfirst(explode('/',$key)[0])}}s
            </h4>
            <hr>
            <div class="flex flex-wrap">
                @foreach($medias as $media)
                <div wire:key="{{$media->id}}" class="w-1/5 p-2 relative">
                    <div class="absolute top-0 right-0 mr-2 mt-2" x-data="{open:false}">
                        <button class="bg-blue-900 px-2 float-right"  x-on:click="open=!open">...</button>
                        <div x-show="open" class="bg-blue-900 mt-6">
                            <ul>
                                <li wire:click="setFeatured({{$media->id}})" x-on:click="open=false" class="px-2 py-1 text-blue-100 border-blue-800 border-b cursor-pointer hover:bg-blue-800">Set as featured</li>
                                <li wire:click="deleteMedia({{$media->id}})" class="px-2 py-1 text-blue-100 border-blue-800 border-b cursor-pointer hover:bg-blue-800">Delete</li>
                            </ul>
                        </div>
                    </div>
                    <div class="border shadow h-24 overflow-hidden object-cover">
                        {{$media}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
   <div class="p-2 px-4">
   <form action="{{route('properties.media.store', $this->property)}}" enctype="multipart/form-data" method="post" id="my-awesome-dropzone">
        @csrf
        <label for="file" class="fallback w-full block">
            <input onchange="this.form.submit()" name="file" id='file' class="w-full h-full" type="file" />
        </label>
    </form>
   </div>
</div>