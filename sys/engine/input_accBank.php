<?PHP 	

	
	require_once(__DIR__.'/../db_con/db.php'); 

		$com=$_POST['com'];
		$ab=$_POST['ab'];		
		$mu=$_POST['mu'];
		$tgl2=$_POST['tgl'];
		$usr2=$_POST['usr'];
		$dat2=$_POST['dat'];
		$nb=$_POST['nb'];
		$an=$_POST['an'];
		$rmk=$_POST['rmk'];

		$no='';
		$null='0';
		
		//insert database				
		$sql= "insert into accountBank (id_aBank, 	name_bank, 	account_no, kode_company, type_account,	date_create, remark, vis, mod_user,	mod_date) 
	
								VALUES ('$ab', 	'$nb', '$an', '$com', '$mu', '$tgl2', '$rmk', '$null',	'$usr2',	'$dat2')";
	
		$result = mysql_query($sql) or die(mysql_error());						
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../list_bank.php");	

mysql_close();

?>
	