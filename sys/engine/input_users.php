<?PHP 	

	
	require_once(__DIR__.'/../db_con/db.php'); 

		$emply = $_POST['emp'];
		$usrnm = $_POST['uname'];
		$pswd = md5($_POST['pword']);
		$rl =$_POST['role'];		
		$remk =$_POST['rmk'];
		$tgal =$_POST['tanggal'];
		$tgal2 =$_POST['tgl'];
		$usr =$_POST['user'];

      	$nm= mysql_query("select * from `employee` where no_pegawai='$emply'") or die(mysql_error());
      	$nm2= mysql_result($nm, 0, 'nama_depan');
		$nm3= mysql_result($nm, 0, 'kode_company');

      	$null='';
      	$null2='0';

		//insert database				
		$sql= "INSERT INTO user (id_pegawai, username, password, kode_company, nama_pegawai, nopeg,	valid_date, role, remark, vis, create_user, create_date, modified_user,	modified_date) 
	
						VALUES ('$null', '$usrnm', '$pswd', '$nm3', '$nm2',	'$emply', '$tgal', '$rl', '$remk', '$null2', '$usr', '$tgal2', '$usr', '$tgal2')";
	
		$result = mysql_query($sql) or die(mysql_error());

		 		// update status quote
		$sql2="UPDATE `employee` SET status='1' WHERE no_pegawai='$emply'";	
		$result2= mysql_query($sql2) or die(mysql_error());						
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../list_user.php");	

mysql_close();

?>
	