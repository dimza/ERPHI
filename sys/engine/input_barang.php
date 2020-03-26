<?PHP 	ob_start();
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/barang/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$kd=$_POST['kr'];
					$grb=$_POST['gb'];
					$sup1=$_POST['sp1'];
					$sup2=$_POST['sp2'];
					$pnu=$_POST['pn'];
					$des=$_POST['desc'];
					$mer=$_POST['merk'];
					$manf=$_POST['man'];
					$pri=$_POST['price'];
					$mu=$_POST['matauang'];
					$sta=$_POST['stat'];
					$re=$_POST['rem'];
					$us=$_POST['usr'];
					$dat=$_POST['date'];

					$null='';
					$null2='0';	

					$st='61';
					$ut="unit";											
		
					$sql= "INSERT INTO goods (
	
				id_goods, 	kode_principal,		kode_principal2, 	type_goods, 	description_goods, 	brand_goods, 	part_number, 		manufactured, 	price_list, 	currency_goods,		remark_goods,		status_goods, 			foto,			create_user, 		create_date, 		modified_user, 		modified_date) 
	
					VALUES (
			
				'$kd', 		'$sup1', 			'$sup2', 			'$grb', 		'$des',				'$mer', 		'$pnu', 			'$manf', 		'$pri', 		'$mu',				'$re', 				'$sta', 				'$null', 	'$us',				'$dat',				'$us',				'$dat')";
	
					$result = mysql_query($sql) or die(mysql_error());

					
					//store data to stock

					$sql2= "INSERT INTO stock (
	
				id_stock, 	goods_no,		qty, 	unit, 		remark, 	status, 	vis, 		swh, 		create_user, 		create_date, 		modified_user, 		modified_date) 
	
					VALUES (
			
				'$null', 	'$kd', 		'$null2', 	'$ut', 	'$null',	'$st',	 	'$null2', 	'$null',	'$us',				'$dat',				'$us',				'$dat')";
	
					$result2 = mysql_query($sql2) or die(mysql_error());					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../addGoods.php");

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

					$kd=$_POST['kr'];
					$grb=$_POST['gb'];
					$sup1=$_POST['sp1'];
					$sup2=$_POST['sp2'];
					$pnu=$_POST['pn'];
					$des=$_POST['desc'];
					$mer=$_POST['merk'];
					$manf=$_POST['man'];
					$pri=$_POST['price'];
					$mu=$_POST['matauang'];
					$sta=$_POST['stat'];
					$re=$_POST['rem'];

					$us=$_POST['usr'];
					$dat=$_POST['date'];

					$null='';
					$null2='0';

					$st='61';
					$ut="unit";								
		
					$sql= "INSERT INTO goods (
	
				id_goods, 	kode_principal,		kode_principal2, 	type_goods, 	description_goods, 	brand_goods, 	part_number, 		manufactured, 	price_list, 	currency_goods,		remark_goods,		status_goods, 			foto,			create_user, 		create_date, 		modified_user, 		modified_date) 
	
					VALUES (
			
				'$kd', 		'$sup1', 			'$sup2', 			'$grb', 		'$des',				'$mer', 		'$pnu', 			'$manf', 		'$pri', 		'$mu',				'$re', 				'$sta', 				'$nama_baru', 	'$us',				'$dat',				'$us',				'$dat')";
	
					$result = mysql_query($sql) or die(mysql_error());


					$sql2= "INSERT INTO stock (
	
				id_stock, 	goods_no,		qty, 	unit, 		remark, 	status, 	vis, 		swh, 		create_user, 		create_date, 		modified_user, 		modified_date) 
	
					VALUES (
			
				'$null', 	'$kd', 		'$null2', 	'$ut', 	'$null',	'$st', 	'$null2', 	'$null',	'$us',				'$dat',				'$us',				'$dat')";
	
					$result2 = mysql_query($sql2) or die(mysql_error());					
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../addGoods.php");

mysql_close();

ob_end_flush(); ?>
	