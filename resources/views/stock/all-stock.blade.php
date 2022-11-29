
@extends('layouts.app')

@section('content')
<div class="overflow-x-auto relative shadow-md sm:rounded-lg m-3">
    <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nama Produk
                </th>
                <th scope="col" class="py-3 px-6">
                    Tipe Produk
                </th>
                <th scope="col" class="py-3 px-6">
                    Jumlah Produk
                </th>
                <th scope="col" class="py-3 px-6">
                    Harga Produk
                </th>
                <th scope="col" class="py-3 px-6">
                    Buy Stock
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stocky => $stock)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        {{ $stock["name"] }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $stock["stock_type"] }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $stock["jumlah"] }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $stock["harga"] }}
                    </td>      
                    <td>
                        <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                            Buy
                        </button>
                        @include('stock.buy-stock')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection