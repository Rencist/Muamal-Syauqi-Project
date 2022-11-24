@extends('layouts.auth')

<div>
    <div class="grid md:grid-cols-2 sm:grid-flow-row gap-3 w-full">
        <div><canvas id="bluto" class="canvasChart" ></canvas></div>
        <div><canvas id="lenteng" class="canvasChart" ></canvas></div>
        <div><canvas id="ganding" class="canvasChart" ></canvas></div>
        <div><canvas id="guluk" class="canvasChart" ></canvas></div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>
    let blutoCtx = document.getElementById('bluto');
    let lentengCtx = document.getElementById('lenteng');
    let gandingCtx = document.getElementById('ganding');
    let gulukCtx = document.getElementById('guluk');
    var xValues = [2018, 2019, 2020, 2021, 2022, 2023, 2024, 2025, 2026];
    const bluto = [2737, 2762, 2762, 2746, 2748, 2757, 2756, 2750, 2752];
    const lenteng = [909, 914, 911, 904, 910, 911, 910, 907, 910];
    const ganding = [1300, 1291, 1277, 1260, 1289, 1281, 1277, 1271, 1283];
    const guluk = [616, 618, 615, 610, 615, 615, 614, 612, 614];

    makeChart(blutoCtx, 'Bluto', xValues, bluto, 2, "53, 47, 93");
    makeChart(lentengCtx, 'Lenteng', xValues, lenteng, 2, "244, 157, 26");
    makeChart(gandingCtx, 'Ganding', xValues, ganding, 2, "220, 53, 53");
    makeChart(gulukCtx, 'Guluk-Guluk', xValues, guluk, 2, "176, 30, 104");

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
 