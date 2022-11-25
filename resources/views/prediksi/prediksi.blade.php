@extends('layouts.auth')

<div class="container">
    <div>
        @include('prediksi.grafik-harga')
    </div>

    <div class="">
        Rekapan Jumlah Stock Cabe Jamu
        <table class="table" id="stock">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Tipe</td>
                    <td>Petani</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                </tr>
            </thead>
        </table>
    </div>

    <div class="">
        Rekapan Pembelian Cabe Jamu
        <table class="table" id="stock">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Tipe</td>
                    <td>Petani</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                </tr>
            </thead>
        </table>
    </div>
</div>




