<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? 'Real Estate'}}</title>
    <link rel="stylesheet" href="/style.css">
    @livewireStyles
    <script src="/scripts.js" defer></script>
</head>

<body>
    <div class="min-h-screen w-full flex bg-gray-300">
        @yield('content')
    </div>
</body>

@if(session('alert') ?? '')
<script src="/toast.js"></script>
<script defer>
    Toastify({
        text: "{{session('alert')}}".split(':').pop(),
        duration: 3000
    }).showToast();
</script>
@endif
@livewireScripts
@stack('scripts')

</html>