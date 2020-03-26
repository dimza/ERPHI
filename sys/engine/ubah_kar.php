<?PHP
	
	require_once(__DIR__.'/../db_con/db.php');

		define("UPLOAD_DIR", "../../photo/barang/");

		if (!empty($_FILES["nama_file"])) {

			$nama_file= $_FILES["nama_file"];

				if ($nama_file["error"] !== UPLOAD_ERR_OK) {	 

					$nd2=$_POST['nd'];
					$nt=$_POST['nt'];
					$nb2=$_POST['nb'];
					$com2=$_POST['com'];
					$en2=$_POST['en'];
					$eml2=$_POST['eml'];
					$jt=$_POST['jt'];
					$sta2=$_POST['sta'];
					$bsc=$_POST['bsc'];
					$mls=$_POST['mls'];
					$npwp=$_POST['npwp'];
					$bpjs=$_POST['bpjs'];
					$jd2=$_POST['jd'];
					$tl2=$_POST['tl'];
					$ttl2=$_POST['ttl'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$spo=$_POST['spo'];
					$noc=$_POST['noc'];
					$eca=$_POST['eca'];
					$pnu=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem=$_POST['idem'];
					$almt2=$_POST['almt'];
					$ngr2=$_POST['ngr'];
					$prpns2=$_POST['prpns'];
					$kta2=$_POST['kta'];
					$kp2=$_POST['kp'];
					$tlp2=$_POST['tlp'];
					$mob2=$_POST['mob'];
					$usr2=$_POST['usr'];
					$dat2=$_POST['dat'];

					$null='';
					$null2='0';											
		
					$sql_emp= "UPDATE employee SET join_date='$jd2', status_karyawan='$sta2', kode_company='$com2', nama_depan='$nd2', 

					nama_belakang='$nb2', tempat_lahir='$tl2', ttl_karyawan='$ttl2', alamat_karyawan='$almt2', kota_karyawan='$kta2', 

					kodepos_karyawan='$kp2', propinsi_karyawan='$prpns2', negara_karyawan='$ngr2', telpon_karyawan='$tlp2', 

					mobile_karyawan='$mob2', email_karyawan='$eml2', job_tittle='$jt', modified_user='$usr2', modified_date='$dat2' WHERE no_pegawai='$en2'";

					$result= mysql_query($sql_emp) or die(mysql_error());
		 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../list_employee.php");

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

					$nd2=$_POST['nd'];
					$nt=$_POST['nt'];
					$nb2=$_POST['nb'];
					$com2=$_POST['com'];
					$en2=$_POST['en'];
					$eml2=$_POST['eml'];
					$jt=$_POST['jt'];
					$sta2=$_POST['sta'];
					$bsc=$_POST['bsc'];
					$mls=$_POST['mls'];
					$npwp=$_POST['npwp'];
					$bpjs=$_POST['bpjs'];
					$jd2=$_POST['jd'];
					$tl2=$_POST['tl'];
					$ttl2=$_POST['ttl'];
					$ms=$_POST['ms'];
					$sex=$_POST['sex'];
					$spo=$_POST['spo'];
					$noc=$_POST['noc'];
					$eca=$_POST['eca'];
					$pnu=$_POST['pnu'];
					$ide=$_POST['ide'];
					$idem=$_POST['idem'];
					$almt2=$_POST['almt'];
					$ngr2=$_POST['ngr'];
					$prpns2=$_POST['prpns'];
					$kta2=$_POST['kta'];
					$kp2=$_POST['kp'];
					$tlp2=$_POST['tlp'];
					$mob2=$_POST['mob'];
					$usr2=$_POST['usr'];
					$dat2=$_POST['dat'];

					$null='';
					$null2='0';											
		
					$sql_emp= "UPDATE employee SET join_date='$jd2', status_karyawan='$sta2', kode_company='$com2', nama_depan='$nd2', 

					nama_belakang='$nb2', tempat_lahir='$tl2', ttl_karyawan='$ttl2', alamat_karyawan='$almt2', kota_karyawan='$kta2', 

					kodepos_karyawan='$kp2', propinsi_karyawan='$prpns2', negara_karyawan='$ngr2', telpon_karyawan='$tlp2', 

					mobile_karyawan='$mob2', email_karyawan='$eml2', job_tittle='$jt', foto='nama_baru', modified_user='$usr2', modified_date='$dat2' WHERE no_pegawai='$en2'";

					$result= mysql_query($sql_emp) or die(mysql_error());
							 
					//mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
					header("Location: ../../list_employee.php");


mysql_close();

?>
	