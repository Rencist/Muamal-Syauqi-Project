<div class="rounded-2xl bg-slate-200 py-3 px-5 h-80">
    <canvas id="stock-data" class="canvasChart" ></canvas>
</div>

<!-- data grafik akan sebagai [data stock, bulan]  -->

<script>
    let stockDataCtx = document.getElementById('stock-data');
    var xValues = [2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026];
    const stockData = [2737, 2762, 2762, 2746, 2748, 2757, 2756, 2750, 2752];

    makeChart(stockDataCtx, 'Stock Data', xValues, stockData, 2, "53, 47, 93");

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
                    text: `Hasil Panen ${nama}`,
                    fontSize: 16
                }
            }
        });
    }



</script>