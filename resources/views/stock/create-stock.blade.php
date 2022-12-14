@extends('layouts.app')
@section('content')
 
<section class="bg-gray-50 dark:bg-gray-200">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rosunded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-200 dark:border-gray-200">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-grey-800">
                    Create a stock
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('createStock') }}" validate>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-grey-800">Nama Stock</label>
                        <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-grey-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex: Cabai Hijau" required="">
                    </div>
                    <div>
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-grey-800">Jumlah Stock</label>
                        <input type="text" name="jumlah" id="jumlah" placeholder="ex: 50" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-grey-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div> 
                    <div>
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-grey-800">Harga Per Satuan</label>
                        <input type="text" name="harga" id="harga" placeholder="ex: 21000" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-grey-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-grey-800">Tipe Stock</label>
                        <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-200 dark:border-gray-200 dark:placeholder-gray-400 dark:text-grey-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="">- Pilih -</option>
                            <option value="{{ 'cabai' }}">{{ "Cabai" }}</option>
                            <option value="{{ 'jamu' }}">{{ "Jamu" }}</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create A Stock</button>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection