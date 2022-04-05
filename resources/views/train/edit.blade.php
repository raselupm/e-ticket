<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit train:') }} {{$train->name}}
            </h2>

            <a href="{{route('trains')}}">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($train->bogis as $bogi)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 relative group">

                <form onsubmit="return confirm('Are you sure?');" action="{{route('delete-bogi', $bogi->id)}}" method="post" class="hidden group-hover:block absolute right-5 top-5"> @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>

                <div class="p-6 bg-white border-gray-200 ">
                    <h3 class="font-bold mb-3">Bogi: {{$bogi->name}}</h3>

                    <ul class="flex flex-wrap">
                        @foreach($bogi->seats as $seat)
                        <li class="w-32 mr-3 {{$seat->booked ? 'bg-red-500' : 'bg-gray-100'}} p-4 text-center mb-3 relative single-seat">
                            {{$seat->name}}

                            @if(!$seat->booked)
                            <form onsubmit="return confirm('Are you sure?');" action="{{route('delete-bogi', $bogi->id)}}" method="post" class="hidden absolute right-2 top-2"> @csrf
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
