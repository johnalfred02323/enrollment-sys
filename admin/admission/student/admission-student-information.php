<!-- Head -->
<?php require 'layout/headstudent.php'; 
require '../../../config/config.php';
$sisnum = $_GET['sisnum'];
if($sisnum == 0)
{
  $label = 'Add Student';
}
else
{
  $label = 'Update Student'; 
  $check = mysqli_query($conn, "SELECT * FROM student_info WHERE sisnum  = '$sisnum'");
    if(mysqli_num_rows($check) > 0)
    {
      $row=mysqli_fetch_assoc($check);

     $fname = $row['firstname'];
     $lname = $row['lastname'];
     $mname = $row['middlename'];
     $stutype = $row['stu_type'];
     $stu_orientation = $row['stu_orientation'];
     $con_num = $row['con_num'];
     $gender = $row['gender'];
     $email = $row['email'];
     $bday = $row['bday'];
     $bplace = $row['bplace'];
     $address = $row['houseAddress'];
     $city = $row['city'];
     $prov = $row['province'];
     $nat = $row['nat'];
     $fat_name = $row['fat_name'];
     $fat_occ = $row['fat_occ'];
     $fat_con_num = $row['fat_con_num'];
     $mat_name = $row['mat_name'];
     $mat_occ = $row['mat_occ'];
     $mat_con_num = $row['mat_con_num'];
     $p_school_name = $row['p_school_name'];
     $p_school_year = $row['p_school_grad'];
     $s_school_name = $row['s_school_name'];
     $s_school_year = $row['s_school_grad'];
     $s_school_strand = $row['s_school_strand'];
     $t_school_name = $row['t_school_name'];
     $t_school_year = $row['t_school_grad'];
     $t_school_course = $row['t_school_course'];
    }
    else
    {
      $sisnum = 0;
      $label = 'Add Student';
    }
}
?>

<script src="../../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

  <title>GRC System | Student Information Sheet</title>

</head>
  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <!-- Side Nav -->
    <?php require 'layout/side-nav.php'; ?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        <!-- Top Nav -->
        <?php require 'layout/top-nav.php'; ?>
          <!-- Begin Page Content -->
          <div class="container-fluid">


            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $label; ?></li>
              </ol>
            </nav>


            <div class="card shadow-sm mt-lg-5 mb-4"> <!-- card start -->

              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center">

                <h5 class="m-0">Student Information Sheet</h5>

              </div>

              <div class="card-body">

                <form id = "stu-form">
 
                <big style="color: red"><b>Student Information</b></big><hr>
                <div class="row">

              <div class="col-lg-3">
                <div id="stu-lname" class="form-group">
                  <input id="lname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="lastname" class="float-label" style="font-family:Arial, FontAwesome">Last Name</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-fname" class="form-group">
                  <input id="fname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-mname" class="form-group">
                  <input id="mname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="middlename" class="float-label" style="font-family:Arial, FontAwesome">Middle Name</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-suffix" class="form-group">
                  <input id="suffix" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="suffix" class="float-label" style="font-family:Arial, FontAwesome">Suffix</label>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-lg-3">
                <div id="stu-email" class="form-group">
                  <input id="email" spellcheck=false class="form-control" type="text" size="18" alt="login" required>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="email" class="float-label" style="font-family:Arial, FontAwesome">E-mail Address</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-bplace" class="form-group">
                  <input id="bdayplace" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                  <label for="birthplace" class="float-label" style="font-family:Arial, FontAwesome">Birth Place</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-connum" class="form-group">
                  <input id="connum" spellcheck=false class="form-control" type="text" size="18" alt="login" required>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="contact" class="float-label" style="font-family:Arial, FontAwesome">Contact Number</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-nat" class="form-group">
                  <input id="nationality" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" value="Filipino">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="nationality" class="float-label" style="font-family:Arial, FontAwesome">Nationality</label>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-lg-3">
                <div class="box1 mt-3">
                  <label class="select-label">Student Type</label>
                    <select name='' id="stu-type" required>
                      <option hidden>Student Type</option>
                      <option value="Full">Full Scholar</option>
                      <option value="Partial">Partial Scholar</option>
                      <option value="40">40% Scholar</option>
                      <option value="20">20% Scholar</option>
                    </select>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="box1 mt-3">
                  <label class="select-label">Student Orientation</label>
                    <select name='' id="stu_orientation" required>
                      <option hidden>Student Orientation</option>
                      <option value="Freshman">Freshman</option>
                      <option value="Transferee">Transferee</option>
                      <option value="Cross-Enrollee">Cross-Enrollee</option>
                    </select>
                </div>
              </div>

              <div class="col-lg-3">
                <div class="box1 mt-3">
                  <label class="select-label">Gender</label>
                    <select name='' id="gender" required>
                      <option hidden>Choose Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                </div>    
              </div>

              <div class="col-lg-3">
                <div class="box1 mt-3">
                  <label class="select-label">Birthday</label>
                      <input type="date" id="bday">
                </div>    
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-lg-3">
                <div id="stu-address" class="form-group">
                  <input id="address" spellcheck=false class="form-control" type="text" size="18" alt="login" required>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="address" class="float-label" style="font-family:Arial, FontAwesome">Permanent Address</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-city" class="form-group">
                  <input id="city" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                  <label for="city" class="float-label" style="font-family:Arial, FontAwesome">City</label>
                </div>
              </div>

              <div class="col-lg-3">
                <div id="stu-prov" class="form-group">
                  <input id="prov" spellcheck=false class="form-control" type="text" size="18" alt="login" required>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="prov" class="float-label" style="font-family:Arial, FontAwesome">Province</label>
                </div>
              </div>
            </div>
