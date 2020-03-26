<?PHP
	
	require_once(__DIR__.'/../db_con/db.php');

					$id=$_POST['id'];
					$pword=$_POST['pword'];

					$pword2=md5($pword);											
		
					$sql_emp= "UPDATE user SET password='$pword2' WHERE username='$id'";

					$result= mysql_query($sql_emp) or die(mysql_error());
							 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../index.php");


mysql_close();

?>
	