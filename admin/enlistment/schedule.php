<!-- Head -->
<?php require '../../src/layout/enlistment/head.php'; 
require '../../config/config.php'; 
$course = $_SESSION['course'];
$major = $_SESSION['major'];?>

<head>
<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>
        

  <title>GRC System | Enlistment</title>

</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/enlistment/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">



      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/enlistment/top-nav.php'; ?>



        <!-- Begin Page Content -->
        <div class="container-fluid" style="z-index: 0;">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <div class="breadcrumb-item"><a href="./">Home</a></div>
    <div class="breadcrumb-item" aria-current="page">Schedule ( <?php echo $course; ?> )</div>
  </ol>
</nav>


<div class="d-flex justify-content-end">
  <div class="row d-flex align-items-center">
   <div class="col-lg-4 col-md-4 col-xs-12 mb-sm-3 mb-3">
      <select list="courselist" value="" id="chosen-course" class="custom-select custom-select mr-3" placeholder="Course">
      <datalist id="courselist">
      <?php 
      $query = "SELECT DISTINCT course_abbreviation FROM course";
      $result = mysqli_query($conn, $query); 
      if($count=mysqli_num_rows($result) > 0)  
      {
        while($rows=mysqli_fetch_array($result))
        {
          echo "<option>".$rows['course_abbreviation']."</option>";
        }
      }
      ?>
      </datalist>
    </select>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-12 mb-sm-3 mb-3">
      <select value="" id="chosen-major" class="custom-select custom-select" placeholder="Major" >
    </select>
    </div>
    <div class="col-lg-4 col-md-4 mb-sm-3 mb-3">
      <button type="button" class="delete-user pull-xs-right edit btn-block" data-toggle="modal" data-target="#search-modal" ripple><i class="far fa-search"></i> Search </button>
    </div>
  </div>
</div>

      




<!-- Modal -->
<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-end">
        <div class="input-group mb-2 mt-3 col-xl-6">
          <input list="search-data" type="text" class="form-controls" placeholder="Search..." aria-label="Recipient's username" aria-describedby="basic-addon2" id="searchbox">
           <datalist id="search-data">
          </datalist>
          <div class="input-group-append">
            <button class="btn btn-danger search" type="button">Search</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col" nowrap>Section</th>
                <th scope="col" nowrap>Subject Code</th>
                <th scope="col" nowrap>Subject Title</th>
                <th scope="col" nowrap>Units</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>Day</th>
                <th scope="col" nowrap>Time</th>
                <th scope="col" nowrap>Room</th>
                <th scope="col" nowrap>No. of Student</th>
                <th scope="col" nowrap>Max. Student</th>
              </tr>
            </thead>
            <tbody id="search-schedule">
            </tbody>
          </table> 

        </div>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ripple><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>






    <div class="dropdown show d-inline">
 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

            


              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">First Year</h5>
                  <i class="fas fa-sync-alt"></i>
                </div>
                <div class="card-body">


<table class="table">
  <caption id="count1"></caption>
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="firstyear-section">
  </tbody>
</table>
                  

                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6">  <!-- Right column Start -->



            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Second Year</h5>
                  <i class="fas fa-sync-alt"></i>
                </div>
                <div class="card-body">


<table class="table">
  <caption id="count2"></caption>
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="secondyear-section">
  </tbody>
</table>
                  

                </div>
              </div>



            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->





<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>







 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

            


              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Third Year</h5>
                  <i class="fas fa-sync-alt"></i>
                </div>
                <div class="card-body">


<table class="table">
  <caption id="count3"></caption>
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="thirdyear-section">
  </tbody>
</table>
                  

                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6">  <!-- Right column Start -->



            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Fourth Year</h5>
                  <i class="fas fa-sync-alt"></i>
                </div>
                <div class="card-body">


<table class="table">
  <caption id="count4"></caption>
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="fourthyear-section">
  </tbody>
</table>
                  

                </div>
              </div>



            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->






<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>







 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6" id="fifthyr-section"> <!-- left column Start -->

            


              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Fifth Year</h5>
                  <i class="fas fa-sync-alt"></i>
                </div>
                <div class="card-body">


<table class="table">
  <caption id="count5"></caption>
  <thead>
    <tr class="table-borderless">
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="fifthyear-section">
  </tbody>
</table>
                  

                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6">  <!-- Right column Start -->



            
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h5 class="m-0">Petition</h5>
                  <i class="fas fa-sync-alt"></i>
                </div>
                <div class="card-body">


<table class="table">
  <caption id="countpet"></caption>
  <thead>
    <tr class="table-borderless">
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="petition-section">
  </tbody>
</table>
                  

                </div>
              </div>



            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->




<?php include 'search-schedule.php'; ?>
<?php include 'view-schedule.php'; ?>


