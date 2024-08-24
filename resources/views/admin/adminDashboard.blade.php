@extends('admin.adminPanel')

@section('adminContent')

<?php
$sellerCount = 0;
$adminCount = 0;
$buyerCount = 0;
$bookedPropertyCount = 0;
$notBookedPropertyCount = 0;
$propertyCount = 0;
$messageCount = 0;
$transactionCount = 0;
foreach ($properties as $property) {
    if ($property->is_sold == 1) {
        $bookedPropertyCount++;
        $propertyCount++;
    } else if ($property->is_sold == 0) {
        $notBookedPropertyCount++;
        $propertyCount++;
    }
}
foreach ($messages as $message) {
    $messageCount++;
}
foreach ($charges as $charge) {
    $transactionCount++;
}
foreach ($users as $user) {
    if ($user->type == 'seller') {
        $sellerCount++;
    } else if ($user->type == 'buyer') {
        $buyerCount++;
    } else {
        $adminCount++;
    }
}

?>
<div class="recentorders">
    <div hidden id="adminCount">{{$adminCount}}</div>
    <div hidden id="sellerCount">{{$sellerCount}}</div>
    <div hidden id="buyerCount">{{$buyerCount}}</div>
    <div hidden id="propertyCount">{{$propertyCount}}</div>
    <div hidden id="messageCount">{{$messageCount}}</div>
    <div hidden id="messageCount">{{$transactionCount}}</div>
    <div hidden id="bookedPropertyCount">{{$bookedPropertyCount}}</div>
    <div hidden id="notBookedPropertyCount">{{$notBookedPropertyCount}}</div>
    <div class="cardHeader">
        <h2>Dashboard</h2>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$messageCount}}</h5>
                    <p class="card-text">Messages</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$transactionCount}}</h5>
                    <p class="card-text">Transactions</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$propertyCount}}</h5>
                    <p class="card-text">Properties</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row dashboard_row mt-5">
        <div class="col-6">
            <div style="width:100%; max-width:600px; height:500px;" id="myChartBar">
            </div>
        </div>
        <div class="col-6">
            <canvas style="width:100%;max-width:600px; " id="myChart"></canvas>
        </div>
    </div>

</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    const adminCount = parseInt(document.querySelector('div[id=adminCount]').textContent)
    const sellerCount = parseInt(document.querySelector('div[id=sellerCount]').textContent)
    const buyerCount = parseInt(document.querySelector('div[id=buyerCount]').textContent)
    const propertyCount = parseInt(document.querySelector('div[id=propertyCount]').textContent)
    const bookedPropertyCount = parseInt(document.querySelector('div[id=bookedPropertyCount]').textContent)
    const notBookedPropertyCount = parseInt(document.querySelector('div[id=notBookedPropertyCount]').textContent)
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ['User Type', 'Count'],
            ['Admins', adminCount],
            ['Sellers', sellerCount],
            ['Buyers', buyerCount]
        ]);

        const options = {
            title: 'User Distribution',
            pieHole: 0.2,
        };

        const chart = new google.visualization.PieChart(document.getElementById('myChartBar'));
        chart.draw(data, options);
    }

    // Bar Graph
    var xValues = ["Total", "Booked", "Not Booked"];
    var yValues = [propertyCount, bookedPropertyCount, notBookedPropertyCount, 0];
    var barColors = ["#2e3b52", "#437c8b", "green"];

    new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Properties"
            }
        }
    });
</script>
@endsection