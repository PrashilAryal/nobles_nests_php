@extends('admin.adminPanel')

@section('adminContent')

<?php
$sellerCount = 0;
$adminCount = 0;
$buyerCount = 0;
$propertyCount = 0;
foreach ($properties as $property) {
    $propertyCount++;
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
    <div class="cardHeader">
        <h2>Dashboard</h2>
    </div>
    <div class="row dashboard_row">
        <div class="col-12" id="myChart" style="width:100%; max-width:600px; height:500px;">
        </div>
        <div class="col-4 dashboard_col">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <p>{{$propertyCount}}</p>
                        <h3>Properties</h3>
                    </div>
                    <div class="flip-card-back">
                        <p>This card shows the total number of properties in NobleNests.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    const adminCount = parseInt(document.querySelector('div[id=adminCount]').textContent)
    const sellerCount = parseInt(document.querySelector('div[id=sellerCount]').textContent)
    const buyerCount = parseInt(document.querySelector('div[id=buyerCount]').textContent)
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

        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
@endsection