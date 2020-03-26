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
    
    $today = date("j F Y");    

  if ($kd_role == "1") {  

    $tab="EMPLY";    

  include ("head_meta.php");

?>
<body>
  <?PHP

  include ("header.php");
  include ("sidebar.php"); 

  ?>

<!-- Start #content -->
<div id="content">
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
        <!-- Start .row -->

        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25"><a href=#>
            <div class=tile-stats-icon-baru><img class=chat-avatar src=assets/img/avatars/11.png alt=@chadengle></div>
            <div class=tile-stats-content>
              <div class=tile-stats-number>Hendra Hermawan</div>
              <div class=tile-stats-text>Spv. Exim and Expediting</div>
              <div class=tile-stats-number><small>THIESS Indonesia, PT</small></div>
            </div>
            <div class=clearfix></div>
            </a>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <div class="tile-stats b brall mb25">
            <a href=#myModal role=button data-toggle=modal>
              <div class=tile-stats-icon><i class="en-user-add color-blue"></i></div>
                <div class=tile-stats-content>
                  <div class=tile-stats-number>ADD CONTACT</div>
                    <div class=tile-stats-text>Connecting people</div>
                </div>
              <div class=clearfix></div>
            </a>
            </div>
        </div>

        <div class=col-lg-12>
          <!-- col-lg-12 start here -->
          <!-- Button to trigger twitter bootstrap modal -->
          <!-- <a href=#myModal role=button class="btn btn-alt btn-danger mb25" data-toggle=modal>Launch TinyMCE in bootstrap modal</a> -->
          <!-- Modal itself -->
          <div class="modal fade" id="myModal" tabindex=-1 role=dialog aria-hidden=true>
            <div class=modal-dialog>
              <div class=modal-content>
                <div class=modal-header>
                  <button type=button class=close data-dismiss=modal aria-hidden=true>&times;</button>
                  <h4 class=modal-title>Modal title</h4>
                </div>
                <div class=modal-body>
                  <!-- content in modal, tinyMCE 4 texarea -->
                  <textarea class=modal-example name=content><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis <a href=le-test-page/de-la-subsub.html target=_self rel=nofollow>nostrud</a> exercitation <a href=#test target=_self rel=nofollow>ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </textarea>
                </div>
                <div class=modal-footer>
                  <button type=button class="btn btn-default" data-dismiss=modal>Close</button>
                  <button type=button class="btn btn-primary">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- col-lg-12 end here -->
      </div>
      <!-- End .row -->
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
<script src=assets/js/pages/wysiwyg.js></script>
<!-- Google Analytics:  -->
<?PHP   }  else { header("Location: error_page.php"); } ?>