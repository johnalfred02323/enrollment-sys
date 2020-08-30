<?php 
require '../../../config/config.php';
session_start();

if (isset($_SESSION['department']))
{
  if($_SESSION['department'] == 'Accounting' && $_SESSION['usertype'] == 'Cashier')
  {
    $_SESSION['department'];
    $query = "SELECT * FROM timeframe WHERE status='Active' AND type='enrollment'";
    $result = mysqli_query($conn, $query) OR die(mysqli_error($conn));

    $result_data = mysqli_fetch_assoc($result);
  }
  else 
{
  header('location: ../../../401');
}
  
}
else 
{
  header('location: ../../../login/');
}

?>

<!-- Head -->
<?php
require 'layout/head.php'; 
 
?>

<!-- jquery -->
<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../../src/table/css/fixedHeader.dataTables.css">

<!-- Dark mode -->
<link rel="stylesheet" type="text/css" href="../../../src/table/css/jquery.dataTables-dark.css">


  <title>GRC System | Accounting</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require 'layout/cashier-side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require 'layout/cashier-top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard.php">Dashboard</a> / Transaction / Enrollment</div>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>
<div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-5">
<div class="input-group mb-3 d-flex justify-content-center d-inline-flex">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Search</span>
  </div>
  <input type="text" class="form-controls" placeholder="E.g. '2020-01-00001'" aria-label="Search" id="search_student" onkeypress="return Validate(event);" maxlength="13">
</div>
    </div>
    <div class="col-lg-3">
    </div>
  </div>
    <div class="card shadow-sm mb-4"> <!-- card start -->
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <label class="container-check">All Courses
            <input type="checkbox" id="checkall">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" id="course">BSIT
            <input type="checkbox" class="checkItem" value="BSIT">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" id="bsba_course">BSBA
            <input type="checkbox" class="checkItem" value="BSBA">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" id="bsa_course">BSA
            <input type="checkbox" class="checkItem" value="BSA">
            <span class="checkmark-check"></span>
          </label>
          <label class="container-check" id="bse_course">BSE
            <input type="checkbox" class="checkItem" value="BSE">
            <span class="checkmark-check"></span>
          </label>
        </div>

          <div class="card-body" >
            <div id="fetch_students" class="table-card">
              <div class="table-responsive table-scroll">  
                <table class="table table-striped" id="student_table">
                  <thead>
                    <tr class="table-bordered">
                      <th scope="col">Student&nbsp;Number</th>
                      <th scope="col">Name</th>
                      <th scope="col" class="align-items-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td colspan="4"><center>Select Course to display Student List</center></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
</div> <!-- card end -->


    </div>
        <!-- /.container-fluid -->
   
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
     
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

    <!-- Modal Start -->
<div class="modal fade" id="transaction_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Transaction</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>  
        <div class="modal-body">
          <div id="transaction_content"></div>
          
        </div>
        <div class="modal-footer">
          <button id="cancel" class="view-user pull-xs-right edit" ripple data-dismiss="modal" onclick="reset()"><i class="fas fa-times"></i> Cancel</button>
          <button id="generate" class="view-user pull-xs-right com" ripple>Generate COM</button>
        </div>
        </div>
      </div>
</div> 




  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 


  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>


<script src="../../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
<script src="../../../src/vendor/table/js/jquery.dataTables.min.js"></script>
<script src="../../../src/vendor/table/js/dataTables.responsive.min.js"></script>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

  <!-- Counter -->
  <script src="../../../src/js/counter.js"></script>

</body>

</html>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed" style="max-width: 500px;">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


