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

        $tab="PROFILE"; 

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
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <!-- col-lg-4 start here -->
          <div class="panel panel-default plain profile-widget">
            <!-- Start .panel -->
            <div class="panel-heading white-bg pl0 pr0"></div>
            <div class=panel-body>
              <div class="col-lg-4 col-md-12 col-sm-12">
                <div class=profile-avatar><img src="photo/avatar/<?PHP echo $data['foto'] ?>"></div>
              </div>
              <div class="col-lg-8 col-md-12 col-sm-12">
                <div class=profile-name text-center><?PHP echo $data['nama_depan'] ?> <?PHP echo $data['nama_tengah'] ?> <?PHP echo $data['nama_belakang'] ?></div>
                <div class=profile-quote>
                  <p><?PHP echo $data['alamat_karyawan'] ?>, <?PHP echo $data['kota_karyawan'] ?> <?PHP echo $data['kodepos_karyawan'] ?>, <?PHP echo $data['propinsi_karyawan'] ?> - <?PHP echo $data['negara_karyawan'] ?></p>
                </div>
                <div class=profile-stats-info></div>
              </div>
            </div>
            <div class="panel-footer white-bg">
              <ul class=profile-info>
                <li><i class=im-phone></i><?PHP echo $data['telpon_karyawan'] ?></li>
                <li><i class=im-mobile2></i><?PHP echo $data['mobile_karyawan'] ?></li>
                <li><i class=ec-mail></i><?PHP echo $data['email_karyawan'] ?></li>
                <li><i class=im-office></i>
                	
                	<?PHP 
                			$dt= $data['no_perusahaan'];
                
                				if ($dt == "SDHTM") {
                					
                					echo "Sindhutama Supportindo, CV"; }
                					
                				else if ($dt == "ATHYA") {
                
                					echo "Athaya Abbas Mandiri, PT"; } ?></li>
                
              </ul>
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-4 end here -->
        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
          <!-- col-lg-12 start here -->
          <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading white-bg">
              <h4>Latest activity</h4>
            </div>
            <div class=panel-body>
              <div class=timeline>
                <!-- Start .timeline -->
                <!--<ul class=timeline-list>
                  <li>
                    <div class=timeline-time><small>just now</small></div>
                    <div class=timeline-icon><i class=fa-bitbucket></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $data['nama_depan'] ?> push 1 commit</strong></a></p>
                      <p>Pushed 1 commit to <a href=#>SprFlat - admin template</a></p>
                      <p><a href=#>385d312</a> - add new reload styles</p>
                    </div>
                  </li>
                  <li>
                    <div class=timeline-time><small>2 min ago</small></div>
                    <div class=timeline-icon><i class=fa-dribbble></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $data['nama_depan'] ?> add 1 new dribbble shot</strong></a></p>
                      <p><img alt=Hammerdribbble src=assets/img/hammer.png width=150></p>
                    </div>
                  </li>
                  <li>
                    <div class=timeline-time><small>17 min ago</small></div>
                    <div class=timeline-icon><img class=timeline-avatar src=assets/img/avatars/pp.png alt=SuggeElson></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $data['nama_depan'] ?> upload 3 pictures</strong></a></p>
                      <p><img src=assets/img/instagram/instagram.jpg alt=pic width=150> <img src=assets/img/instagram/instagram2.jpg alt=pic width=150> <img src=assets/img/instagram/instagram3.jpg alt=pic width=150></p>
                    </div>
                  </li>
                  <li class=load-more><a href=ubah_pass.php class="btn btn-primary">RESET PASSWORD</a></li>
                </ul>-->
              </div>
              <!-- End .timeline -->
            </div>
          </div>
          <!-- End .panel -->
        </div>
        <!-- col-lg-8 end here -->
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
<script src=assets/js/pages/charts.js></script>
<!-- Google Analytics:  -->

<?PHP 	}  else { header("Location: error_page.php"); } ?>