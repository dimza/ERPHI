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

	if ($kd_role== "1" && $spc== "33") {	

    $tab="USER LIST";    

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
  <?PHP //include ("info.php"); ?>       
      <div class=row>
        <div class=col-lg-12>
          <!-- col-lg-12 start here -->

            <?PHP switch ($alrt) { case "1":?>
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            You successfully deleted raw data with this <strong><?PHP echo $var ?></strong> as a username. <a href="sys/engine/hapus_usr.php?clt=<?PHP echo $var ?>&&swch=2"><button class="btn btn-xs btn-info"><i class="en-trash"></i> ROLL BACK</button></a>
            </div>            
            <?PHP break; case "0": ?> 
            
            <div class="alert alert-success fade in">
            <button type=button class=close data-dismiss=alert aria-hidden=true>&times;</button>
            <strong>Well done!</strong> You successfully restore data with this <strong><?PHP echo $var ?></strong> as a username.
            </div>             
            
            <?PHP break; default: }?>

          <div class="panel panel-default plain panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>USER LIST PROFILE</h4>
            </div>
            <div class=panel-body>
              <table class="table display" id=datatable>
                <thead>
                  <tr>
                    <th>Nick Name
                    <th>Company					
                    <th>NIP
                    <th>Role					
                    <th>Status
                    <th>Last Mod.
                    <th style="text-align: right;"><i class="im-cog"></i>			
                <tbody>					
					<?PHP $kar= mysql_query("select * from user where vis='0' order by id_pegawai asc");
		
						While($kar2= mysql_fetch_assoc($kar))
							{
								echo '<tr class="odd gradeX">';								
								echo '<td><a href="detail_user.php?kd='.$kar2["id_pegawai"].'">'.$kar2['nama_pegawai'];
                
                          $cmpy=$kar2['kode_company'];
                          $cmpy2= mysql_query("select * from `company` where kode_company='$cmpy'") or die(mysql_error());
                          $cmpy3= mysql_result($cmpy2, 0, 'nama_company');

                echo '<td>'.$cmpy3;
								echo '<td class="text-center">'.$kar2['nopeg'];
								echo '<td class="text-center">'.$kar2['role'];
                echo '<td>';

                    include __DIR__ . '/sys/engine/user_stat.php'; 

                echo '<td>'.$kar2['modified_date'];
                echo '<td style="text-align: right;"><a href="edit_users.php?kd='.$kar2["id_pegawai"].'" target="_Blank"><i class="en-pencil"></i></a> | ';
								echo '<a href="sys/engine/hapus_usr.php?kd='.$kar2["id_pegawai"].'&&dt='.$today.'&&pg='.$peg.'&&clt='.$kar2["username"].'&&swch=1" onclick=\'return confirm("Anda yakin ingin menghapus?")\'><i class="fa-trash"></i></a>';								
							}
					?> 					
                <tfoot>
                  <tr>
                    <th><a href="add_user.php" target="_Blank"><button type=button class="btn btn-sm btn-primary">ADD USER</button></a>	
<!--                     <th>
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
                      </div> -->				
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