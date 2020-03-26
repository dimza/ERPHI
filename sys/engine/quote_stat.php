<?PHP

$dt= $qt2['status'];
                
if ($dt == "10") { echo '<a href="timeline.php?qts='.$qt2["quote_no"].'" target="_Blank"><span class="label label-success">OPEN</span></a>'; }
                					
else if ($dt == "11") { echo '<span class="label label-lime">ON PROGRESS</span>'; }      						
else if ($dt == "12") { echo '<span class="label label-danger">EXPIRED</span>'; }              						
else if ($dt == "13") { echo '<span class="label label-yellow">CLOSE</span>'; }               						
else if ($dt == "14") { echo '<a href="detail_quote.php"><span class="label label-purple">INVOICE</span></a>'; }
else if ($dt == "15") { echo '<span class="label label-pink">DO DELIVERY</span>'; }

?>