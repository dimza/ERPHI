<?PHP 

	require_once(__DIR__.'/sys/db_con/auth.php'); 
	require_once(__DIR__.'/sys/db_con/db.php');
	  
	  $id2=$_SESSION['SESS_MEMBER_ID'];
	  
	  $tampil= mysql_query("select * from user where id_pegawai='$id2'");
	  $data_tampil = mysql_fetch_array($tampil);
	  
	  $kd_role = $data_tampil['role'];
	  $nopeg = $data_tampil['nopeg'];
    $peg = $data_tampil['nama_pegawai'];    
	  
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
        <!-- Start .row -->
        <div class=col-lg-12>
          <div class="bs-callout bs-callout-info fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <h4>Info</h4>
            <p>Mohon maaf, untuk modul ini masih dalam proses maintenance.</p>
          </div>
        </div>
      </div>
      <!-- End .row -->       
      <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          
            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a ID Employee. <a href="sys/engine/opportunityDeleted.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
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
              <h4>OPPORTUNITY LIST</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id="datatable">
                <thead>
                  <tr>
                    <th>Description
                    <th>Type					
                    <th>Client
                    <th>Status					
                    <th>Owner
                    <th style="text-align: right; padding-right: 3%;"><i class="im-cog"></i>			
                <tbody>					
					<?PHP $kar= mysql_query("select * from OPPORTUNITY where vis='0' order by opportunityId");
		
						While($kar2= mysql_fetch_assoc($kar))
							{
								echo '<tr class="odd gradeX">';								
								echo '<td><a href="opportunityView.php?kd='.$kar2["opportunityId"].'" target="_Blank">'.$kar2['description'];
								echo '</a><td>'.$kar2['opportunityType'];								
								echo '<td>'.$kar2['clientId'];
                echo '<td>'.'<span class="label label-success">'.$kar2['status'].'</span>';
								echo '<td>'.$kar2['employeeId'];
                echo '<td style="text-align: right;"><a href="opportunityEdited.php?kd='.$kar2["opportunityId"].'" style="padding-right: 10%;" target="_Blank"><i class="fa-edit"></i></a>';
								echo '<a style="padding-right: 10%;" href="sys/engine/opportunityDeleted.php?kd='.$kar2["opportunityId"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$kar2["clientId"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';								
							}
					?> 					
                <tfoot>
                  <tr>
                    <th><a href="addOpportunity.php" target="_Blank"><button type=button class="btn btn-sm btn-primary">ADD OPPORTUNITY</button></a>	
                    <th>
                    <th>
                    <th>
                    <th>
                    <th style="text-align: right;">              
                      <div class=btn-group>
                        <button type=button class="btn btn-sm btn-primary">EXPORT</button>
                        <button type=button class="btn btn-sm btn-primary dropdown-toggle" data-toggle=dropdown><span class=caret></span> <span class=sr-only>Toggle Dropdown</span></button>
                        <ul class=dropdown-menu role=menu>
                          <li style="text-align: left;"><a href=#>PDF</a></li>
                          <li style="text-align: left;"><a href=#>Excel</a></li>
                        </ul>
                      </div>				
              </table>
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