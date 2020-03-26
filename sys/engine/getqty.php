<?php
$q = intval($_GET['q']);

  require_once(__DIR__.'/../db_con/db.php');

    $tpl= mysql_query("select * from quote_list where quote_no='$q' and status='10'");    
    $tpl2 = mysql_fetch_array($tpl);

echo "<label class='col-lg-2 col-md-2 col-sm-12 control-label'>Jumlah</label>";
echo "<div class='col-lg-4 col-md-4'>";
echo "<input class=form-control name='jml'";
echo " value='";
echo $tpl2['jumlah'];
echo "'></div>";
echo "<div class='col-lg-2 col-md-2'>";

echo "<input class=form-control name='unt'";
echo " value='";
echo $tpl2['unit'];
echo "'></div>";

mysql_close();

?> 
