<?PHP 	

	
	require_once(__DIR__.'/../db_con/db.php'); 

		$cc2=$_POST['cc'];
		$com2=$_POST['com'];		
		$dsc2=$_POST['dsc'];
		$tgl2=$_POST['tgl'];
		$usr2=$_POST['usr'];
		$dat2=$_POST['dat'];

		$no='';
		$null='0';
		
		//insert database				
		$sql= "insert into cost_code (	id_costcode, 	noreg_cost, 	kode_company, 	description, 	date_cost,	mod_user,	mod_date,	vis) 
	
			VALUES (					'$no', 			'$cc2', 		'$com2', 		'$dsc2',		'$tgl2',	'$usr2',	'$dat2',	'$null')";
	
		$result = mysql_query($sql) or die(mysql_error());						
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../list_code.php");	

mysql_close();

?>
	