<!--                 <div id="stu-bday" class="form-group">
                  <input id="bday" spellcheck=false class="form-control" type="text" size="18" alt="login" required>
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="email" class="float-label" style="font-family:Arial, FontAwesome">Birthday</label>
                </div> -->

            <br><br><big style="color: red"><b>Parent/Guardian Information</b></big><hr>

            <div class="row">

              <div class="col-lg-4">
                <div id="stu-fatname" class="form-group">
                  <input id="fatname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="fathername" class="float-label" style="font-family:Arial, FontAwesome">Father's Name</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div id="stu-fatocc" class="form-group">
                  <input id="fatocc" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="fatheroccupation" class="float-label" style="font-family:Arial, FontAwesome">Father's Occupation</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div id="stu-fatconnum" class="form-group">
                  <input id="fatconnum" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="fathercontactnumber" class="float-label" style="font-family:Arial, FontAwesome">Father's Contact Number</label>
                </div>
              </div>
            </div>
            
            <div class="row">

              <div class="col-lg-4">
                <div id="stu-matname" class="form-group">
                  <input id="matname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                    <label for="mothername" class="float-label" style="font-family:Arial, FontAwesome">Mother's name</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div id="stu-matocc" class="form-group">
                  <input id="matocc" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                  <span class="form-highlight"></span>
                  <span class="form-bar"></span>
                    <label for="motheroccupation" class="float-label" style="font-family:Arial, FontAwesome">Mother's Occupation</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div id="stu-matconnum" class="form-group">
                  <input id="matconnum" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="motherconnum" class="float-label" style="font-family:Arial, FontAwesome">Mother's Contact number</label>
                </div>
              </div>
            </div>

            <br><br><big style="color: red"><b>School Information</b></big><hr>
            <div class="row">
              <div class="col-lg-6">
                <div id="stu-p-school-name" class="form-group">
                  <input id="prischname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="prischname" class="float-label" style="font-family:Arial, FontAwesome">Primary School Name</label>
                </div>
              </div>

              <div class="col-lg-6">
                <div id="stu-p-school-year" class="form-group">
                  <input id="prischyear" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="prischyear" class="float-label" style="font-family:Arial, FontAwesome">Primary School year</label>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-lg-4">
                <div id="stu-s-school-name" class="form-group">
                  <input id="secschname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="secschname" class="float-label" style="font-family:Arial, FontAwesome">Secondary School Name</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div id="stu-s-school-year" class="form-group">
                  <input id="secschyear" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="secschyear" class="float-label" style="font-family:Arial, FontAwesome">Secondary School year</label>
                </div>
              </div>

              <div class="col-lg-4">
                  <label class="select-label">Senior High School Strand</label>
                       <select id="secschstrand" class="form-control"/>
                                    <option value="" disabled hidden selected>Choose Strand</option>
                                    <option value="DAT">Design And Arts Track</option>
                                    <option value="ST">Sports Track</option>
                                    <option value="IA">Industrial Arts Strand</option>
                                    <option value="AF">Agri-Fisheries Strand</option>
                                    <option value="ICT">Information and Communication Technology Strand</option>
                                    <option value="HE">Home Economic Strand</option>
                                    <option value="TVL">Technical-Vocational Livelihood Strand</option>
                                    <option value="GAS">General Academic Strand</option>
                                    <option value="HUMSS">Humanities and Social Sciences Strand</option>
                                    <option value="ABM">Accountancy, Business and Management Strand</option>
                                    <option value="STEM">Science, Technology, Engineering and Mathematics Strand</option>
                                    <select>
                    </select>
              </div>
            </div>

              <div class="row" id="tertiary">

              <div class="col-lg-4">
                <div id="stu-t-school-name" class="form-group">
                  <input id="terschname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="terschname" class="float-label" style="font-family:Arial, FontAwesome">Tertiary School Name</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div id="stu-t-school-year" class="form-group">
                  <input id="terschyear" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="terschyear" class="float-label" style="font-family:Arial, FontAwesome">Tertiary School year</label>
                </div>    
              </div>

              <div class="col-lg-4">
                <div id="stu-t-school-course" class="form-group">
                  <input id="terschcourse" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
                    <span class="form-highlight"></span>
                    <span class="form-bar"></span>
                      <label for="terschcourse" class="float-label" style="font-family:Arial, FontAwesome">Tertiary School Course</label>
                </div>
              </div>
            </div>

