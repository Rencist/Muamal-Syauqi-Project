@extends('layouts.app')

@section('content')
 
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rosunded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Kamu telah membeli 
                </h1>

                <div class="border-b-2 border-gray-800">
                    <h1 class=" text-center text-xl font-bold leading-tight tracking-tight text-green-800 md:text-2xl dark:text-white">
                        {{ $data['name'] }}
                    </h1>
                </div>

                <table class='table w-full'>
                    <thead>
                        <tr>
                            <th>Tipe</th>
                            <th>Unit (kg)</th>
                            <th>Harga Perunit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ $data['stock_type'] }}</th>
                            <th>{{ $data['jumlah'] }}</th>
                            <th>{{ $data['harga'] }}</th>
                        </tr>
                    </tbody>
                </table>

                <div class="flex justify-center px-3">
                    Total pembayaran: Rp. {{ $data['jumlah'] * $data['harga'] }}
                </div>
                
                <div class='flex justify-end w-full'>
                    <a href='/stock' class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kembali ke Stock</a>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection