Start #sidebar -->
<div id=sidebar>
  <!-- Start .sidebar-inner -->
  <div class="sidebar-inner">
    <!-- Start #sideNav -->
    <ul id="sideNav" class="nav nav-pills nav-stacked">
      <li class=top-search>
        <form>
          <input name=search placeholder="Search ...">
          <button type=submit><i class="ec-search s20"></i></button>
        </form>
      </li>
      	<li><a href=dashboard.php><i class=im-home></i> DASHBOARD</a></li>
      <li><a href=#>SALES <i class=im-file></i></a>
        <ul class="nav sub">
          <!-- <li><a href=opportunityList.php><i class=en-arrow-right7></i> Opportunity</a></li> -->
          <li><a href=tenderList.php><i class=en-arrow-right7></i> Tender</a></li>        
<!--           <li><a href=sales_team.php><i class=en-arrow-right7></i> Sales Team</a></li> -->
          <li><a href=listQuote.php><i class=en-arrow-right7></i> Inquiries</a></li>
          <li><a href=listGoods.php><i class=en-arrow-right7></i> Register a Goods</a></li>
          <li><a href=pembelian.php><i class=en-arrow-right7></i> Purchase Order</a></li>          
<!--           <li><a href=product.php><i class=en-arrow-right7></i> Product & Services</a></li>
          <li><a href=monthSales.php><i class=en-arrow-right7></i> Month Sales</a></li> -->
        </ul>
      </li>
<!--       <li><a href=#>PROJECT <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=#><i class=en-arrow-right7></i> Project List</a></li>
          <li><a href=#><i class=en-arrow-right7></i> Services</a></li>
        </ul>
      </li> -->
      <li><a href=#>FINANCE <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=invoice.php><i class=en-arrow-right7></i> Invoicing</a></li>
          <!-- <li><a href=oe.php><i class=en-arrow-right7></i> Expenses</a></li> -->
          <li><a href=listCurrency.php><i class=en-arrow-right7></i> Currency</a></li>
          <!-- <li><a href=list_code.php><i class=en-arrow-right7></i> Costcode</a></li>-->
          <!-- <li><a href=list_bank.php><i class=en-arrow-right7></i> Account Bank</a></li> -->          
        </ul>
      </li>      
      <li><a href=#>LOGISTIC <i class=im-file></i></a>
        <ul class="nav sub">
          <li><a href=inventory.php><i class=en-arrow-right7></i> Receiving Goods</a></li>
          <li><a href=inventory2.php><i class=en-arrow-right7></i> Goods Stock</a></li>
          <li><a href=do.php><i class=en-arrow-right7></i> Delivery Order</a></li>
          <li><a href=current.php><i class=en-arrow-right7></i>Asset Current</a></li>
          <!-- <li><a href=404.php><i class=en-arrow-right7></i> Assets Non-Current</a></li> -->
        </ul>
      </li>                        
      <li><a href=#>HR <i class=im-file></i></a>
        <ul class="nav sub">
<!--           <li><a href=list_employee2.php><i class=en-arrow-right7></i> Attendance</a></li>  -->         
          <li><a href=list_employee.php><i class=en-arrow-right7></i> Employee</a></li>
<!--           <li><a href=404.php><i class=en-arrow-right7></i> Payroll</a></li>
          <li><a href=404.php><i class=en-arrow-right7></i> Recruiter</a></li> -->
          <?php if ($spc== '33') { 
          echo '<li><a href=list_user.php><i class=en-arrow-right7></i> Users</a></li>';
          } else {}
          ?>
        </ul>
      </li>     
                                    
    </ul>
    <!-- End #sideNav -->

  </div>
  <!-- End .sidebar-inner -->
</div>
<!-- End #sidebar -->
<!-- Start #right-sidebar -->
<div id="right-sidebar" class=hide-sidebar>
<?PHP include ("chat.php");  ?>
</div>
<!-- End #right-sidebar