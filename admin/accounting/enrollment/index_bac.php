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

<div class="card shadow-sm mb-4"> <!-- card start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Enrollment</h6>

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


 <div class="container m-0" id="subject">
  <br>
  <div class="row">
    <br>
    <div class="col-sm">


      
    </div>

  </div>

  <br>
 </div>



</div> <!-- card end -->


        </div>
        <!-- /.container-fluid -->
   


      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
     



    </div>
    <!-- End of Content Wrapper -->



<!-- Add Transaction Modal -->
<?php require 'en_modal.php'; ?> 



  </div>
  <!-- End of Page Wrapper -->




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

// fetch();
// function fetch()
// {
//   $.ajax({
//       url:"enrollment.php",
//       method: "POST",
//       data:{"retrieve":1},
//       success:function(data){
//         $('#fetchtuitionfees').html(data);
//       }
//     });
// }


  // Student Search Textbox
      $('#searchstud').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"enrollment.php",  
                     method:"POST",  
                     data:{"autosearch":1,query:query, schoolyr:"<?php echo $result_data['school_year']; ?>", semester:"<?php echo $result_data['semester']; ?>"},  
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
           var query1 = $(this).text();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"enrollment.php",  
                     method:"POST",  
                     data:{"getstuddata":1,query:query},  
                     success:function(data)  
                     {  
                          $('#studdata').fadeIn();  
                          $('#studdata').html(data);  
                     }  
                });

                 $.ajax({  
                     url:"enrollment.php",  
                     method:"POST",  
                     data:{"getsubject":1,query:query},  
                     success:function(data)  
                     {  
                          $('#subject').fadeIn();  
                          $('#subject').html(data);
                     }  
                });
                 
           } 
           $('#transaction_div').show();
          $('#studdata').html('<div class="row"><div class="col-sm">Name:</div> ');  
      });
 });

 $(document).ready(function(){  

  var totmarks=0;
  $(this).find('#totalunits').val();

  $('tr').each(function(){
    
    $(this).find('.un1').each(function(){
      var marks=$(this).text();
      if(marks.length!==0)
      {
        totmarks+=parseFloat(marks);
      }
    });
      $(this).find('#totalunits').html(totmarks);
      
  });

  });




</script>