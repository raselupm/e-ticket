<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add new train') }}
            </h2>

            <a href="{{route('trains')}}">Cancel</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('save-train')}}" method="post"> @csrf
                        <div class="flex -mx-4 mb-6">
                            <div class="flex-1 px-4">
                                <label for="name" class="eticket-label">Name</label>
                                <input type="text" class="eticket-input" id="name" name="name">
                            </div>

                            <div class="flex-1 px-4">
                                <label for="date" class="eticket-label">Date</label>
                                <input type="text" class="eticket-input" id="date" name="date">
                            </div>
                        </div>

                        <div class="flex -mx-4 mb-6">
                            <div class="flex-1 px-4">
                                <label for="home_station_id" class="eticket-label">Home station</label>
                                <select class="eticket-input" name="home_station_id" id="home_station_id">
                                    <option value="">Select a station</option>
                                    @foreach($stations as $station)
                                        <option value="{{$station->id}}">{{$station->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex-1 px-4">
                                <label for="start_time" class="eticket-label">Start time</label>
                                <input type="text" class="eticket-input" id="start_time" name="start_time">
                            </div>
                        </div>

                        <button type="submit" class="eticket-btn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
