<?php  

$host = "localhost";
$username = "root";
$password = "";
$database = "sst";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
	echo "Koneksi gagal " . mysqli_connect_error();
}

?>
