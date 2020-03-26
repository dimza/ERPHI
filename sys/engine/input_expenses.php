<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../file_upload/bills_expenses/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$rn2=$_POST['rn'];
					$desc2=$_POST['desc'];
					$emp2=$_POST['emp'];
					$ack2=$_POST['ack'];
					$val2=$_POST['val'];
					$mu=$_POST['matauang'];
					$pay=$_POST['payment'];
					$tgl=$_POST['tanggal'];
					$rmk2=$_POST['rmk'];
					$usr2=$_POST['user'];
					$dat=$_POST['tgl'];
					$cc=$_POST['cc'];
					$bank=$_POST['bank'];
					$type=$_POST['type'];

					$null='';
					$null2='0';											
		
					$sql= "insert INTO billExpenses ( id_oe, cost_code,	description, name_user, name_verify, value, rate, payment, source_funds, type,	remark, date_input, picture, vis, create_user, create_date, modified_user, modified_date) 
	
							VALUES ( '$rn2', '$cc',	'$desc2', 	'$emp2', '$ack2', '$val2', '$mu', '$pay', '$bank', '$rmk2', '$tgl', '$null2', '$type', '$null2',	'$usr2', '$dat', '$usr2', '$dat')";
	
					$result = mysql_query($sql) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../oe.php");

				}


			// ensure a safe filename
			$nama_baru=preg_replace("/[^A-Z0-9._-]/i", "_", $nama_file["name"]);

			// dont overwirte an existising file
			$i= 0;
			$parts= pathinfo($nama_baru);
			while (file_exists(UPLOAD_DIR . $nama_baru))	{
				$i++;
				$nama_baru = $parts["filename"] . "-" . $i . "." . $parts["extension"];
				
				}

			// preserve file from temporary directory
			$success= move_uploaded_file($nama_file["tmp_name"], UPLOAD_DIR . $nama_baru);

			if (!$success) {
				echo "<p>Unable to save file.</p>";
				exit;
				}

			// set proper permission on the new file
			chmod(UPLOAD_DIR . $nama_baru, 0644);
		}

					$rn2=$_POST['rn'];
					$desc2=$_POST['desc'];
					$emp2=$_POST['emp'];
					$ack2=$_POST['ack'];
					$val2=$_POST['val'];
					$mu=$_POST['matauang'];
					$pay=$_POST['payment'];
					$tgl=$_POST['tanggal'];
					$rmk2=$_POST['rmk'];
					$usr2=$_POST['user'];
					$dat=$_POST['tgl'];
					$cc=$_POST['cc'];
					$bank=$_POST['bank'];

					$null='';
					$null2='0';											
		
					$sql= "INSERT INTO billExpenses ( id_oe, cost_code, description, name_user, name_verify, value, rate, payment, source_funds, type,	remark, date_input, picture, vis, create_user, create_date, modified_user, modified_date) 
	
							VALUES ( '$rn2', '$cc', '$desc2', 	'$emp2', '$ack2', '$val2', '$mu', '$pay', '$bank', '$type', '$rmk2', '$tgl', '$nama_baru', '$null2',	'$usr2', '$dat', '$usr2', '$dat')";
	
					$result = mysql_query($sql) or die(mysql_error());
					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../oe.php");

mysql_close();

ob_end_flush(); ?>
	