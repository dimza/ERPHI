<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);

	if ($kd_role == "1") {	
?>

<?PHP include ("head_meta.php"); ?>

<body>

<?PHP include ("header.php"); ?>
<?PHP include ("sidebar.php"); ?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
	<br>
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg"></div>
            <div class=panel-body>
              <div class=timeline>
                <!-- Start .timeline -->
                <ul class=timeline-list>

<?PHP

    $qts = @$_GET['qts'];
    
    $tlQuote= mysql_query("select * from tlQuote where noQuote='$qts'");
    $tlQuote2 = mysql_fetch_array($tlQuote);
    $icon = $tlQuote2['iconQuote'];
    $date = $tlQuote2['dateQuote'];
    $sales = $tlQuote2['salesQuote'];

    $emp= mysql_query("select * from employee where no_pegawai='$sales'");
    $emp2 = mysql_fetch_array($emp);
    $nemp = $emp2['nama_depan'].' '.$emp2['nama_tengah'].' '.$emp2['nama_belakang'];   

    if ($icon='101') {

      echo "<li><div class=timeline-time><small>";
      echo $date;
      echo "</small></div>";
      echo "<div class=timeline-icon><i class=st-file></i></div>";
      echo "<div class=timeline-content><p>";
      echo "<a href=detail_penawaran.php?qo=$qts target=_Blank><strong>";
      echo $qts;
      echo "</strong></a> Created By. <a href='' >";
      echo $nemp;
      echo "</a></p></div></li>";

    } elseif ($icon='0') {
      # code...
    }

?>
                
                </ul>
              </div>
              <!-- End .timeline -->
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
      </div>
      <!-- Page End here -->
    </div>
    <!-- End .outlet -->
  </div>
  <!-- End .content-wrapper -->
  <div class=clearfix></div>
</div>
<!-- End #content -->
<!-- Javascripts -->
<!-- Load pace first -->
<script src=assets/plugins/core/pace/pace.min.js></script>
<!-- Important javascript libs(put in all pages) -->
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-2.1.1.min.js">\x3C/script>')</script>
<script src=http://code.jquery.com/ui/1.10.4/jquery-ui.js></script>
<script>window.jQuery || document.write('<script src="assets/js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')</script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="assets/js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="assets/js/libs/respond.min.js"></script>
<![endif]-->
<script src=assets/js/pages/forms.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>