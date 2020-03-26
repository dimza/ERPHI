<?PHP

$dt= $qt2['payment'];
                
if ($dt == "0") { echo '<td><span class="label label-success">CASH</span>'; }
                					
else if ($dt == "1") { echo '<td><span class="label label-lime">B2B</span>'; }
                						
else if ($dt == "2") { echo '<td><span class="label label-warning">50:50</span>'; }
                						
else if ($dt == "3") { echo '<td><span class="label label-magenta">OTHER</span>'; }
         

?>