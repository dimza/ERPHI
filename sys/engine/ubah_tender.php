<?PHP
  
  require_once(__DIR__.'/../db_con/db.php');

    define("UPLOAD_DIR", "../../photo/barang/");

    if (!empty($_FILES["nama_file"])) {

      $nama_file= $_FILES["nama_file"];

        if ($nama_file["error"] !== UPLOAD_ERR_OK) {

        $rn=$_POST['rn'];
        $tt=$_POST['tt'];       
        $cln=$_POST['cln'];
        $com=$_POST['com'];
        $sc=$_POST['sc'];
        $mu=$_POST['mu'];
        $od=$_POST['od'];
        $cd=$_POST['cd'];
        $rmk=$_POST['rmk'];
        $dt=$_POST['dt'];
        $usr=$_POST['usr'];
        $id=$_POST['id'];
                
    $sql="UPDATE tender SET companyId='$com', clientId='$cln', referenceNo='$rn', 

    tittleTender='$tt', createDate='$od', closeDate='$cd', salesCall='$sc', 

    remark='$rmk', modDate='$dt', modUser='$usr' WHERE tenderId='$id'";
  
    $result= mysql_query($sql) or die(mysql_error());
     
  //mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
  header("Location: ../../tenderView.php?kd=$id");  

        }


      // ensure a safe filename
      $nama_baru=preg_replace("/[^A-Z0-9._-]/i", "_", $nama_file["name"]);

      // dont overwirte an existising file
      $i= 0;
      $parts= pathinfo($nama_baru);
      while (file_exists(UPLOAD_DIR . $nama_baru))  {
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

        $rn=$_POST['rn'];
        $tt=$_POST['tt'];       
        $cln=$_POST['cln'];
        $com=$_POST['com'];
        $sc=$_POST['sc'];
        $mu=$_POST['mu'];
        $od=$_POST['od'];
        $cd=$_POST['cd'];
        $rmk=$_POST['rmk'];
        $dt=$_POST['dt'];
        $usr=$_POST['usr'];
        $id=$_POST['id'];
                
    $sql="UPDATE tender SET companyId='$com', clientId='$cln', referenceNo='$rn', 

    tittleTender='$tt', createDate='$od', closeDate='$cd', salesCall='$sc', 

    remark='$rmk', modDate='$dt', modUser='$usr', doc='$nama_baru' WHERE tenderId='$id'";
  
    $result= mysql_query($sql) or die(mysql_error());
     
  //mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
  header("Location: ../../tenderView.php?kd=$id"); 

mysql_close($bd); ?>
  
  