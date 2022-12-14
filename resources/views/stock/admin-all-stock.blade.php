@extends('layouts.app')
@section('content')

<section class="bg-gray-50 dark:bg-gray-200 pt-10">
    <div class="flex flex-col px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white shadow dark:border dark:bg-gray-200 dark:border-gray-200">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Nama Produk
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama Petani
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
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stocky => $stock)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $stock["name"] }}
                                </th>
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $stock["nama_petani"] }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $stock["stock_type"] }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $stock["jumlah"] }}
                                </td>
                                <td class="py-4 px-6">
                                    Rp. {{ $stock["harga"] }} 
                                </td>
                                <td>
                                    <button onclick="input_stock_id.val('{{ $stock['id'] }}')" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                                        Action
                                    </button>
                                    @include('stock.edit-stock')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="flex justify-end">
                    <a href="{{ url('/create_stock') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Tambah Stock
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
  </section>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable();
        });
        let input_stock_id = $('#stock_id');
    </script>
@endsection