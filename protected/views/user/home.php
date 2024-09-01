<h1>User Home</h1>
<p>Selamat datang di halaman utama pengguna.</p>
<ul>
    <li><a href="<?php echo $this->createUrl('transaksi/pendaftaran'); ?>">Pendaftaran Pasien</a></li>
    <li><a href="<?php echo $this->createUrl('informasi/pembayaran'); ?>">Pembayaran Tagihan</a></li>
    <li><a href="<?php echo $this->createUrl('laporan/grafik'); ?>">Laporan Grafik</a></li>
    <li><a href="<?php echo $this->createUrl('transaksi/tindakanObat'); ?>">Tindakan dan Obat</a></li>
</ul>
