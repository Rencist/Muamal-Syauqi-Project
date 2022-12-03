@extends('layouts.auth')
<div class="h-full">
    <canvas id="stock-data" class="canvasChart" ></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<!-- data grafik akan sebagai [data stock, bulan]  -->

<script>
    let stockDataCtx = document.getElementById('stock-data');
    let response = '{{$data}}';
    let result = JSON.parse(response.replaceAll('&quot;', '"'));

    makeChart(stockDataCtx, 'Grafik Harga', result['data']['bulan'], result['data']['harga'], 2, "53, 47, 93");

    function makeChart(ctx, nama, x, y, offset, color) {
        new Chart(ctx, {
            type: "line",
            data: {
                labels: x,
                datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: `rgba(${color},1.0)`,
                borderColor: `rgba(${color},0.3)`,
                data: y
                }]
            },
            options: {
                legend: {display: false},
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{ticks: {min: Math.min(...y) - offset, max: Math.max(...y) + offset}}],
                },
                title: {
                    display: true,
                    text: nama,
                    fontSize: 16
                }
            }
        });
    }



</script>