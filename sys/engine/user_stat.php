<?PHP

$dt= $kar2['status'];
                
 if ($dt == "11") { echo '<span class="label label-lime">ACTIVE</span>'; }
    
else if ($dt == "12") { echo '<span class="label label-yellow">SUSPEND</span>'; }

else if ($dt == "13") { echo '<span class="label label-danger">EXPIRED</span>'; }
                						



?>