@extends('dashboard')

@section('content')
    <div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->color }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->category }}
                            </td>
                            <td class="px-6 py-4">
                                ${{ $product->price }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-semibold text-gray-900 dark:text-white">
                        <td class="px-6 py-3"> </td>
                        <td class="px-6 py-3"> </td>
                        <th scope="row" class="px-6 py-3 text-base text-end">Total:</th>
                        <td class="px-6 py-3">${{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
@endsection
