<?php
session_start();


include "fungsi/koneksi.php";
include "fungsi/ceklogin.php";


$err="";

if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$level = $_POST['level'];

	$query = "SELECT * FROM user WHERE username='$username' && password='$password'";
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
		echo "ada error";
	} 

	if (mysqli_num_rows($hasil) == 0) {
		$err="
		<div class='row' style='margin-top: 15px';>
	       <div class='col-md-12'>
	        	<div class='box box-solid bg-red'>
	        		<div class='box-header'>
	        			<h3 class='box-title'>Login Gagal!</h3>
	        		</div>
	        		<div class='box-body'>
	        			<p>Maaf, Username atau password yang Anda masukkan salah !!</p>
	        		</div>
			    </div>
			 </div>
		 </div>
	</div>";
	} else {
		$row = mysqli_fetch_array($hasil);
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = $row['level'];
		//login untuk unit pelayanan
		if($row['level'] == "unit_pelayanan" && $level == "unit_pelayanan"  ) {
			$_SESSION['login'] = true;
			header("location:unit_pelayanan/index.php");
		//login untuk admin gudang / PPIC
		} else if ($row['level'] == "admin_gudang" && $level == "admin_gudang" ) {
			$_SESSION['login'] = true;
			header("location:admin_gudang/index.php");			
		//login untuk asisten manajer	
		} else if ($row['level'] == "asisten_manajer" && $level == "asisten_manajer") {
			$_SESSION['login'] = true;
			header("location:asisten_manajer/index.php");
		//login untuk accounting	
		} else if ($row['level'] == "accounting" && $level == "accounting") {
			$_SESSION['login'] = true;
			header("location:accounting/index.php");
		//login untuk hrd	
		} else if ($row['level'] == "hrd" && $level == "hrd") {
			$_SESSION['login'] = true;
			header("location:hrd/index.php");
		//login untuk laboratorium	
		} else if ($row['level'] == "laboratorium" && $level == "laboratorium") {
			$_SESSION['login'] = true;
			header("location:laboratorium/index.php");
		//login untuk kepala produksi
		} else if ($row['level'] == "head_production" && $level == "head_production") {
			$_SESSION['login'] = true;
			header("location:head_production/index.php");	
		//login untuk purchasing
		} else if ($row['level'] == "purchasing" && $level == "purchasing") {
			$_SESSION['login'] = true;
			header("location:purchasing/index.php");
		//login untuk security
	} else if ($row['level'] == "security" && $level == "security") {
		$_SESSION['login'] = true;
		header("location:security/index.php");			
		} else {
			$err="
		<div class='row' style='margin-top: 15px';>
	       <div class='col-md-12'>
	        	<div class='box box-solid bg-red'>
	        		<div class='box-header'>
	        			<h3 class='box-title'>Login Gagal!</h3>
	        		</div>
	        		<div class='box-body'>
	        			<p>Mohon maaf, Anda salah memilih level login.<br /> Silahkan coba lagi !!</p>
	        		</div>
			    </div>
			 </div>
		 </div>
	</div>";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script language='JavaScript'>
var txt=" : PT SARANA SUMBER TIRTA - CIREBON : ";
var speed=1000;
var refresh=null;
function action() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
refresh=setTimeout("action()",speed);}action();
</script>
	<!--<title>PT SST - CIREBON</title>-->
	<!-- Icon  -->
	<link rel="shortcut icon" type="image/icon" href="https://rizal-fathoni.github.io/sst/gambar/iconsst.jpg">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/bootstrap/css/custom.css" rel="stylesheet">
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" >
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet">
    <link href="assets/fa/css/font-awesome.min.css" rel="stylesheet">  
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">        
      </div>
	  <!-- /.login-logo -->
      <div class="login-box-body">
      	<h3 class="text-center">APLIKASI SISINMIN</h3>
		  <h4 class="text-center">(Sistem Informasi Administrator)</h4>
      	<img src="gambar/namasst.jpg" style="width: 150px; height: 10px;">
		<img src="gambar/logosst.png" style="width: 50px; height: 50px;">        
        <form method="post">
          <div class="form-group">           	
          	<div class="input-group">
          		<span class="input-group-addon"><i class="fa fa-user"></i></span>
	            <input type="text" class="form-control" placeholder="Masukkan Nama Anda ...." name="username" required  />	            
            </div>
          </div>
          <div class="form-group">
          	<div class="input-group">
	            <span class="input-group-addon"><i class="fa fa-unlock"></i></span>
	            <input  type="password" class="form-control" placeholder="Masukkan Sandi Anda ...." name="password"  required>
            </div>
          </div>
          <div class="form-group">
          	<div class="input-group col-md-7">          	
          		<span class="input-group-addon"><i class="fa fa-shield"></i></span>
	            <select class="form-control" name="level" required>            	
	            	<option value>[Pilih Level]</option>
	            	<option value="unit_pelayanan">Pelayanan</option>
	            	<option value="admin_gudang">Admin</option>
	            	<option value="asisten_manajer">Asmen</option>
					<option value="hrd">HRD</option>
					<option value="laboratorium">Laboratorium</option>
					<option value="accounting">Akunting</option>
					<option value="head_production">Kepala Produksi</option>
					<option value="purchasing">Pembelian</option>
					<option value="security">Satpam</option>
	            </select>
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-primary btn-block btn-flat pull-right" value="Login" name="login"/><br />
            </div><!-- /.col -->
          </div>
        </form>
       
			<h6 class="text-center"><b><marquee>Copyright &copy <font color="brown"><a href="https://www.instagram.com/rizalfathonipejambon/">Rizal Fathoni S.Kom</a></font> . <i>Create 15 Juni 2020</i> . Teknik Informatika . STMIK Tulus Cendekia Bandung 2017 . <font color="red"><b>PT SARANA SUMBER TIRTA - CIREBON</b></font></marquee></b></h6>

      </div>
      <?= $err; ?>
      <!-- /.login-box-body 
      <div class="row" style="margin-top: 15px;">
	       <div class="col-md-12">
	        	<div class="box box-solid bg-red">
	        		<div class="box-header">
	        			<h3 class="box-title">Gagal Login</h3>
	        		</div>
	        		<div class="box-body">
	        			<p>Maaf, Username atau password yang Anda masukkan salah !!</p>
	        		</div>
	        	</div>
	        </div>
        </div>
    </div>
	-->     
    <!-- /.login-box -->

    <script src="assets/plugins/jQuery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
