<div class="max-w-3xl p-8">
    <h3 class="bg-gray-900 text-gray-100 py-2 px-4">Profile</h3>
    <div class="flex flex-wrap p-4  bg-blue-200">
        <div class="w-2/3 flex flex-wrap items-start">
            <form method="POST" action="{{route('profile.update')}}" class="w-full flex flex-wrap">
                @csrf
                <div class="w-full pt-2">
                    <label for="fullname" class="w-full">Full Name</label>
                    <div class="pr-4"><input type="text" name="name" wire:model.debounce.500s="name" class="p-1 w-full border-b bg-gray-100 border-gray-500"></div>
                </div>
                <div class="w-1/2 pt-2">
                    <label for="fullname" class="w-1/2">Phone Number</label>
                    <div class="pr-4"><input type="text" name="phone" wire:model="phone" class="p-1 w-full border-b bg-gray-100 border-gray-500"></div>
                </div>
                <div class="w-1/2 pt-2">
                    <label for="fullname" class="w-1/2">Email Address</label>
                    <div class="pr-4"><input type="email" disabled name="email" wire:model="email" class="p-1 w-full border-b bg-gray-400 border-gray-500"></div>
                </div>
                <div class="w-full pt-2">
                    <label for="address" class="w-full">Address</label>
                    <div class="pr-4">
                        <input class="p-1 w-full border-b bg-gray-100 border-gray-500" wire:model="address" type="text" name="address">
                    </div>
                </div>
                <div class="w-full mt-2 pt-2">
                    <button wire.di wire:click="update" class="px-4 py-1 bg-blue-800 hover:bg-blue-900 hover:text-blue-100 text-blue-100">Update</button>
                </div>
            </form>
        </div>
        <div class="w-1/3 border-2 border-gray-900 border-dashed h-48 flex items-center justify-center relative">
            <form action="{{route('profile-picture')}}" class="z-20 w-full h-full block" enctype="multipart/form-data" method="POST">
                @csrf
                <label for="file" class="w-full h-full block flex items-center justify-center text-blue-900 text-2xl">
                    @if(!$image)
                    Profile Picture
                    @endif
                    <input type="file" id="file" name="file" class="hidden" onchange="this.form.submit()">
                </label>
            </form>
            @if($image)
            <div class="absolute z-10 block h-full w-full profile-image">
                {{$image}}
            </div>
            @endif
        </div>
    </div>
</div>