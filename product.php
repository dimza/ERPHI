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
    <div class=row>
      <!-- Start .row -->
      <!-- Start .page-header -->
      <div class="col-lg-12 heading">
        <br>
        <!-- Start .bredcrumb -->
        <ul id=crumb class=breadcrumb>
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
        <div class=gallery>
          <!-- start .gallery -->
          <div class=gallery-toolbar>
            <div class=col-lg-12>
              <!-- col-lg-12 start here -->
              <button class="filter btn btn-primary btn-alt mr5" data-filter=all>All</button>
              <button class="filter btn btn-primary btn-alt mr5" data-filter=.mech>MECHANICAL</button>
              <button class="filter btn btn-primary btn-alt mr5" data-filter=.elec>ELECTRICAL</button>
              <button class="filter btn btn-primary btn-alt mr5" data-filter=.inst>INSTRUMENTS</button>
              <button class="filter btn btn-primary btn-alt mr5" data-filter=.cisc>MISC</button>
              <span class="sort btn btn-primary btn-alt" data-sort=random>Random</span></div>
            <!-- col-lg-12 end here -->
          </div>
          <div class=gallery-inner>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix mech" data-my-order=1><a href=# class=thumbnail><img src=assets/img/gallery/1.jpg alt=image></a>
              <div class=gallery-image-controls>
                <div class=action-btn><a class="gallery-image-open btn btn-primary btn-round tipB" title="Open image" href=assets/img/gallery/1.jpg><i class=ec-search></i></a> <a class="gallery-image-download btn btn-primary btn-round tipB" title=Download href=#><i class=st-download></i></a> <a class="gallery-image-delete btn btn-primary btn-round tipB" href=# title=Delete><i class=ec-trashcan></i></a></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix elec" data-my-order=2><a href=# class=thumbnail><img src=assets/img/gallery/2.jpg alt=image></a>
              <div class=gallery-image-controls>
                <div class=action-btn><a class="gallery-image-open btn btn-primary btn-round tipB" title="Open image" href=assets/img/gallery/2.jpg><i class=ec-search></i></a> <a class="gallery-image-download btn btn-primary btn-round tipB" title=Download href=#><i class=st-download></i></a> <a class="gallery-image-delete btn btn-primary btn-round tipB" href=# title=Delete><i class=ec-trashcan></i></a></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix inst" data-my-order=3><a href=# class=thumbnail><img src=assets/img/gallery/3.jpg alt=image></a>
              <div class=gallery-image-controls>
                <div class=action-btn><a class="gallery-image-open btn btn-primary btn-round tipB" title="Open image" href=assets/img/gallery/3.jpg><i class=ec-search></i></a> <a class="gallery-image-download btn btn-primary btn-round tipB" title=Download href=#><i class=st-download></i></a> <a class="gallery-image-delete btn btn-primary btn-round tipB" href=# title=Delete><i class=ec-trashcan></i></a></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mix cisc" data-my-order=4><a href=# class=thumbnail><img src=assets/img/gallery/4.jpg alt=image></a>
              <div class=gallery-image-controls>
                <div class=action-btn><a class="gallery-image-open btn btn-primary btn-round tipB" title="Open image" href=assets/img/gallery/4.jpg><i class=ec-search></i></a> <a class="gallery-image-download btn btn-primary btn-round tipB" title=Download href=#><i class=st-download></i></a> <a class="gallery-image-delete btn btn-primary btn-round tipB" href=# title=Delete><i class=ec-trashcan></i></a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- gallery end here -->
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
<script src=assets/js/pages/gallery.js></script>
<!-- Google Analytics:  -->

<?PHP 	}  else { header("Location: error_page.php"); } ?>