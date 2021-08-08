<div class="col-12">
    <canvas id="myChart" data-chart="{{$dataRekap}}"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart');
    var dataChart = ctx.getAttribute('data-chart');
    var dataObj = JSON.parse(dataChart);
    console.log(dataObj);
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: dataObj,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>