<script>  
  $(document).ready(function(){  
    var get_all = [];

    function get_data(get_all,val) {
      var all = JSON.stringify(get_all);
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"get_students":1,all:all,semester:"<?php echo $result_data["semester"];?>",school_year:"<?php echo $result_data["school_year"];?>",val:val},
        success:function(data) {
          $('#fetch_students').html(data);
        } 
      });
    }

    $('#checkall').change(function(){
      $('.checkItem').prop('checked', $(this).prop('checked'));
      if($(this).prop('checked') == true) {
         $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
      }
      get_data(get_all);
      get_all = [];
    });
    $('.checkItem').change(function(){
      if($(this).prop('checked') == false) {
        $('#checkall').prop('checked', false);
      }
      if($('.checkItem:checked').length == $('.checkItem').length) {
        $('#checkall').prop('checked', true);
      } 
    });

    $('.checkItem').click(function(){
      var course = $(this).val();
      
      $('.checkItem:checked').each(function(){
        get_all.push($(this).val());
      });
      get_data(get_all);
      get_all = [];
    });

    $('#search_student').keyup(function(){
        var value = $(this).val();

        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
          
        if(value != '') {
          get_data(get_all,value);
          get_all = [];
          isRunning = false;
        }
        else if(value == ''){
          get_data(get_all);
          get_all = [];
          isRunning = true;
        }
      });


    $('#fetch_students').on('click', '.transact', function(){
      var id = $(this).attr('id');
      $.ajax({
        url:"process.php",
        method:"POST",
        data:{"fetch_single":1,sn:id,semester:"<?php echo $result_data["semester"];?>",school_year:"<?php echo $result_data["school_year"];?>"},
        success:function(data) {
          $('#transaction_content').html(data);
        }
      });
    });

  });


//Generate COM
$(document).on('click', '#generate', function(){  
           var query = $('#studno_hide').val();       // Student Number
           var scholar1 = $('#scholar').val();        // Type of Scholar
           var misc1 = $('#ss').val();                // Miscellaneous
           var units1 = $('#total1').text();          // Total Units
           var perunits1 = $('#fees').text();         // Tuition Fee Per Unit
           var amount1 = $('#totalamount').text();    // Amount
           var tunits1 = $('#totalunits1').text();    // TOtal Unit Per Unit
           var or = $('#or_id').val();                // Official Receipt
           var cashrender = $('#cashrender').val();   // Cash Rendered
           var disc = $('#discount').text();          // Discount
           var tdisc = $('#disamount').text();        // Total Discount
           var bals = $('#bal').val();                // Balance
           var stat = $('#en_status').text();         // Status
           var promi = 0;
           var earlybird = 0;

           if($('#promissory_note').prop('checked')==true)
           {
            promi++;

           }

           if($('#early_bird').prop('checked')==true)
           {
            earlybird++;

           }
            

          if( or == '' && scholar1 == 'Type of Scholar' && perunits1 == '' && cashrender == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("All Empty");
          }
          else if( or == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Official Receipt Number");
          }
            
          else if( perunits1 == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Tuition Fees Per Unit");
          }

          else if( scholar1 == 'Type of Scholar' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Type of Scholar");
          }

          else if( cashrender == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Cash Render");
          }

          else if(cashrender >= 1 && cashrender < 500)
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Minimum of 500 Pesos");
          }

            else{

            
            if(query != '')  
            {  
                // $.ajax({  
                //      url:"process.php",  
                //      method:"POST",  
                //      data:{"fetch_single":1,query:query},  
                //      success:function(data)  
                //      {  
                      
                //       alert(data);
                //           window.location.href='certificate_of_matriculation?studentnumber='+query+'&partial='+scholar1+'&fees='+misc1+'&totalunits='+units1+'&perunits='+perunits1+'&amount='+amount1+'&tunits='+tunits1+'&discount='+disc+'&totaldiscount='+tdisc+'&officialreceipt='+or+'&cashrender='+cashrender+'&balance='+bals;
                //      }  
                // });

                 $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cashrender:cashrender,bals:bals,disc:disc,amount1:amount1,tdisc:tdisc,stat:stat,promi:promi,earlybird:earlybird},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        
                        window.open('certificate_of_matriculation?studentnumber='+query+'&partial='+scholar1+'&fees='+misc1+'&totalunits='+units1+'&perunits='+perunits1+'&amount='+amount1+'&tunits='+tunits1+'&discount='+disc+'&totaldiscount='+tdisc+'&officialreceipt='+or+'&cashrender='+cashrender+'&balance='+bals+'&promissory='+promi+'&earlybird='+earlybird);
                          $('#transaction_modal').modal('hide');
                          window.location.href='./';

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Officia Receipt Exist");
                       }

                     }  
                });
              } 
                
      }
      });




 function Validate(event) {
        var regex = new RegExp("^[0-9-]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }


</script>