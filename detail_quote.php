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
	  
	  $id_com= mysql_query("select * from quote where id_quote='29'");
	  $id_com2 = mysql_fetch_array($id_com);
	  $id_com3 = $id_com2['quote_no'];



	
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
                  <li>
                    <div class=timeline-time><small>just now</small></div>
                    <div class=timeline-icon><i class=fa-dollar></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $id_com3 ?></strong></a> Change status to <b>INVOICING</b></p>
                      <p><a href=#>0013/SS-INV/07/2014</a> as a reference payment number. </p>
                    </div>
                  </li>
                  <li>
                    <div class=timeline-time><small>2 min ago</small></div>
                    <div class=timeline-icon><i class=st-cube></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $id_com3 ?></strong></a> Items has Delivered with DO number <a href="" >0045/SS-DO/07/2014</a></p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, minus, eveniet ut debitis eos nihil praesentium reiciendis cupiditate tempore non ad numquam distinctio sequi ullam facere soluta molestias consequatur adipisci.</p>
                    </div>
                  </li>
                  <li>
                    <div class=timeline-time><small>1 day ago</small></div>
                    <div class=timeline-icon><i class=im-truck></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $id_com3 ?></strong></a> Items Arrived. Reference from <a href="" >0013/SS-PO-OUT/07/2014</a></p>
                      <p><img src=assets/img/instagram/01.jpg alt=pic width=100 height=100> <img src=assets/img/instagram/02.jpg alt=pic width=100 height=100> <img src=assets/img/instagram/03.jpg alt=pic width=100 height=100></p>
                    </div>
                  </li>
                  <li>
                    <div class=timeline-time><small>1 week ago</small></div>
                    <div class=timeline-icon><i class=br-cart></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $id_com3 ?></strong></a> Change status to <b>ON PROGRESS</b></p>
                      <p>Transfer payment to <a href=#>CONTROL SYSTEM ARENA PARA NUSA, PT</a></p>
                      <p><a href=#>0013/SS-PO-OUT/07/2014</a> as a reference payment number. </p>
                    </div>
                  </li>
                  <li>
                    <div class=timeline-time><small>02/07/2014</small></div>
                    <div class=timeline-icon><i class=st-file></i></div>
                    <div class=timeline-content>
                      <p><a href=#><strong><?PHP echo $id_com3 ?></strong></a> Created By. <a href="" ><?PHP echo $id_com2['create_user']; ?></a></p>
                    </div>
                  </li>
                  <li class=load-more><!--<a href=# class="btn btn-primary">Load 10 more</a>--></li>
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