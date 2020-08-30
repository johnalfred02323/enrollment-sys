<!-- Head -->
<?php require '../../src/layout/admission/head.php'; 
 require '../../config/config.php'; 
$sisnum = $_GET['sisnum'];

?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>


<link rel="stylesheet" type="text/css" href="../../src/table/css/responsive.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="../../src/table/css/fixedHeader.dataTables.css">

  <title>GRC System | Admission</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Side Nav -->
    <?php require '../../src/layout/admission/side-nav.php'; ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/admission/top-nav.php'; ?>


       <!-- Begin Page Content -->
        <div class="container-fluid">


<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item "><a href="index.php"> Dashboard </a></li>
    <li class="breadcrumb-item ">Student Information</li>
    <li class="breadcrumb-item active" aria-current="page">Evaluation of Scores</li>
  </ol>
</nav>



<div class="card shadow-sm mb-4">
  <div class="card-header py-3">
    <h6 class="m-0">Evaluation Of Scores</h6>
  </div>
  <div class="card-body">

<div class="row">
  <div class="col-lg-5">
    <div class="form-group">
      <small class="readonly">Lastname</small>
      <input type="text" class="form-control" id="lname" size="18" value="" readonly>
    </div>    
  </div>
  <div class="col-lg-5">
    <div class="form-group">
      <small class="readonly">Firstname</small>
      <input type="text" class="form-control" id="fname" size="18" value="" readonly>
    </div>    
  </div>  
  <div class="col-lg-2">
    <div class="form-group">
      <small class="readonly">S.I.S</small>
      <input type="text" class="form-control" id="sisnum" size="18" value="<?php echo $sisnum; ?>" readonly>
    </div>    
  </div>
</div>


<div class="row mt-3">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-6">

          <div class="form-group">
            <small class="readonly">English</small>
            <input type="number" class="form-control text-center" id="engscore" maxlength="2" min="0" max="20" size="18" placeholder="Input Score" value="">
          </div>

            
          </div>
          <div class="col-6">

          <div class="form-group">
            <small class="readonly">Average</small>
            <input type="text" class="form-control text-center" id="engave" size="18" placeholder="N/A" value="" readonly>
          </div>

            
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-6">

            <div class="form-group">
              <small class="readonly">Mathematics</small>
              <input type="number" class="form-control text-center" id="mathscore" size="18" placeholder="Input Score" value="">
            </div>

            
          </div>
          <div class="col-6">

          <div class="form-group">
            <small class="readonly">Average</small>
            <input type="text" class="form-control text-center" id="mathave" size="18" placeholder="N/A" value="" readonly>
          </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






<div class="row mt-5">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-6">
        <div class="row">
          <div class="col-6">

          <div class="form-group">
            <small class="readonly">Filipino</small>
            <input type="number" class="form-control text-center" id="filscore" size="18" placeholder="Input Score" value="">
          </div>

            
          </div>
          <div class="col-6">

          <div class="form-group">
            <small class="readonly">Average</small>
            <input type="text" class="form-control text-center" id="filave" size="18" placeholder="N/A" value="" readonly>
          </div>

            
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-6">

            <div class="form-group">
              <small class="readonly">Science</small>
              <input type="number" class="form-control text-center" id="sciscore" size="18" placeholder="Input Score" value="">
            </div>

            
          </div>
          <div class="col-6">

          <div class="form-group">
            <small class="readonly">Average</small>
            <input type="text" class="form-control text-center" id="sciave" size="18" placeholder="N/A" value="" readonly>
          </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="row d-flex justify-content-end mt-3">
      <div class="col-3">
        <div class="form-group">
          <small class="readonly">Total :</small>
          <input type="text" class="form-control text-center" id="totalave" size="18" placeholder="N/A" value="" readonly>
        </div>
      </div>
    </div>

  </div>
</div>






<div class="card shadow-sm mb-4">
  <div class="card-header">
    Available Courses
  </div>
  <div class="card-body">

<div class="row mb-3">
  <div class="col-lg-6">
      <div class="box1">
        <label class="select-label">Course</label>
        <select name='' id="course" required>
          <option id="cc" hidden>Choose Course</option>
            <?php 
              $query = "SELECT DISTINCT course_abbreviation FROM course";
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
  </div>
  <div class="col-lg-6">
      <div class="box1">
        <label class="select-label">Major</label>
        <select name='' id="major" required>
        </select>
      </div>   
  </div>
