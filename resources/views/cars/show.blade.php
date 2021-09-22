@extends('layouts.app')

@section('content')

    <div class="m-auto w-4/5 py-24">

        <div class="text-center flex flex-col justify-center">

            <img class="w-8/12 m-auto mb-8 shadow-xl" src="{{ asset('images/' . $car->image_path) }}" alt="">

            <h1 class="text-5xl uppercase bold">
                {{ $car->name }}
            </h1>
        </div>
        <div class="text-center py-10 flex flex-col justify-center">
                <div class="m-auto">
                    <span class="uppercase text-blue-500 font-bold text-xs italic">
                        Founded: {{ $car->founded }}
                    </span>

                    <p class="text-lg py-6 text-gray-700">Lorem ipsum dolor sit amet
                       {{ $car->description }}</p>

                       {{-- <ul>
                            <p class="text-lg text-gray-700 py-3">
                                Models:
                            </p>

                            @forelse ($car->carModel as $model)
                                <li class="inline italic text-gray-600 px-1 py-6">
                                    {{ $model["model_name"] }}
                                </li>
                            @empty
                                <p>No Model Found</p>
                            @endforelse
                       </ul> --}}
                       <table class="table-auto">
                            <tr class="bg-blue-100">
                                <th class="w-1/4 border-4 border-gray-500">
                                    Model
                                </th>
                                <th class="w-1/4 border-4 border-gray-500">
                                    Engine
                                </th>
                                <th class="w-1/4 border-4 border-gray-500">Production Date</th>
                            </tr>
                            @forelse ($car->carModel as $model)
                                <tr>
                                    <td class="border-4 border-gray-500">
                                        {{ $model->model_name }}
                                    </td>
                                    <td class="border-4 border-gray-500">
                                        @foreach ($car->engines as $engine)
                                            @if ($model->id === $engine->model_id)
                                                {{ $engine->engine_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="border-4 border-gray-500">{{ date('d-m-y', strtotime($car->productionDate->created_at)) }}</td>
                                </tr>

                            @empty
                                <p>No car models found</p>
                            @endforelse
                       </table>

                       <p class="text-left">
                           Product Types:
                           @forelse ($car->products as $product)
                            {{ $product->name }}
                           @empty
                            <p>No cars Description</p>
                           @endforelse
                       </p>

                    <hr class="mt-4 mb-8">

                    <p>
                        <a href="/cars" class="border-2 p-3 bg-green-600 text-white">&lAarr;All Cars</a>
                    </p>
                </div>
        </div>
    </div>

@endsection


