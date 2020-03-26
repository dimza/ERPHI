<?PHP

$dt= $data_tam['payment'];
                
if ($dt == "0") { echo 'CASH'; }                					
else if ($dt == "1") { echo 'CHEQUE'; }             						
else if ($dt == "2") { echo 'REIMBURSEM'; }              						
else if ($dt == "3") { echo 'OTHER'; }
         

?>