@extends('layouts.auth')

<div class="">
    <div class="grid content-center my-10">
        <center>
            @include('prediksi.grafik-harga')
        </center>
    </div>

    <div class="">
        Rekapan Jumlah Stock Cabe Jamu
        <table class="table-auto" id="stock">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Tipe</td>
                    <td>Petani</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nama</td>
                    <td>Tipe</td>
                    <td>Petani</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="">
        Rekapan Pembelian Cabe Jamu
        <table class="table-auto" id="stock">
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






