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
    <div class="min-h-screen w-full flex bg-blue-300">
        @yield('content')
    </div>
</body>

@if($alert ?? '')
    <script>
        alert('{{$alert}}')
    </script>
@endif
@livewireScripts
</html>