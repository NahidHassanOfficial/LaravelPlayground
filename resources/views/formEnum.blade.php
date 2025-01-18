@extends('dashboard')

@section('content')
    <div class="grid grid-cols-2 p-2 ">
        <div>
            @if (session('success'))
                <div class=" bg-green-400 p-3 text-center text-white rounded-md max-w-sm mx-auto">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/dummy-form" method="POST" class="max-w-sm mx-auto grid grid-col-1 gap-3">
                @csrf
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John Doe" required />

                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your
                    gender</label>
                <select id="gender" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    @foreach ($genders as $gender)
                        <option value="{{ $gender }}">{{ $gender->description() }}</option>
                    @endforeach
                </select>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                    Dummy User</button>

            </form>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dummyUsers as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->gender->description() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div></div>

        <div class="flex flex-col gap-5 mt-10 max-w-sm mx-auto">
            @foreach ($statuses as $status)
                <div class="flex gap-1">
                    <span
                        class="{{ $status->colorLabel() }} text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $status->upperCase() }}</span>
                    <span class="text-xs font-medium me-2 px-2.5 py-0.5 ">{{ $status->getLabel() }}</span>
                </div>
            @endforeach
        </div>

    </div>
@endsection
