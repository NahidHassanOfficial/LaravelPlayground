@extends('dashboard')

@section('content')
    <div>
        @if (session('success'))
            <div class=" bg-green-400 p-3 text-center text-white rounded-md max-w-sm mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <form action="/task-complete" method="POST" class="max-w-sm mx-auto grid grid-col-1 gap-3">
            @csrf

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">
                Task Complete Event</button>

        </form>

    </div>
@endsection
