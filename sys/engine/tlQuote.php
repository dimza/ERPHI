<?PHP

    $qts = @$_GET['qts'];
    
    $tlQuote= mysql_query("select * from tlQuote where noQuote='$qts'");
    $tlQuote2 = mysql_fetch_array($tlQuote);
    $icon = $tlQuote2['iconQuote'];
    $date = $tlQuote2['dateQuote'];
    $sales = $tlQuote2['salesQuote'];

    $emp= mysql_query("select * from employee where noPegawai='$qts'");
    $emp2 = mysql_fetch_array($emp);
    $nemp = $emp2['nama_depan'];   

    if ($icon='101') {

      echo "<li><div class=timeline-time><small>.'$date'.</small></div>";
      echo "<div class=timeline-icon><i class=st-file></i></div>";
      echo "<div class=timeline-content><p>";
      echo "<a href=#><strong>.'$qts'.</strong></a> Created By. <a href="" >.'$nemp'.</a></p></div></li>";

    } elseif ($icon='0') {
      # code...
    }

?>