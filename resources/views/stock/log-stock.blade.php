@extends('layouts.app')

@section('content')
    
<div class="overflow-x-auto relative shadow-md sm:rounded-lg m-3">
    <table id="example" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Nama Pembeli
                </th>
                <th scope="col" class="py-3 px-6">
                    Alamat
                </th>
                <th scope="col" class="py-3 px-6">
                    Jumlah
                </th>
                <th scope="col" class="py-3 px-6">
                    Harga
                </th>
                <th scope="col" class="py-3 px-6">
                    Tanggal Pembelian
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stocks as $stocky => $stock)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium">
                        {{ $stock["nama_pembeli"] }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $stock["alamat"] }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $stock["jumlah"] }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $stock["harga"] }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $stock["date"] }}
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