<?php
$this->pageTitle = Yii::app()->name . ' - Admin Dashboard';
?>

<h1>Admin Dashboard</h1>
<p>Selamat datang di halaman dashboard admin.</p>

<h2>Laporan Grafik</h2>
<canvas id="reportChart" width="400" height="200"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('reportChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_map(function($item) { return $item['report_date']; }, $reportData)); ?>,
            datasets: [{
                label: 'Jumlah Pasien',
                data: <?php echo json_encode(array_map(function($item) { return $item['count']; }, $reportData)); ?>,
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
