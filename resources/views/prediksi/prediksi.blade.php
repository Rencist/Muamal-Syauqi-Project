@extends('layouts.static')
@include('component.navbar')

<div class="container">
    <div class="grid content-center my-10 ">
        <center>
            @include('prediksi.slider-kebun')
            <div class="w-[90%] rounded-2xl bg-slate-200 py-3 px-5 h-80 mb-4">
                <iframe src="{{ url('/grafik_stock') }}" title="grafik" class='w-full h-full'></iframe>
            </div>
            @include('prediksi.grafik-harga')
        </center>
    
    </div>
</div>