</div>

  </div>
</div>


<div class="d-flex justify-content-end">
  <button type="button" id="proceed" class="add-user pull-xs-right mb-5 mt-3" ripple onclick="reset()"> Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
</div>




        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

        <div class="alert-box success">
          <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        <div class="alert-box failed">
          <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

<!-- Footer -->
<?php require '../../src/layout/footer.php'; ?>


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

  <script type="text/javascript">

      $('#course option[value="BSIT"]').hide();
      $('#course option[value="BSEd"]').hide();
      $('#course option[value="BEEd"]').hide();
      $('#course option[value="BSA"]').hide();
      $('#course option[value="BSE"]').hide();
      $('#course option[value="BSBA"]').hide();
      $('#course option[value="BSEntrep"]').hide();
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();

    var sisnum = '<?php echo $sisnum;?>';
     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"displayfullname":1,sisnum:sisnum},
      success:function(data){
        var result = $.parseJSON(data);
        $('#lname').val(result.lname);
        $('#fname').val(result.fname);
        if(result.totscore == '')
        {

        }
        else
        {
            if(result.course == '')
            {
            }
            else
            {
                $('#course').val(result.course);
                $('#major').val(result.major);
            }
            $('#engscore').val(result.engscore);
            $('#engave').val(result.engave);
            $('#mathscore').val(result.mathscore);
            $('#mathave').val(result.mathave);
            $('#filscore').val(result.filscore);
            $('#filave').val(result.filave);
            $('#sciscore').val(result.sciscore);
            $('#sciave').val(result.sciave);
            $('#totalave').val(result.totscore);
            course();
        }

      }
    });

    //for major
    $(document).on( 'change','#course', function (e) {
     var course = $(this).val();
     $.ajax({
          url:"process.php",
          type:"POST",
          data:{"getmajor":1,course:course},
          success:function(data){
            if(data == 0)
            {
                $('#major').html('<option value="">Choose Major</option>'); 
            }
              else
              {
                $('#major').html(data); 
              }
          }
          });
    });

    $('#engscore').keyup(function(){  
           var english_score = $(this).val();

           if(english_score > 20 || english_score < 0)
           {
              var engscore = english_score.slice(0,-1);
              $(this).val(engscore);
              if(english_score < 0)
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be Less than 0');
                  english_score = 0;
              }
              else
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be greater than 20');
                  english_score = engscore;
              }
           }
           else
           {

           }  

           var english_percentage = ((Number(english_score)/20)*50)+50;
           var filipino_percentage = $('#filave').val();  
           var math_percentage = $('#mathave').val();  
           var science_percentage = $('#sciave').val();
           var total_score = ((Number(english_percentage)+Number(filipino_percentage)+Number(math_percentage)+Number(science_percentage))/4);
                      
                      $('#totalave').val(total_score);
                      $('#engave').val(english_percentage);
                      course();
                    });

    $('#filscore').keyup(function(){  
          var filipino_score = $(this).val();  
           if(filipino_score > 20 || filipino_score < 0)
           {
              var filscore = filipino_score.slice(0,-1);
              $(this).val(filscore);
              if(filipino_score < 0)
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be Less than 0');
                  filipino_score = 0;
              }
              else
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be greater than 20');
                  filipino_score = filscore;
              }
           }
           else
           {

           }  
           var filipino_percentage = ((Number(filipino_score)/20)*50)+50;
           var english_percentage = $('#engave').val();  
           var math_percentage = $('#mathave').val();  
           var science_percentage = $('#sciave').val();
           var total_score = ((Number(english_percentage)+Number(filipino_percentage)+Number(math_percentage)+Number(science_percentage))/4);
            $('#totalave').val(total_score);
           $('#filave').val(filipino_percentage);
                      course();
         });

    $('#mathscore').keyup(function(){  
           var math_score = $(this).val(); 
           if(math_score > 20 || math_score < 0)
           {
              var mathscore = math_score.slice(0,-1);
              $(this).val(mathscore);
              if(math_score < 0)
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be Less than 0');
                  math_score = 0;
              }
              else
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be greater than 20');
                  math_score = mathscore;
              }
           }
           else
           {

           }   
           var math_percentage = ((Number(math_score)/20)*50)+50;
           var filipino_percentage = $('#filave').val();  
           var english_percentage = $('#engave').val();  
           var science_percentage = $('#sciave').val();
           var total_score = ((Number(english_percentage)+Number(filipino_percentage)+Number(math_percentage)+Number(science_percentage))/4);
                       $('#totalave').val(total_score);
           $('#mathave').val(math_percentage);
                      course();
         });

    $('#sciscore').keyup(function(){  
           var science_score = $(this).val(); 
           if(science_score > 20 || science_score < 0)
           {
              var sciscore = science_score.slice(0,-1);
              $(this).val(sciscore);
              if(science_score < 0)
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be Less than 0');
                  science_score = 0;
              }
              else
              {
                  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#failedmsg").html('Score must not be greater than 20');
                  science_score = sciscore;
              }
           }
           else
           {

           }    
           var science_percentage = ((Number(science_score)/20)*50)+50;
           var filipino_percentage = $('#filave').val();  
           var math_percentage = $('#mathave').val();  
           var english_percentage = $('#engave').val();
           var total_score = ((Number(english_percentage)+Number(filipino_percentage)+Number(math_percentage)+Number(science_percentage))/4);
                       $('#totalave').val(total_score);
           $('#sciave').val(science_percentage);
                      course();
         });

