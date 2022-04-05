<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Trains') }}
            </h2>

            <a href="{{route('add-train')}}">Add new train</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2 text-left">Name</th>
                                <th class="border px-4 py-2">Date</th>
                                <th class="border px-4 py-2 text-left">Route</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trains as $train)
                            <tr>
                                <td class="border px-4 py-2">{{$train->name}}</td>
                                <td class="border px-4 py-2 text-center">{{$train->date}}</td>
                                <td class="border px-4 py-2">{{$train->route}}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{route('edit-train', $train->id)}}">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
