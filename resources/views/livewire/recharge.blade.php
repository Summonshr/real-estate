<div class="flex items-center">
    <div class="m-auto max-w-lg w-full mt-8 p-8 bg-gray-100 shadow">
        <div class=" border-2 rounded-lg border-green-900 border-dashed p-4 ">
            <h2 class="w-full font-bold text-green-800 text-3xl">Recharge</h2>
            <hr>
            <p class="w-full my-2 font-semibold text-gray-700">
                Please contact administrator for coupon codes.
            </p>
            <form method="POST" action="{{route('recharge')}}" class="w-full flex flex-wrap my-2">
                @csrf
                <div class="w-3/4 pr-1">
                    <input placeholder="Enter Coupon Code" wire:model='code' name="code" value="{{old('code')}}" type="text" class="px-2 py-1 w-full uppercase font-bold text-green-800 bg-gray-300 font-bold border border-gray-500 mx-auto">
                </div>
                <div class="w-1/4 pl-2">
                    <button @if($error) disabled @endif class="text-green-900 hover:text-green-200 font-bold bg-green-300 hover:bg-green-800 block w-full h-full">Apply</button>
                </div>
            </form>
            @if($message)
            <span class="text-green-800 font-semibold">{{$message}}</span>
            @endif
            @if($error)
            <span class="text-red-800 font-semibold">{{$error}}</span>
            @endif
        </div>
    </div>
</div>