function course() {

  if($('#filscore').val() == '' || $('#engscore').val() == '' || $('#mathscore').val() == '' || $('#sciscore').val() == '')
  {

  }
  else
  {
      var $myText = $("#totalave");
      $myText.data("value", $myText.val());
      setInterval(function() {
      $('#course option[value="BSIT"]').show();
      $('#course option[value="BSEd"]').show();
      $('#course option[value="BEED"]').show();
      $('#course option[value="BSA"]').show();
      $('#course option[value="BSBA"]').show();
      $('#course option[value="BSEntrep"]').show();
      if($("#totalave").val() < 80)
      {
        $('#course option[value="BSA"]').hide();
      }
      else
      {
        $('#course option[value="BSA"]').show();
      }
    }, 100);
    }
}

  $('#course').change(function(){
    var val = $(this).val();
    var math = $('#mathave').val();
    var english = $('#engave').val();
    if(val == 'BSIT'){
      $('#major').val($('#cm').text());
      $('#prog').show();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BSBA'){
      $('#major').val($('#cm').text());
      $('#prog').hide();
      $('#hr').show();
      $('#mm').show();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BSA'){
      $('#major').val($('#cm').text());
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').show();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BSEd'){
      $('#major').val($('#cm').text());
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').show();
      $('#math').show();
      $('#pe').show();
      $('#ge').hide();
      if (math < 85){
        $('#math').hide();
      }
      if (english < 85){
        $('#eng').hide();
      }
    }
    else if(val == 'BSEntrep'){
      $('#major').val($('#cm').text());
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').show();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
    else if(val == 'BEED'){
      $('#major').val($('#cm').text());
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').show();
    }
    else{
      $('#major').val($('#cm').text());
      $('#prog').hide();
      $('#hr').hide();
      $('#mm').hide();
      $('#entrep').hide();
      $('#acc').hide();
      $('#eng').hide();
      $('#math').hide();
      $('#pe').hide();
      $('#ge').hide();
    }
  });

  $(document).on( 'click', '#proceed', function (e) {
    var sisnum = '<?php echo $sisnum;?>';
    var english = $('#engscore').val();
    var filipino = $('#filscore').val();
    var math = $('#mathscore').val();
    var science = $('#sciscore').val();
    var total = $('#totalave').val();
    var course = $('#course').val();
    var major = $('#major').val();

    if(english == '' || filipino == '' || math == '' || science == '' || course == 'Choose Course' || major == 'Choose Major')
    {
          $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
          $("#failedmsg").html('All field must have value before proceeding.');
    }
    else
    {
        $.ajax({
          url:"admission-process.php",
          method:"POST",
          data:{"scores":1,sisnum:sisnum,english:english,filipino:filipino,math:math,science:science,total:total,course:course,major:major},
          success:function(data){
            window.location.href = data+'?sisnum='+sisnum;
          }
        });
    }
});

  </script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>


</body>

</html>
