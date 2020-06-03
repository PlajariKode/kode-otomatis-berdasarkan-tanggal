<?php
// koneksi
$conn = mysqli_connect('localhost', 'root', '', 'penjualan');

if (!$conn) {
	echo "Koneksi gagal " . mysqli_connect_error();
}

$kode = '';

// cek kode
$query = mysqli_query($conn, "SELECT max(right(kode_transaksi, 4)) AS kode FROM tb_transaksi WHERE DATE(tanggal) = CURDATE()");

// var_dump($query);

if ($query->num_rows > 0) {
	foreach ($query as $q) {
		$no = ((int)$q['kode'])+1;
		$kd = sprintf("%04s", $no);
	}
} else {
	$kd = "0001";
}

date_default_timezone_set('Asia/Jakarta');
$kode = date('dmy').$kd;

if (isset($_POST['submit'])) {
	$query = mysqli_query($conn, "INSERT INTO tb_transaksi (kode_transaksi) VALUES ('".$_POST['kode']."')");
	header('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Membuat Kode Otomatis</title>
</head>
<body>
	<form method="POST" action="">
		<input type="text" name="kode" value="<?= $kode; ?>">
		<button type="submit" name="submit">Kirim</button>
	</form>
</body>
</html>