@extends("template")
@section('main')
<div>
    @livewire(request()->route()->getName())
</div>
@endsection