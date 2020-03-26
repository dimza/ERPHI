<?PHP 	

	
	require_once(__DIR__.'/../db_con/db.php'); 

		$cn=$_POST['cn'];
		$cc=$_POST['cc'];		
		$sym=$_POST['sym'];
		$usr=$_POST['usr'];
		$dat=$_POST['dat'];
		$ngr=$_POST['ngr'];
		
		//insert database				
		$sql= "insert into currency (	idCurrency, 	description, 	symbol, 	nation, 	createUser,		createDate,		modUser,		modDate) 
	
			VALUES (					'$cc', 			'$cn', 		'$sym', 	'$ngr',		'$usr',				'$dat',			'$usr',			'$dat')";
	
		$result = mysql_query($sql) or die(mysql_error());						
		 
	//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
	header("Location: ../../listCurrency.php");	

mysql_close();

?>
	