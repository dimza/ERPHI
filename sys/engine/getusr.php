<?php

	$q = intval($_GET['q']);

	require_once(__DIR__.'/../db_con/db.php');

    $tpl= mysql_query("select * from employee where no_pegawai='$q'");    
    $tpl2 = mysql_fetch_array($tpl);

		echo "<label class='col-lg-2 col-md-2 col-sm-12 control-label'>Username</label>";
		echo "<div class='col-lg-6 col-md-6'>";
		echo "<input class=form-control readonly name='uname'";
		echo " value='";
		echo $tpl2['email_karyawan'];
		echo "'></div></div>";

	mysql_close();

?> 
