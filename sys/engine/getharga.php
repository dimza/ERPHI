<?php
$q = intval($_GET['q']);

	require_once(__DIR__.'/../db_con/db.php');

    $tpl= mysql_query("select * from goods where id_goods='$q'");    
    $tpl2 = mysql_fetch_array($tpl);

echo "<label class='col-lg-2 col-md-2 col-sm-12 control-label'>Price List</label>";
echo "<div class='col-lg-4 col-md-4'>";
echo "<input class=form-control name='hrg'";
echo " value='";
echo $tpl2['price_list'];
echo "'></div>";
echo "<div class='col-lg-2 col-md-2'>";

echo "<select class='form-control select2' name='mu'>";

	$cur= $tpl2['currency_goods'];
	$cur2= mysql_query("select * from currency where idCurrency='$cur'") or die(mysql_error());
	$cur3= mysql_result($cur2, 0, 'symbol');

echo "<option value='";
echo $cur;
echo "'>";
echo $cur3;
echo "</option>";

	$mu= mysql_query("select * from currency order by idCurrency asc limit 0, 10");

	While($mu2= mysql_fetch_assoc($mu)) {

		echo '<option value="'.$mu2['idCurrency'].'">';
		echo $mu2['symbol'];
		echo '</option>';
		
		}

echo "</select></div>";

mysql_close();

?> 