<!-- SPACER -->
<div class="mx-auto" style="height: 50px;"></div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php require '../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button -->
  <?php require '../../src/layout/go-to-top.php'; ?>


  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){  
      var course = '<?php echo $course; ?>';
      var major = '<?php echo $major; ?>';
 //for major
 $.ajax({
        url:"process.php",
        type:"POST",
        data:{"major":1,course:course},
        success:function(data){
          if(data == 0)
          {
              $('#chosen-major').html('<option value="Choose Major">Choose Major</option>'); 
              $('#chosen-course').val(course); 
          }
            else
            {
              $('#chosen-major').html(data); 
              $('#chosen-major').val(major); 
              $('#chosen-course').val(course); 
            }
        }
        });
  //for year display  
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"year":1,course:course},
      success:function(data){
         if(data == 0)
        {
           $('#fifthyr-section').hide(); 
        }
        else
        {
           $('#fifthyr-section').show();
        }
      }
      });  


    function section(){
    var firstyear = 'First Year';
    var secondyear = 'Second Year';
    var thirdyear = 'Third Year';
    var fourthyear = 'Fourth Year';
    var fifthyear = 'Fifth Year';
    var petition = 'Petition';

    //for firstyear year section
    $.ajax({  
    url:"schedule-process.php",  
    method:"post",  
    data:{"viewschedule-1styr":1,firstyear:firstyear,course:course,major:major},  
    success:function(data)
    {   
      $('#firstyear-section').html(data);
      var table = document.getElementById("firstyear-section");
      var totalrowcount = table.rows.length;
      $('#count1').text('Total of Section: '+totalrowcount);
    }
    });
    //for secondyear year section
    $.ajax({  
    url:"schedule-process.php",  
    method:"post",  
    data:{"viewschedule-2ndyr":1,secondyear:secondyear,course:course,major:major},  
    success:function(data)
    {   
      $('#secondyear-section').html(data);
      var table = document.getElementById("secondyear-section");
      var totalrowcount = table.rows.length;
      $('#count2').text('Total of Section: '+totalrowcount);
    }
    });
    //for thirdyear year section
    $.ajax({  
    url:"schedule-process.php",  
    method:"post",  
    data:{"viewschedule-3rdyr":1,thirdyear:thirdyear,course:course,major:major},  
    success:function(data)
    {   
      $('#thirdyear-section').html(data);
      var table = document.getElementById("thirdyear-section");
      var totalrowcount = table.rows.length;
      $('#count3').text('Total of Section: '+totalrowcount);
    }
    });
    //for fourthyear year section
    $.ajax({  
    url:"schedule-process.php",  
    method:"post",  
    data:{"viewschedule-4thyr":1,fourthyear:fourthyear,course:course,major:major},  
    success:function(data)
    {   
      $('#fourthyear-section').html(data);
      var table = document.getElementById("fourthyear-section");
      var totalrowcount = table.rows.length;
      $('#count4').text('Total of Section: '+totalrowcount);
    }
    });
    //for fifthyear year section
    $.ajax({  
    url:"schedule-process.php",  
    method:"post",  
    data:{"viewschedule-5thyr":1,fifthyear:fifthyear,course:course,major:major},  
    success:function(data)
    {   
      $('#fifthyear-section').html(data);
      var table = document.getElementById("fifthyear-section");
      var totalrowcount = table.rows.length;
      $('#count5').text('Total of Section: '+totalrowcount);
    }
    });
    //for fourth year section
    $.ajax({  
    url:"schedule-process.php",  
    method:"post",  
    data:{"viewschedule-petition":1,petition:petition},  
    success:function(data)
    {   
      $('#petition-section').html(data);
      var table = document.getElementById("petition-section");
      var totalrowcount = table.rows.length;
      $('#countpet').text('Total of Subject: '+totalrowcount);
    }
    });
  }
  section();



          //for filtering of major
          $(document).on( 'change','#chosen-course', function (e) {
            var course = $(this).val();
            //for year display  
           $.ajax({
                url:"process.php",
                type:"POST",
                data:{"year":1,course:course},
                success:function(data){
                   if(data == 0)
                  {
                     $('#fifthyr-section').hide(); 
                  }
                  else
                  {
                     $('#fifthyr-section').show();
                  }
                }
                });  
                 //for major
                 $.ajax({
                        url:"process.php",
                        type:"POST",
                        data:{"major":1,course:course},
                        success:function(data){
                          if(data == 0)
                          {
                              $('#chosen-major').html('<option value="Choose Major">Choose Major</option>'); 
                              $('#chosen-course').val(course); 
                          }
                            else
                            {
                              $('#chosen-major').html(data); 
                              $('#chosen-course').val(course); 
                              var major = $('#chosen-major').val();
                            }
                            
            var firstyear = 'First Year';
            var secondyear = 'Second Year';
            var thirdyear = 'Third Year';
            var fourthyear = 'Fourth Year';
            var fifthyear = 'Fifth Year';
            var petition = 'Petition';

            //for firstyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-1styr":1,firstyear:firstyear,course:course,major:major},  
            success:function(data)
            {   
              $('#firstyear-section').html(data);
              var table = document.getElementById("firstyear-section");
              var totalrowcount = table.rows.length;
              $('#count1').text('Total of Section: '+totalrowcount);
            }
            });
            //for secondyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-2ndyr":1,secondyear:secondyear,course:course,major:major},  
            success:function(data)
            {   
              $('#secondyear-section').html(data);
              var table = document.getElementById("secondyear-section");
              var totalrowcount = table.rows.length;
              $('#count2').text('Total of Section: '+totalrowcount);
            }
            });
            //for thirdyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-3rdyr":1,thirdyear:thirdyear,course:course,major:major},  
            success:function(data)
            {   
              $('#thirdyear-section').html(data);
              var table = document.getElementById("thirdyear-section");
              var totalrowcount = table.rows.length;
              $('#count3').text('Total of Section: '+totalrowcount);
            }
            });
            //for fourthyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-4thyr":1,fourthyear:fourthyear,course:course,major:major},  
            success:function(data)
            {   
              $('#fourthyear-section').html(data);
              var table = document.getElementById("fourthyear-section");
              var totalrowcount = table.rows.length;
              $('#count4').text('Total of Section: '+totalrowcount);
            }
            });
            //for fifthyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-5thyr":1,fifthyear:fifthyear,course:course,major:major},  
            success:function(data)
            {   
              $('#fifthyear-section').html(data);
              var table = document.getElementById("fifthyear-section");
              var totalrowcount = table.rows.length;
              $('#count5').text('Total of Section: '+totalrowcount);
            }
            });
            //for fourth year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-petition":1,petition:petition},  
            success:function(data)
            {   
              $('#petition-section').html(data);
              var table = document.getElementById("petition-section");
              var totalrowcount = table.rows.length;
              $('#countpet').text('Total of Subject: '+totalrowcount);
            }
            });
                        }
                        });


        });


        $(document).on('change', '#chosen-major', function(){
            var major = $(this).val();
            var course = $('#chosen-course').val();

            var firstyear = 'First Year';
            var secondyear = 'Second Year';
            var thirdyear = 'Third Year';
            var fourthyear = 'Fourth Year';
            var fifthyear = 'Fifth Year';
            var petition = 'Petition';

            //for firstyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-1styr":1,firstyear:firstyear,course:course,major:major},  
            success:function(data)
            {   
              $('#firstyear-section').html(data);
              var table = document.getElementById("firstyear-section");
              var totalrowcount = table.rows.length;
              $('#count1').text('Total of Section: '+totalrowcount);
            }
            });
            //for secondyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-2ndyr":1,secondyear:secondyear,course:course,major:major},  
            success:function(data)
            {   
              $('#secondyear-section').html(data);
              var table = document.getElementById("secondyear-section");
              var totalrowcount = table.rows.length;
              $('#count2').text('Total of Section: '+totalrowcount);
            }
            });
            //for thirdyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-3rdyr":1,thirdyear:thirdyear,course:course,major:major},  
            success:function(data)
            {   
              $('#thirdyear-section').html(data);
              var table = document.getElementById("thirdyear-section");
              var totalrowcount = table.rows.length;
              $('#count3').text('Total of Section: '+totalrowcount);
            }
            });
            //for fourthyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-4thyr":1,fourthyear:fourthyear,course:course,major:major},  
            success:function(data)
            {   
              $('#fourthyear-section').html(data);
              var table = document.getElementById("fourthyear-section");
              var totalrowcount = table.rows.length;
              $('#count4').text('Total of Section: '+totalrowcount);
            }
            });
            //for fifthyear year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-5thyr":1,fifthyear:fifthyear,course:course,major:major},  
            success:function(data)
            {   
              $('#fifthyear-section').html(data);
              var table = document.getElementById("fifthyear-section");
              var totalrowcount = table.rows.length;
              $('#count5').text('Total of Section: '+totalrowcount);
            }
            });
            //for Petition year section
            $.ajax({  
            url:"schedule-process.php",  
            method:"post",  
            data:{"viewschedule-petition":1,petition:petition},  
            success:function(data)
            {   
              $('#petition-section').html(data);
              var table = document.getElementById("petition-section");
              var totalrowcount = table.rows.length;
              $('#countpet').text('Total of Subject: '+totalrowcount);
            }
            });
        });  




  });
  </script>


</body>

</html>
