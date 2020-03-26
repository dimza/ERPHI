<?php

  $q = $_GET['q'];

  require_once(__DIR__.'/../db_con/db.php');

    $thn = date("Y");
    $bln = date("m");

  require_once(__DIR__.'/romawi.php');


  if ($q == "1") { ?>

                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">No Tenders</label>
                    <div class="col-lg-2 col-md-10">
                      <?PHP $tndr= mysql_query("select * from tender order by tenderId");
            
                        echo '<select class="form-control select2" name="tdr">';
                        echo '<option value="">SELECT';
                  
                          While($tndr2= mysql_fetch_assoc($tndr)) {

                            echo '<option value="'.$tndr2['tenderId'].'">';
                            echo $tndr2['referenceNo'].' - '.$tndr2['tittleTender'];
                            echo '</option>';
                                                                  }
                        echo '</select>';
                      ?>
                    </div>
                </div>
                <!-- End .form-group  -->

<?PHP  } else if ($q == "2") { ?>
    
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Inquiry No.</label>
                    <div class="col-lg-6 col-md-10">
                      <?PHP 

                        $comp= mysql_query("select * from quote where status='10' order by id_quote");
            
                echo '<select class="form-control select2" name="quote">';
                echo '<option value="">SELECT';
                  
                  While($comp2= mysql_fetch_assoc($comp))
                {
                  echo '<option value="'.$comp2['quote_no'].'">';
                  $qts= $comp2['quote_no'];
                  echo $qts;
                  echo '</option>';
                }
                
                echo '</select>';
              ?>
                    </div>
                </div>
                <!-- End .form-group  -->

<?PHP  } else if ($q == "3") { ?>
    
                <div class=form-group>
                  <label class="col-lg-2 col-md-2 col-sm-12 control-label">Internal PO</label>
                    <div class="col-lg-6 col-md-10">
                      <?PHP 

                        $pi= mysql_query("select * from purchaseint where status='10' order by idPurchaseInt");
            
                echo '<select class="form-control select2" name="pi">';
                echo '<option value="">SELECT';
                  
                  While($pi2= mysql_fetch_assoc($pi))
                {
                  echo '<option value="'.$pi2['idPurchaseInt'].'">';
                  $qts= $pi2['tittle'];
                  echo $qts;
                  echo '</option>';
                }
                
                echo '</select>';
              ?>
                    </div>
                </div>
                <!-- End .form-group  -->

<?PHP

  } 

mysql_close();
?> 