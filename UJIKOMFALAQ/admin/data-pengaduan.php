<?php
$koneksi = mysqli_connect("localhost","root","","ujikom_12rpl2_falaq");

$sql = "select * from `input_aspirasi`";

$query = mysqli_query($koneksi, $sql);

while($data = mysqli_fetch_array($query)){ ?>
<p>lokasi <?php echo $data['lokasi']; ?> </p>
<p>keterangan <?php echo $data['ket']; ?> </p>
<p>status <?php echo $data['status']; ?> </p>
<hr/>
<?php } ?>