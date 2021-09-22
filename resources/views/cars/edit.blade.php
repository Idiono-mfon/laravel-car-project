@extends('layouts.app')

@section('content')


<div class="m-auto w-4/8 py-24">
    <div class="text-center">
        <h1 class="text-5xl uppercase bold">
            Edit {{ $car->name }}
        </h1>
    </div>

</div>
<div class="flex justify-center pt-20">
    <form action="/cars/{{ $car->id }}" method="POST">
         @csrf
         @method('PUT')
         {{-- Adding this helps you initiate a put request --}}
        <div class="block">
            <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400" value="{{ $car->name }}" name="name" placeholder="brand name..">
            <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"  value="{{ $car->founded }}" name="founded" placeholder="Founded">
            <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"  value="{{ $car->description }}" name="description" placeholder="Founded">
            <button type="submit" class=" bg-green-500 block shadow-5xl mb-10 p-2 w-80 upppercase font-bold">Submit</button>
        </div>
    </form>
</div>

@endsection
