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
    <div class="breadcrumb-item active" aria-current="page"><a href="../cashier-dashboard">Dashboard</a> / Transaction / Followup Payment</div>
  </ol>
</nav>




<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Followup Payment</h6>

  </div>

    <div class="card-body" >

<style>  
    #searchstudlist ul{  
    background-color:#ccc;  
    cursor:pointer;  
    }  
    #searchstudlist li{  
    padding:12px;  
    }
</style>

  <div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Search</span>
  </div>
  <input type="text" class="form-controls" id="searchstud" aria-label="Default" placeholder="Student Number" aria-describedby="inputGroup-sizing-default" autocomplete="off">
</div>
    <span id="searchstudlist" style="position: absolute; display: inline-block; z-index: 1;"></span>

    </div>
    <div class="col-sm">
    </div>
  </div>
</div>

<div class="container m-0" id="studdata">
  <br>
  <div class="row" id="studinfo">


  </div>

 

  <br>
  <br>
  <br>

</div>
</div>
</div>

   <div id="transaction_div" class="row" style="display: none;">

        <div class="col-lg-6"> <!-- left column Start -->

        <table class="table table-hover table-striped" id="tbl">
                  <thead>
                   
                     
                  </thead>
                   <tbody>
                   
                    </tbody>
        </table>

      
        </div>


      
        <div class="col-lg-6"> 

        <div class="col-sm-12">

       <!-- Textbox Cash Rendered -->
       <input type="text" class="form-controls" id="rendered" aria-label="Default" placeholder="Cash Rendered" aria-describedby="inputGroup-sizing-default" maxlength="5" onkeypress="return Validate(event);"><br>

       <input type="text" class="form-controls" id="bals" aria-label="Default" placeholder="Balance" aria-describedby="inputGroup-sizing-default" disabled=""><br>

       <input type="text" class="form-controls" id="addcash" aria-label="Default" aria-describedby="inputGroup-sizing-default" disabled="" hidden="">
       </div>
 
        <div class="col-sm-3">

        <!-- Button Done -->
        <button id="done" class="view-user pull-xs-right edit" ripple><i class="fas fa-money-check-alt"></i> Done</button>
    
        <br>
        <br>
        </div>
        </div> 
      </div>


        </div>
        <!-- /.container-fluid -->
   

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php require '../../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Button Effect -->
<script src="../../../src/js/button-effect.js"></script> 

<!-- Modal -->



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

<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Successful!</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="save" id="savedone" ripple><i class="fas fa-check"></i> Ok</button>
      </div>
      </div>
    </div>
</div>


<script>  
 $(document).ready(function(){  

  // Student Search Textbox
      $('#searchstud').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"autosearch":1,query:query},  
                     success:function(data)  
                     {  
                          $('#searchstudlist ').fadeIn();  
                          $('#searchstudlist').html(data); 

                     }  
                });
           } 

          document.getElementById("searchstudlist").style.display = "none";
          
      });  

