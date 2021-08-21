<div>
    <!-- <select wire:model="chartTypeSelected" name="" id="" class="form-control">
        @foreach($chartType as $key => $type)
        <option value="{{$key}}">{{$type}}</option>
        @endforeach
    </select> -->
    <canvas id="myChart" data-chart="{{$dataRekap}}" type="{{$chartTypeSelected}}"></canvas>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
<script>
    // document.addEventListener('livewire:load', function() {
    var ctx = document.getElementById('myChart');
    var type = ctx.getAttribute("type");
    var jsonData = ctx.getAttribute('data-chart');
    var dataObj = JSON.parse(jsonData);
    console.log(type);
    console.log(dataObj);
    // console.log(type);
    var myChart = new Chart(ctx, {
        type: type,
        data: dataObj,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    // Run a callback when an event("foo") is emitted from this component
    //     @this.on('postAdded', () => {
    //         // myChart.destroy();
    //         var ctx = document.getElementById('myChart');
    //         var type = ctx.getAttribute("type");
    //         var jsonData = ctx.getAttribute('data-chart');
    //         var dataObj = JSON.parse(jsonData);
    //         var myChart = new Chart(ctx, {
    //             type: type,
    //             data: dataObj,
    //             options: {
    //                 scales: {
    //                     y: {
    //                         beginAtZero: true
    //                     }
    //                 }
    //             }
    //         });
    //     });


    // })
</script>