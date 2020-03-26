<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];
    $spc= $data_tampil['spc'];    
	  
	  $tpl= mysql_query("select * from employee where no_pegawai='$nopeg'");
	  $data = mysql_fetch_array($tpl);

    $var = @$_GET['kd'];
    $alrt = @$_GET['al'];    

	if ($kd_role == "1") {	

    $tab="EMPLY";    

  include ("head_meta.php");

?>

<body>

  <?PHP

  include ("header.php");
  include ("sidebar.php");
  include ("date_format.php"); 

  ?>

<!-- Start #content -->
<div id=content>
  <!-- Start .content-wrapper -->
  <div class=content-wrapper>
    <div class="row">
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <br>
        <!-- Start .bredcrumb -->
        <ul id="crumb" class="breadcrumb">
        </ul>
        <!-- End .breadcrumb -->
      </div>
      <!-- End .page-header -->
    </div>
    <!-- End .row --> 	
    <div class=outlet>
      <!-- Start .outlet -->
      <!-- Page start here ( usual with .row ) -->
      <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          
            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a ID Employee. <a href="sys/engine/del_emp.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a ID Employee.
            </div>             
            
            <?PHP break; default: }?>          

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>EMPLOYE LIST</h4>
            </div>
            <div class=panel-body>
              <div class=row>

            <?PHP $kar= mysql_query("select * from employee where vis='0' order by nama_depan asc");
    
            While($kar2= mysql_fetch_assoc($kar))
              {
                echo '<div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">';
                echo '<div class="tile-stats b brall mb25"><a href="view_emp.php?kd='.$kar2['id_karyawan'].'" target="_Blank">';
                
                echo '<div class=tile-stats-icon>';

                  $pic=$kar2['foto'];

                  if($pic=="") { echo '<img class=chat-avatar src=assets/img/avatars/11.png>';}
                  else { echo '<img class=chat-avatar src=assets/img/avatars/11.png>';}

                echo '</div>';
                echo '<div class=tile-stats-content>';
                echo '<div class=tile-stats-number><small>'.$kar2['nama_depan'].' '.$kar2['nama_tengah'].' '.$kar2['nama_belakang'].'</small></div>';
                echo '<div class=tile-stats-text><small>'.$kar2['job_tittle'].'</small></div>';
                echo '<div>';

                  $coms=$kar2['kode_company'];
                            
                  if ($coms=='ATHYA') { 

                      echo '<button class="btn btn-xs2 btn-purple">'.$kar2['no_pegawai'].'</button></div>';

                    } else { 

                      echo '<button class="btn btn-xs2 btn-success">'.$kar2['no_pegawai'].'</button></div>';

                    }

                echo '</div><div class=clearfix></div></a></div></div>';

              }
            
            ?>
        
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href="add_employee.php" target="_Blank">
            <div class=tile-stats-icon><i class="en-user-add color-blue"></i></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Add Employee</div>
              <div class=tile-stats-text>new hired</div>
            </div>
            <div class=clearfix></div>
            </a></div>
        </div>

              <!-- End .row -->
              <!-- Page End here -->
              </div>
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
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete this part?")) {
    document.location = delUrl;
  }
}
</script>
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
<script src=assets/js/pages/data-tables.js></script>
<!-- Google Analytics:  -->
<?PHP 	}  else { header("Location: error_page.php"); } ?>