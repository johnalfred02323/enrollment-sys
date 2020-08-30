<?php require '../src/layout/head.php'; require ('../../config/config.php'); ?>
  <!-- jquery -->
  <script src="../vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Table CSS -->
<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

</head>
<body class="sb-nav-fixed">   
<?php require '../src/layout/top-nav.php'; ?>
<div id="layoutSidenav">
<?php require 'side-bar.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <nav aria-label="breadcrumb" style="margin-top: 25px;">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Schedule</li>
                  </ol>
                </nav>


<div class="card shadow-sm mb-4">
  <div class="card-body p-2">
    <div class="row d-flex align-items-start">
      <div class="col-lg-2">
        <h4 class="ml-3 mt-1">Filter :</h4>
      </div>
      <div class="col-lg-3">
        <select class="form-control border-0" id="course">
         <option value="Choose Course" hidden>Choose Course</option>
        <option value="ALL">ALL</option>
        <?php 
           $query = "SELECT DISTINCT course_abbreviation, course_name FROM course WHERE status = 'Active'";
           $result = mysqli_query($conn, $query); 
            if($count=mysqli_num_rows($result) > 0)  
            {
            while($rows=mysqli_fetch_array($result))
            {
              echo "<option value=".$rows['course_abbreviation'].">".$rows['course_abbreviation']."</option>";
            }
            }
            ?>
        </select>       
      </div>
      <div class="col-lg-3">
        <select class="form-control border-0" id="major">
        <option value="Choose Major" hidden>Choose Major</option>
        </select>         
      </div>
      <div class="col-lg-3">
        <select class="form-control border-0" id="year">
          <option selected disabled hidden>Choose Year Level</option>
          <option id="first">First Year</option>
          <option id="second">Second Year</option>
          <option id="third">Third Year</option>
          <option id="fourth">Fourth Year</option>
          <option id="fifth">Fifth Year</option>
        </select>       
      </div>
      <div class="col-lg-1">
        <button class="btn btn-info" data-toggle="modal" data-target="#search-modal"><i class="fas fa-search"></i></button>
      </div>    
    </div>
  </div>
</div>

<div class="card shadow-sm mt-5">
  <div class="card-header">
    <h5>Schedule</h5>
  </div>
  <div class="card-body">

      <table id="sched_table" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Section</th>
                <th>Course</th>
                <th>Major</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
      </table> 

  </div>
</div>


<!-- Petition Table -->

<div class="card shadow-sm mt-5">
  <div class="card-header">
    <h5>Petition Schedule</h5>
  </div>
  <div class="card-body">

      <table id="petitiontable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Title</th>
                <th>Units</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="petitionsubject">
        </tbody>
      </table> 

  </div>
</div>

            </div>
        </main>
<?php require '../src/layout/footer.php'; ?>
    </div>
