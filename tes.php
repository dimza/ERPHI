
<?PHP

$date1 = "2008-03-15"; 
$date2 = "2011-03-16"; 

$diff = abs(strtotime($date2) - strtotime($date1)); $years = floor($diff / (365*60*60*24)); 
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 

printf("%d years, %d months, %d days\n", $years, $months, $days); 

?>