<?php

  require_once(__DIR__.'/sys/db_con/db.php');

  $kode= @$_GET['online'];
  $npg= @$_GET['user'];

  $qry2="UPDATE user SET online=$kode where nopeg=$npg";
  $result2=mysql_query($qry2);

	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

  include 'include/login/header.php';

?>

<body class=login-page>
<!-- Start #login -->

<div id=login class="animated bounceIn">

<!--<img id=logo src=assets/img/url.png alt="sprFlat Logo" width="100" height="100">-->


  <!-- Start .login-wrapper -->
  <div class=login-wrapper>
    <div id=myTabContent class="tab-content bn">
      <div class="tab-pane fade active in" id="log-in">        
        <div class="social-buttons text-center mt10">
          <img style="margin: 0px 0px 0px 0px; border-radius:50%;" width="100" height="100" src=photo/avatar/tes.jpg>
        </div>
        <div class=seperator><strong>Dhimas Yuli Priya Wicaksana</strong>
          <hr>
        </div>
        <form class="form-horizontal mt10" action=sys/engine/login.php id=login-form role=form method="post">
          <div class=form-group>
            <div class=col-lg-12>
              <input name=email id=email readonly class="form-control left-icon" value="sales.support@sindhutama.co.id">
              <i class="ec-user s16 left-input-icon"></i></div>
          </div>
          <div class=form-group>
            <div class=col-lg-12>
              <input type=password name=password id=password class="form-control left-icon" placeholder="Password">
              <i class="ec-locked s16 left-input-icon"></i> <!--<span class=help-block><a href=#><small>Forgout password ?</small></a></span>--></div>
          </div>
          <div class=form-group>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-8">
              <!-- col-lg-12 start here -->
              <label class=checkbox><!-- <input type=checkbox name=remember id=remember value=option> -->
                <a href="#">Forgot your password ?</a></label>
            </div>
            <!-- col-lg-12 end here -->
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-4">
              <!-- col-lg-12 start here -->
              <button class="btn btn-success pull-right" type=submit>LOGIN</button>
            </div>
            <!-- col-lg-12 end here -->
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End #.login-wrapper -->
</div>
<!-- End #login -->
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
<!-- build:js assets/js/pages/login.js -->
<!-- Bootstrap plugins -->
<script src=assets/js/bootstrap/bootstrap.js></script>
<!-- Form plugins -->
<script src=assets/plugins/forms/icheck/jquery.icheck.js></script>
<script src=assets/plugins/forms/validation/jquery.validate.js></script>
<script src=assets/plugins/forms/validation/additional-methods.min.js></script>
<!-- Init plugins olny for this page -->
<script src=assets/js/pages/login.js></script>
<!-- endbuild -->
<!-- Google Analytics:  -->
