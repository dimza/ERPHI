<?PHP
  
  require_once(__DIR__.'/../db_con/db.php'); 

        $cn=$_POST['cn'];
        $cc=$_POST['cc'];       
        $sym=$_POST['sym'];
        $usr=$_POST['usr'];
        $dat=$_POST['dat'];
        $ngr=$_POST['ngr'];
                
    $sql="UPDATE currency SET description='$cn', symbol='$sym', nation='$ngr', modUser='$usr', modDate='$dat' WHERE idCurrency='$cc'";
  
    $result= mysql_query($sql) or die(mysql_error());
     
  //mengambil nilai quote no dan kondisi kdo= berarti apa yah lupa ?? 
  header("Location: ../../listCurrency.php");  

mysql_close(); ?>
  