// protected/views/report/index.php
<?php
$this->pageTitle = Yii::app()->name . ' - Reports';
?>

<h1>Reports</h1>

<canvas id="reportChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('reportChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(array_map(function($item) { return $item->patient_id; }, $reportData)); ?>,
        datasets: [{
            label: 'Amount',
            data: <?php echo json_encode(array_map(function($item) { return $item->amount; }, $reportData)); ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