</div>
    <script src="../src/js/scripts.js"></script>
    <script src="../src/js/dark-mode-switch.min.js"></script>
    <script src="../src/js/go-to-top.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script src="../../src/vendor/table/js/jquery-3.3.1.min.js"></script>
    <script src="../../src/vendor/table/js/jquery.dataTables.min.js"></script>
    <script src="../../src/vendor/table/js/dataTables.responsive.min.js"></script>
    <?php include 'view-schedule.php'; ?>


  <script type="text/javascript">

  $(document).ready(function() {
    //for major
  $(document).on( 'change','#course', function (e) {
   var course = $(this).val();
   $.ajax({
        url:"process.php",
        type:"POST",
        data:{"major":1,course:course},
        success:function(data){
          if(data == 0)
          {
              $('#major').html('<option value="Choose Major">Choose Major</option>'); 
          }
            else
            {
              $('#major').html(data); 
            }
        }
        });
  });

      //for searching of subject for petition
      $.ajax({
      url:"process.php",
      method:"POST",
      data:{"schoolyear":1},
      success:function(data)
      {
          var result = $.parseJSON(data);
          var sy = result.schoolyear;
          var sem = result.semester;
          var course = $('#course').val();
          var major = $('#major').val();
          var year = $('#year').val();

          var table = $('#sched_table').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 0, 'asc' ]],

            "processing" : true,
            
            "serverSide" : true,
            
            "ajax" :{ 
              "url":"section_fetch.php", 
              "data":{ 
                "schoolyear":sy,
                "semester":sem,
                "course":course,
                "major":major,
                "year":year,
              }
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

          } );

         // petition table
          var table = $('#petitiontable').DataTable( {


            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 0, 'asc' ]],

            "processing" : true,
            
            "serverSide" : true,
            
            "ajax" :{ 
              "url":"petition_fetch.php", 
              "data":{ 
                "schoolyear":sy,
                "semester":sem,
              }
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

          } );


        }


      });


      $(document).on( 'change','#course', function (e) 
      {
          var course = $('#course').val();
          if(course == 'BSA' || course == 'ALL' || course == '')
          {
            $('#fifth').show();
          }
          else
          {
            $('#fifth').hide();
          }

          //for searching of subject for petition
          $.ajax({
          url:"process.php",
          method:"POST",
          data:{"schoolyear":1},
          success:function(data)
          {
              var result = $.parseJSON(data);
              var sy = result.schoolyear;
              var sem = result.semester;
              var course = $('#course').val();
              var major = $('#major').val();
              var year = $('#year').val();

              $('#sched_table').DataTable().destroy();
              var table = $('#sched_table').DataTable( {

                "pagingType": "full_numbers",

                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

                "pageLength": 10,

                "order": [[ 0, 'asc' ]],

                "processing" : true,
                
                "serverSide" : true,
                
                "ajax" :{ 
                  "url":"section_fetch.php", 
                  "data":{ 
                    "schoolyear":sy,
                    "semester":sem,
                    "course":course,
                    "major":major,
                    "year":year,
                  }
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

              } );

            }
          });
      });

      //major select
      $(document).on( 'change','#major', function (e) 
      {
          //for searching of subject for petition
          $.ajax({
          url:"process.php",
          method:"POST",
          data:{"schoolyear":1},
          success:function(data)
          {
              var result = $.parseJSON(data);
              var sy = result.schoolyear;
              var sem = result.semester;
              var course = $('#course').val();
              var major = $('#major').val();
              var year = $('#year').val();

              $('#sched_table').DataTable().destroy();
              var table = $('#sched_table').DataTable( {

                "pagingType": "full_numbers",

                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

                "pageLength": 10,

                "order": [[ 0, 'asc' ]],

                "processing" : true,
                
                "serverSide" : true,
                
                "ajax" :{ 
                  "url":"section_fetch.php", 
                  "data":{ 
                    "schoolyear":sy,
                    "semester":sem,
                    "course":course,
                    "major":major,
                    "year":year,
                  }
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

              } );

            }
          });
      });

      //year select
      $(document).on( 'change','#year', function (e) 
      {
          //for searching of subject for petition
          $.ajax({
          url:"process.php",
          method:"POST",
          data:{"schoolyear":1},
          success:function(data)
          {
              var result = $.parseJSON(data);
              var sy = result.schoolyear;
              var sem = result.semester;
              var course = $('#course').val();
              var major = $('#major').val();
              var year = $('#year').val();

              $('#sched_table').DataTable().destroy();
              var table = $('#sched_table').DataTable( {

                "pagingType": "full_numbers",

                "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

                "pageLength": 10,

                "order": [[ 0, 'asc' ]],

                "processing" : true,
                
                "serverSide" : true,
                
                "ajax" :{ 
                  "url":"section_fetch.php", 
                  "data":{ 
                    "schoolyear":sy,
                    "semester":sem,
                    "course":course,
                    "major":major,
                    "year":year,
                  }
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

              } );

            }
          });
      });


  });
  </script>    

</body>
</html>