<div class="modal-footer">
        <button type="button" class="save" id="save_btn" ripple><i class="fas fa-save"></i> <b id="btnlbl">Save</b></button>
      </div>

              </form>


            </div> <!-- card end -->


        <div class="alert-box success">
          <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        <div class="alert-box failed">
          <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        </div>

        </div>
        <!-- End of Main Content -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

        <!-- Footer -->
        <?php require '../../../src/layout/footer.php'; ?>
<script type="text/javascript">
 var sisnum = '<?php echo $sisnum; ?>';
  if(sisnum != 0)
  {
    $('#fname').val('<?php echo $fname; ?>');
    $('#lname').val('<?php echo $lname; ?>');
    $('#mname').val('<?php echo $mname; ?>');
    $('#stu-type').val('<?php echo $stutype; ?>');
    $('#stu_orientation').val('<?php echo $stu_orientation; ?>');
    $('#connum').val('<?php echo $con_num; ?>');
    $('#gender').val('<?php echo $gender; ?>');
    $('#email').val('<?php echo $email; ?>');
    $('#bday').val('<?php echo $bday; ?>');
    $('#bdayplace').val('<?php echo $bplace; ?>');
    $('#nationality').val('<?php echo $nat; ?>');
    $('#address').val('<?php echo $address; ?>');
    $('#city').val('<?php echo $city; ?>');
    $('#prov').val('<?php echo $prov; ?>');
    $('#fatname').val('<?php echo $fat_name; ?>');
    $('#fatocc').val('<?php echo $fat_occ; ?>');
    $('#fatconnum').val('<?php echo $fat_con_num; ?>');
    $('#matname').val('<?php echo $mat_name; ?>');
    $('#matocc').val('<?php echo $mat_occ; ?>');
    $('#matconnum').val('<?php echo $mat_con_num; ?>');
    $('#prischname').val('<?php echo $p_school_name; ?>');
    $('#prischyear').val('<?php echo $p_school_year; ?>');
    $('#secschname').val('<?php echo $s_school_name; ?>');
    $('#secschyear').val('<?php echo $s_school_year; ?>');
    $('#secschstrand').val('<?php echo $s_school_strand; ?>');
    $('#terschname').val('<?php echo $t_school_name; ?>');
    $('#terschyear').val('<?php echo $t_school_year; ?>');
    $('#terschcourse').val('<?php echo $t_school_course; ?>');
    $('#btnlbl').text('UPDATE');
    if('<?php echo $stu_orientation; ?>' == 'Freshman')
    {
        $('#tertiary').hide();
    }
    else
    {
        $('#tertiary').show();
    }
  }
  else
  {
    $('#btnlbl').text('SAVE');

  }

 $(document).on('change','#stu_orientation', function(){   
    if($(this).val() == 'Freshman')
    {
        $('#tertiary').hide();
    }
    else
    {
        $('#tertiary').show();
    }
 });  

 $('#save_btn').click(function(){
  
    var fdiv = $('#stu-fname');
    var ldiv = $('#stu-lname');
    var mdiv = $('#stu-mname');
    var connumdiv = $('#stu-connum');
    var emaildiv = $('#stu-email');
    var bdaydiv = $('#stu-bday');
    var bplacediv = $('#stu-bplace');
    var natdiv = $('#stu-nat');
    var fatnamediv = $('#stu-fatname');
    var fatoccdiv = $('#stu-fatocc');
    var fatconnumdiv = $('#stu-fatconnum');
    var matnamediv = $('#stu-matname');
    var matoccdiv = $('#stu-matocc');
    var matconnumdiv = $('#stu-matconnum');
    var pschoolnamediv = $('#stu-p-school-name');
    var pschoolyeardiv = $('#stu-p-school-year');
    var sschoolnamediv = $('#stu-s-school-name');
    var sschoolyeardiv = $('#stu-s-school-year');
    var sschoolstranddiv = $('#stu-s-school-strand');
    var tschoolnamediv = $('#stu-t-school-name');
    var tschoolyeardiv = $('#stu-t-school-year');
    var tschoolcoursediv = $('#stu-t-school-course');

    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var mname = $('#mname').val();
    var suffix = $('#suffix').val();
    var stutype = $('#stu-type').val();
    var stu_orientation = $('#stu_orientation').val();
    var con_num = $('#connum').val();
    var gender = $('#gender').val();
    var email = $('#email').val();
    var bday = $('#bday').val();
    var bplace = $('#bdayplace').val();
    var houseadd = $('#address').val();
    var city = $('#city').val();
    var prov = $('#prov').val();
    var nat = $('#nationality').val();
    var fat_name = $('#fatname').val();
    var fat_occ = $('#fatocc').val();
    var fat_con_num = $('#fatconnum').val();
    var mat_name = $('#matname').val();
    var mat_occ = $('#matocc').val();
    var mat_con_num = $('#matconnum').val();
    var p_school_name = $('#prischname').val();
    var p_school_year = $('#prischyear').val();
    var s_school_name = $('#secschname').val();
    var s_school_year = $('#secschyear').val();
    var s_school_strand = $('#secschstrand').val();
    var t_school_name = $('#terschname').val();
    var t_school_year = $('#terschyear').val();
    var t_school_course = $('#terschcourse').val();

   if(fname == '' || lname == '' || con_num == '' || email == '' || houseadd == '' || city == '' || prov == '' || bday == '' || bplace == '' || nat == '' || fat_name == '' || fat_occ == '' || fat_con_num == '' || mat_name == '' || mat_occ == '' || mat_con_num == '' || p_school_name == '' || p_school_year == '' || s_school_name == '' || s_school_year == '' || s_school_strand == ''){
      if(fname == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('First name is required.');
      }
      else if(lname == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Last name is required.');
      }
      else if(con_num == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Contact Number is required.'); 
      }
      else if(email == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Email Address is required.');  
      }
      else if(bday == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Birthday is required.');  
      }
      else if(bplace == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Birthplace is required.');
      }
      else if(houseadd == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Permanent Address is required.'); 
      }
      else if(city == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('City is required.'); 
      }
      else if(prov == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Province is required.'); 
      }
      else if(nat == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Nationality is required.'); 
      }
      else if(p_school_name == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Primary school name is required.'); 
      }
      else if(p_school_year== ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Primary school year is required.');  
      }
      else if(s_school_name == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Secondary school name is required.');
      }
      else if(s_school_year == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Secondary school year is required.');
      }
      else if(s_school_strand == ''){
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('secondary school strand is required.');
      }
    }
    else
    {
      if($('#btnlbl').text() == 'SAVE')
      {
          $.ajax({
            url:'../admission-process.php',
            method:'POST',
            data:{"admissionaddstudentmodal":1,fname:fname,lname:lname,mname:mname,suffix:suffix,stutype:stutype,stu_orientation:stu_orientation,con_num:con_num,email:email,bday:bday,bplace:bplace,gender:gender,nat:nat,houseadd:houseadd,city:city,prov:prov,fat_name:fat_name,fat_occ:fat_occ,fat_con_num:fat_con_num,mat_name:mat_name,mat_occ:mat_occ,mat_con_num:mat_con_num,p_school_name:p_school_name,p_school_year:p_school_year,s_school_name:s_school_name,s_school_year:s_school_year,s_school_strand:s_school_strand,t_school_name:t_school_name,t_school_year:t_school_year,t_school_course:t_school_course},
            success:function(data)
            {
                $('#admission-add-student-modal').modal('hide');
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('Student added successfully.');
                $("#stu-form")[0].reset();
            }
          });
      }
      else
      {
          $.ajax({
            url:'../admission-process.php',
            method:'POST',
            data:{"updatestudentdetails":1,sisnum:sisnum,fname:fname,lname:lname,mname:mname,suffix:suffix,stutype:stutype,stu_orientation:stu_orientation,con_num:con_num,email:email,bday:bday,bplace:bplace,gender:gender,nat:nat,houseadd:houseadd,city:city,prov:prov,fat_name:fat_name,fat_occ:fat_occ,fat_con_num:fat_con_num,mat_name:mat_name,mat_occ:mat_occ,mat_con_num:mat_con_num,p_school_name:p_school_name,p_school_year:p_school_year,s_school_name:s_school_name,s_school_year:s_school_year,s_school_strand:s_school_strand,t_school_name:t_school_name,t_school_year:t_school_year,t_school_course:t_school_course},
            success:function(data)
            {
                $('#admission-add-student-modal').modal('hide');
                $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#successmsg").html('Student Update successfully.');
            }
          });
      }
    }
  
});

</script>

  <!-- Scroll to Top Button -->
  <?php require '../../../src/layout/go-to-top.php'; ?>

  <!-- Responsive core JavaScript -->
  <script src="../../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../../src/js/dark-mode-switch.min.js"></script>

</body>

</html>
