<?php 
require '../layout/head.php';
require '../../../config/config.php';

if(isset($_COOKIE["username"])): ?>
<label id="usercash" hidden=""><?php echo $_COOKIE['username']; ?></label>
<?php endif ?>

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
        <?php require '../layout/cashier-top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard">Dashboard</a> / Transaction / Enrollment</div>
  </ol>
</nav>


<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>



    <div class="card shadow-sm mb-4"> <!-- card start -->
        <!-- Card Header - Dropdown -->

        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           
           <div class="row">
             <div class="col-12">
                <h5 class="m-0 font-weight-bold mb-4">Student Enrollment</h5>
             </div>
             <div class="col-12 d-flex justify-content-between">
                <label class="container-check">
                  Filter :
                </label>
                <label class="container-check">All Courses
                  <input type="checkbox" id="checkall">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check" id="course">BSIT
                  <input type="checkbox" class="checkItem" value="BSIT">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check" >BSBA
                  <input type="checkbox" class="checkItem" value="BSBA">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check" >BSEntrep
                  <input type="checkbox" class="checkItem" value="BSEntrep">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check" >BSA
                  <input type="checkbox" class="checkItem" value="BSA">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check" >BSE
                  <input type="checkbox" class="checkItem" value="BSE">
                  <span class="checkmark-check"></span>
                </label>
                <label class="container-check" >BEEd
                  <input type="checkbox" class="checkItem" value="BEEd">
                  <span class="checkmark-check"></span>
                </label>               
             </div>
           </div>
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
      var isRunning = true;

      get_data();

      function get_data(get_all,val) {
        var all = JSON.stringify(get_all);

        var table = $('#student_table').DataTable({
          "pagingType": "full_numbers",
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          "pageLength": 10,
          "order": [[ 1, 'desc' ]],          
          "serverSide" : true,
          "ajax" : {
                "url":"fetch_students.php",
                "data":{ 
                  "course":all, 
                  "school_year":"<?php echo $result_data["school_year"];?>", 
                  "semester":"<?php echo $result_data["semester"];?>" }
          },
          responsive: true,
          searchPlaceholder: "Search records",
          fixedHeader: {
              header: true,
              footer: true
          },
          language: {
              search: "_INPUT_",
              searchPlaceholder: "Search..."
          }
        });
      }
      
      $('#checkall').change(function(){
        $('.checkItem').prop('checked', $(this).prop('checked'));
        if($(this).prop('checked') == true) {
           $('.checkItem:checked').each(function(){
            get_all.push($(this).val());
          });
          $('#student_table').DataTable().destroy();
          get_data(get_all);
          get_all = [];
        } 
      });
      $('.checkItem').click(function(){
        var course = $(this).val();
        
        $('.checkItem:checked').each(function(){
          get_all.push($(this).val());
        });
        $('#student_table').DataTable().destroy();
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
           var sem = $('#semester').text();           // Semester
           var sy = $('#schoolyr').text();            // Academic Year
           var uc = $('#usercash').text();            // Username of Cashier
           var ln1 = $('#ln').text();                 // Lastname
           var fn1 = $('#fn').text();                 // Firstname
           var mn1 = $('#mn').text();                 // Middlename
           var ymd = $('#tdates').text();             // Date Today
           var dscpt = $('#descript').text();         // Description
           var downpay = $('#downpayment').text();    // Downpayment
           var midterm = $('#midterm').text();        // Midterm
           var final = $('#finals').text();           // Final
           var prom = $('#promissory_note').val();    // Promissory Note
           var mdterm = $('#midterm').text();         // Midterm for DB
           var yrlvl = $('#yrlvl2').val();            // Type of Scholar
           var reg = $('#reg2').val();                // Status
           var stud_scholar = document.getElementById("scholar");
           var promi = 0;
           var five = 500;
           
           
           
           var q1 = $('#ss').val();
           var t1 = $('#samp1').val();
           var t2 = $('#total1').text();
           var a3 = Number(q1)+(Number(t1)*Number(t2)) ;
           var r1 = Number(a3)*.4;

           // alert(a3);
          

           if($('#promissory_note').prop('checked')==true)
           {
            promi++;

           }
          
          if( cashrender < r1 )
          {
              $('#promissory_note').prop('checked', true);
              promi++;
          }else{}

          if( cashrender == a3 ){
             // for equal tuition
             // dont remove
          }    
          

          if( or == '' && scholar1 == 'Type of Scholar' && perunits1 == '' && cashrender == '' && yrlvl == 'Year Level' && reg == 'Status')
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

          else if( yrlvl == 'Year Level' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Year Level");
          }

          else if( reg == 'Status' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Status");
          }

          else if( cashrender == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Cash Render");
          }

          else if( cashrender < 500 )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Minimum of 500 Pesos");
          }

          else if ( cashrender > a3 )
          {
              $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              $('#failedmsg').html("Please Input Exact Amount of Payment");
          }


            else{ 
                
                 $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cashrender:cashrender,bals:bals,disc:disc,amount1:amount1,tdisc:tdisc,stat:stat,promi:promi,sem:sem,sy:sy,perunits1:perunits1,uc:uc,ln1:ln1,fn1:fn1,mn1:mn1,scholar1:scholar1,misc1:misc1,tunits1:tunits1,units1:units1,dscpt:dscpt,mdterm:mdterm,yrlvl:yrlvl,downpay:downpay,reg:reg},
                     success:function(data1)  
                     {  


                       if(data1 == '0')
                       {
                        
                        window.open('certificate_of_matriculation?studentnumber='+query+'&partial='+scholar1+'&fees='+misc1+'&totalunits='+units1+'&perunits='+perunits1+'&amount='+amount1+'&tunits='+tunits1+'&discount='+disc+'&totaldiscount='+tdisc+'&officialreceipt='+or+'&cashrender='+cashrender+'&balance='+bals+'&promissory='+promi+'&semester='+sem+'&schoolyear='+sy+'&today='+ymd+'&yearlevel='+yrlvl+'&regular='+reg);
                          $('#transaction_modal').modal('hide');
                          window.location.href='./';
                       
                        }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }
                     
                       
                     }  
                });
              
              
      }
      
      });

$(document).on('click', '.transact', function(){
$('#transaction_modal').modal('show');
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