@extends('layouts.app')
@section('content')

<section class="bg-gray-50 dark:bg-gray-200 pt-10">
    <div class="flex flex-col px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white shadow dark:border dark:bg-gray-200 dark:border-gray-200">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <table id="example" class="w-full text-sm text-left m-16 text-gray-500 dark:text-gray-800" >
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-200 dark:text-gray-800" >
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stocky => $stock)
                            <tr class="bg-white border-b dark:bg-gray-200 dark:border-gray-200">
                                <th scope="row" class="py-4 px-6 font-medium">
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
    </script>
@endsection