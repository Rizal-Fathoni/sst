<?php  

	if (isset($_SESSION['login'])) {
		//1. admin khusus
		if ($_SESSION['level'] == "unit_pelayanan") {
			header("location:unit_pelayanan/index.php");
		//2. admin semua
		} else if ($_SESSION['level'] == "admin_gudang"){
			header("location:admin_gudang/index.php");
		//3. asisten manajer	
		} else if ($_SESSION['level'] == "asisten_manajer"){
			header("location:asmen_gudang/index.php");
		//4. accounting	
		} else if ($_SESSION['level'] == "accounting"){
			header("location:accounting/index.php");
		//5. purchasing	
		} else if ($_SESSION['level'] == "purchasing"){
			header("location:purchasing/index.php");
		//6. hrd	
		} else if ($_SESSION['level'] == "hrd"){
			header("location:hrd/index.php");
		//7. laboratorium	
		} else if ($_SESSION['level'] == "laboratorium"){
			header("location:laboratorium/index.php");
		//8. kepala produksi	
		} else if ($_SESSION['level'] == "head_production"){
			header("location:head_production/index.php");
		//9. pajak	
		} else if ($_SESSION['level'] == "pajak"){
		header("location:pajak/index.php");	
		//10. security	
		} else if ($_SESSION['level'] == "security"){
		header("location:security/index.php");				
		} else {
			header("location:index.php");
		}
	}

?>
