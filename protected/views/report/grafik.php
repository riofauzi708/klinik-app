<?php
$this->pageTitle = Yii::app()->name . ' - Report';
?>

<h1>Report</h1>

<canvas id="reportChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('reportChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(array_column($reportData, 'report_date')); ?>,
        datasets: [{
            label: 'Number of Registrations',
            data: <?php echo json_encode(array_column($reportData, 'count')); ?>,
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

<?php
// Debug: Display the reportData to ensure it is not empty
echo "<pre>";
print_r($reportData);
echo "</pre>";
?>
