
<?PHP

$dt= $qt2['payment'];
                
if ($dt == "0") { echo '<td><span class="label label-success">Cash</span>'; }
                					
else if ($dt == "1") { echo '<td><span class="label label-lime">Cheque</span>'; }
                						
else if ($dt == "2") { echo '<td><span class="label label-warning">Reimbursement</span>'; }
                						
else if ($dt == "3") { echo '<td><span class="label label-purple">Bank Transfer</span>'; }

else if ($dt == "4") { echo '<td><span class="label label-magenta">Other</span>'; }
         

?>