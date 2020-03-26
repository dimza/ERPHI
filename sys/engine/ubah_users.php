<?PHP
  
  require_once(__DIR__.'/../db_con/db.php'); 

    $id=$_POST['id'];
    $pword=md5($_POST['pword']);
    $tgl=$_POST['tgl'];
    $user=$_POST['user'];
    
    $kode= @$_GET['kd'];
                
    $sql="UPDATE user SET password='$pword', modified_user='$user', modified_date='$tgl' WHERE username='$id'";
  
    $result= mysql_query($sql) or die(mysql_error());
     
  //mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
  header("Location: ../../list_user.php");  

mysql_close(); ?>
  