// Student Click by Search
      $(document).on('click', 'li', function(){  
           $('#searchstud').val($(this).text());  
           $('#searchstudlist').fadeOut(); 
           var query = $(this).text();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"getstuddata":1,query:query},  
                     success:function(data)  
                     {  
                          $('#studdata').fadeIn();  
                          $('#studdata').html(data);  
                     }  
                });
                 
           } 
           $('#transaction_div').show();
          $('#studdata').html('<div class="row"><div class="col-sm">Name:</div> ');  
      });
 });  


 function Validate(event) {
        var regex = new RegExp("^[0-9-]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }

$('#rendered').keyup(function()
{

 var numb1 = $('#bal').text();
 var numb2 = document.getElementById('rendered').value;
 var numb3 = $('#totalcash').text();

    if($(this).val() == '')
    {
      $('#bals').val('');
     
    }
    else 
      {
        
        var result1 = parseInt(numb2) - parseInt(numb1);

          if (result1 >= 0)
           {
              $('#bals').val('0');
           }

          if (result1 <= 0)
           {
              $('#bals').val(Math.abs(result1));
           }

        }


    if($(this).val() == '')
    {
      $('#addcash').val('');
     
    }
    else 
      {
        
        var result2 = parseInt(numb2) + parseInt(numb3);

          if (result2 < 0)
           {
              $('#addcash').val();
           }

          if (result2 > 0)
           {
              $('#addcash').val(Math.abs(result2));
           }

        }

});

$(document).on('click', '#done', function(){  
           var query = $('#sn').text();             // Student Number
           var lname = $('#ln').text();             // Lastname
           var fname = $('#fn').text();             // Firstname
           var mname = $('#mn').text();             // Middlename
           var am = $('#am').text();                // Amount
           var sy = $('#sy').text();                // School Year
           var sem = $('#sem').text();              // Semester
           var status = $('#stat').text();          // Status
           var cashier = $('#usercash').text();     // Cashier
           var or = $('#or_id').val();              // Official Receipt
           var bal = $('#bals').val();              // Balance
           var cash = $('#rendered').val();         // Cash Rendered
           var ac = $('#addcash').val();            // Total Pay
           var dscpt = $('#ds').text();             // Description
           var rq = $('#rq').text();                // Required Downpayment
           var midterm = $('#mm').text();           // Midterm
           var tcash = $('#tcash').text();          // Total Cash
           var scholar = $('#scholar').text();      // Scholar

           //alert(scholar);
           var cd = am - bal;

          if( or == '' && cash == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("All Empty");
          }
          else if( or == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Official Receipt Number");
          }

          else if( cash == '' )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Cash Render");
          }

          else if( cash > cd )
          {
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $('#failedmsg').html("Please Input Exact Amount");
          }

          else{
              var cc = am - bal;

  $.ajax({  
    url:"student_balance.php",  
    method:"POST",  
    data:{"checkstudent":1,query:query,sy:sy,sem:sem},
    success:function(data)  
    {  
       //alert(cc);

              if(data == '')
              {

                if(cc == rq) {

                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
              }
        
              else if(cc < rq) {

                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"1"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
              }
              // else if(cc > rq) {

              //    $.ajax({  
              //        url:"student_balance.php",  
              //        method:"POST",  
              //        data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0"},
              //        success:function(data1)  
              //        {  
                        
              //          if(data1 == '0')
              //          {
              //           $('#success').modal('show');

              //          }
              //          else
              //          {
              //           $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
              //           $('#failedmsg').html("Official Receipt Exist");
              //          }

              //        }  
              //     });
              // }
              else{
                $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
              }
            }else
            {
              if(cc == rq) {

                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
              }
        
              else if(cc < rq) {

                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"1"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
              }

              else if(cc == midterm) {
                  
                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0","md":"0"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
               
              }

                
              else if(cc < midterm) {
                if($("#promissory_note"). prop("checked") == true) {
                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"1","md":"1"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
                 }
                 else {
                    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $('#failedmsg').html("Need Promisorry");
                 }
              }

              else if(cc == am) {
                
                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0","fd":"0"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
              }

              else if(cc < am) {
                if($("#promissory_note"). prop("checked") == true) {

                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"1","fd":"1"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
                 }
                 else {
                    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $('#failedmsg').html("Need Promisorry");
                 }
              }

              else if(cc < cash) {
                if($("#promissory_note"). prop("checked") == true) {
                 $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"1","md":"1"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
                 }
                 else {
                    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $('#failedmsg').html("Please Input Exact Amount Payment");
                 }
              }

              else {
                
              $.ajax({  
                     url:"student_balance.php",  
                     method:"POST",  
                     data:{"addpayment":1,query:query,or:or,cash:cash,bal:bal,status:status,cashier:cashier,sy:sy,sem:sem,ac:ac,am:am,lname:lname,fname:fname,mname:mname,dscpt:dscpt,midterm:midterm,scholar:scholar,"promi":"0"},
                     success:function(data1)  
                     {  
                        
                       if(data1 == '0')
                       {
                        $('#success').modal('show');

                       }
                       else
                       {
                        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                        $('#failedmsg').html("Official Receipt Exist");
                       }

                     }  
                  });
               }     

}
                     }  
                  });

        
              //alert(am);
              
            
            }
        });


    
$(document).on('click', '#savedone', function(){
$('#success').modal('hide');
window.location.href='./';
});




</script>