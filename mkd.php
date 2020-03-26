<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  

//	$items = @$_GET['itm'];
//	$branchs = @$_GET['lct'];
//	$kd = @$_GET['kd'];
	
//	$perintah = "select * from consumable where no='$kd'";
//	$hasil = mysql_query($perintah, $bd);
//	$row = mysql_fetch_array($hasil);
	
	if ($kd_role == "1") {	
?>