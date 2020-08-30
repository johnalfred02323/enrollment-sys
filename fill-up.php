<?php 
require 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll">
    <head>
        <!-- Primary Meta Tags -->
        <title>GRC | Student Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="title" content="Global Reciprocal Colleges Student Portal">
        <meta name="author" content="Global Reciprocal Colleges">
        <meta name="description" content="Global Reciprocal Colleges Student Portal.">
        <meta name="keywords" content="Global Reciprocal Colleges Student Portal, GRC, Student Portal, GRC Student Portal" />
        <link rel="canonical" href="http://localhost/grc/">
    
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="120x120" href="asset/img/favicon/logo.png">
        <link rel="icon" type="image/png" sizes="32x32" href="asset/img/favicon/logo.png">
        <link rel="icon" type="image/png" sizes="16x16" href="asset/img/favicon/logo.png">
        <link rel="manifest" href="asset/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="asset/img/favicon/folder-open.svg" color="#fa5252">
        <meta name="msapplication-TileColor" content="#fa5252">
        <meta name="theme-color" content="#fa5252">
    
        <link href="asset/css/mystyle.css" rel="stylesheet">
        
        <script src="src/vendor/jquery/jquery.min.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics Here -->
    </head>
<body>
<header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-dark navbar-theme-danger">
            <div class="container position-relative">
                <a class="navbar-brand mr-lg-5" href="./">
                    <img class="navbar-brand-dark" src="src/img/logo-white.png" alt="Logo">
                    <img class="navbar-brand-light" src="src/img/logo-white.png" alt="Logo">
                    Global Reciprocal Colleges
                </a>
            </div>
        </nav>
    </header>    
    <main>
        <section class="section-sm">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <h4>Student Information Form</h4>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-6">
                                <div class="form-group has-success">
                                    <label for="Firstname"><b style="color:red">*</b> Firstname</label>
                                    <input type="text" class="form-control" id="fname" value="" />
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group has-danger">
                                    <label for="Lastname"><b style="color:red">*</b> Lastname</label>
                                    <input type="text" class="form-control" id="lname" value="" />
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Middlename">Middlename</label>
                                    <input type="text" id="mname" class="form-control"/>
                                </div>                                
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Suffix">Suffix</label>
                                    <input type="text" id="suffix" placeholder="Example Jr. etc." class="form-control"/>
                                </div>                                
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="studenttype"><b style="color:red">*</b> Student Type</label>
                                    <select id="stu-type" class="form-control"/>
                                    <option value="" disabled hidden selected>Choose Student Type</option>
                                    <option value="Full">Full Scholar</option>
                                    <option value="Partial">Partial Scholar</option>
                                    <option value="40">40% Scholar</option>
                                    <option value="20">20% Scholar</option>
                                    <select>
                                </div>                                
                            </div>  
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="stydentori"><b style="color:red">*</b> Student Orientation</label>
                                    <select id="stu_orientation" class="form-control"/>
                                    <option disabled hidden selected>Choose Orientation Type</option>
                                    <option>Freshman</option>
                                    <option>Transferee</option>
                                    <option>Cross-Enrollee</option>
                                    <select>
                                </div>                                
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="ContactNumber"><b style="color:red">*</b> Contact Number</label>
                                    <input type="text" id="connum" class="form-control" name="phone" pattern="09+[0-9]{9}" placeholder="09*********" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
                                </div>                                
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="E-mailAddress"><b style="color:red">*</b> E-mail Address</label>
                                    <input type="email" id="email" class="form-control"/>
                                </div>                                
                            </div> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleInputDate1"><b style="color:red">*</b> Birthday</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="far fa-calendar-alt"></span></span>
                                        </div>
                                        <input class="form-control datepicker" id="bday" placeholder="Select date" type="text" aria-label="Date with icon left"/>
                                    </div>
                                </div>                                
                            </div>                                                        
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Birth Place"><b style="color:red">*</b> Birth Place</label>
                                    <input type="text" id="bdayplace" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Gender"><b style="color:red">*</b> Gender</label>
                                    <select id="gender" class="form-control"/>
                                    <option disabled hidden selected>Choose Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <select>
                                </div>                               
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nationality"><b style="color:red">*</b> Nationality</label>
                                    <input type="text" id="nat" value="Filipino" class="form-control"/>
                                </div>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nationality"><b style="color:red">*</b> Permanent Address</label>
                                    <input type="text" id="houseadd" class="form-control"/>
                                </div>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nationality"><b style="color:red">*</b> City</label>
                                    <input type="text" id="city" class="form-control"/>
                                </div>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nationality"><b style="color:red">*</b> Province</label>
                                    <input type="text" id="prov" class="form-control"/>
                                </div>                                
                            </div>
                        </div>

                        <h4>Guardian information Form</h4>
                        <div class="row mb-5">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Father'sName">Father's Name</label>
                                    <input type="text" id="fatname" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="FathersNameOccupation">Father's Occupation</label>
                                    <input type="text" id="fatocc" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="FathersContactNumber">Father's Contact Number</label>
                                    <input type="tel" id="fatconnum" class="form-control" pattern="09+[0-9]{9}" placeholder="09*********" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                                </div>                                
                            </div>
                        </div>
                        <div class="row mb-5">    
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="MothersName">Mother's Name</label>
                                    <input type="text" id="matname" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="MothersOccupation">Mother's Occupation</label>
                                    <input type="text" id="matocc" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Mother's Contact Number">Mother's Contact Number</label>
                                    <input type="text" id="matconnum" class="form-control" pattern="09+[0-9]{9}" placeholder="09*********" maxlength="11" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"/>
                                </div>                                
                            </div>                                                        
                        </div>

                        <h4>Education Background History Form</h4>
                        <div class="row mb-5">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="PrimarySchoolYear"><b style="color:red">*</b> Primary School Name</label>
                                    <input type="text" id="prischname" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="PrimarySchoolYear"><b style="color:red">*</b>Year Graduated</label>
                                    <input type="text" id="prischyear" class="form-control" placeholder="0000" />
                                </div>                                
                            </div>
                        </div>
                        <div class="row mb-5">    
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="SecondarySchoolName"><b style="color:red">*</b> Secondary School Name</label>
                                    <input type="text" id="secschname" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="SecondarySchoolYear"><b style="color:red">*</b>Year Graduated</label>
                                    <input type="text" id="secschyear" class="form-control" placeholder="0000"/>
                                </div>                                
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="SecondarySchoolStrand">Secondary School Strand</label>
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
                                </div>                                
                            </div> 
                        </div>
                        <div class="row mb-5" id="tertiary" style="display: none">                              
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Tertiary School Name">Tertiary School Name</label>
                                    <input type="text" id="terschname" class="form-control"/>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="TertiarySchoolYear">Year</label>
                                    <input type="text" id="terschyear" class="form-control" placeholder="0000"/>
                                </div>                                
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="TertiarySchoolCourse">Course</label>
                                    <input type="text" id="terschcourse" class="form-control"/>
                                </div>                                
                            </div>                                                       
                        </div>        

                    <div class="d-flex justify-content-end mt-5 mb-5">
                        <button class="btn animate-up-2 mr-2 mb-2 btn-icon btn-danger" id="save_btn" type="button">
                            <span class="btn-inner-text">Submit</span>
                            <span class="btn-inner-icon"><i class="fas fa-check"></i></span>
                        </button>
                    </div>    


                    </div>
                </div>
            </div>
        </section>    
    </main>
                        <!-- Modal Content -->
                        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">Congratulations</h6>
                                    </div>
                                    <div class="modal-body">
                                        <p class="">Congratulations <b id="sname"></b>! you may now proceed to Admission office for other Requirements needed.<br><br> Thank you, God bless and have a Great Day!</p>
                                    </div>
                                    <div class="modal-footer">
                                    <a href="privacy-policy"><button type="button" class="btn btn-danger">Close</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal Content -->
   <!-- Footer -->
    <footer class="footer bg-danger text-white py-6 overflow-hidden">
        <div class="container">
            <div class="copyright text-white mt-4 text-center">
                &#xA9;
                <script>
                    document.write(new Date().getFullYear())
                </script> <a href="" target="_blank">Global Reciprocal Colleges</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Core -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="asset/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <script src="asset/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="asset/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <script src="asset/vendor/prism/prism.js"></script>
    <script src="asset/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="asset/js/console.js"></script>

    <!-- My JS -->
    <script src="asset/js/myjs.js"></script>

    <!-- Lazy Load -->
    <script src="asset/vendor/jquery-lazy-load/jquery.lazy.min.js"></script>

</body>
<script type="text/javascript">

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

    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var mname = $('#mname').val();
    var suffix = $('#suffix').val();
    var stutype = $('#stu-type').val();
    var stu_orientation = $('#stu_orientation').val();
    var con_num = $('#connum').val();
    var length = $("#connum").val().length;
    var gender = $('#gender').val();
    var email = $('#email').val();
    var date = $('#bday').val();
    var datearray = date.split("/");
    var bday = datearray[2] + '-' + datearray[0] + '-' + datearray[1];
    var bplace = $('#bdayplace').val();
    var houseadd = $('#houseadd').val();
    var city = $('#city').val();
    var prov = $('#prov').val();
    var nat = $('#nat').val();
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

   if(fname == '' || lname == '' || stu_orientation == null || stutype == null || stutype == "" || gender == null || con_num == '' || length != '11' || email == '' || date == '' || bplace == '' || nat == ''  || houseadd == '' || city == '' || prov == '' || p_school_name == '' || p_school_year == '' || s_school_name == '' || s_school_year == ''){
      if(fname == ''){
            $('#fname').addClass("is-invalid");
      }
      else
      {
            $('#fname').removeClass("is-invalid");
      }
      if(lname == ''){
            $('#lname').addClass("is-invalid");
      }
      else
      {
            $('#lname').removeClass("is-invalid");
      }
      if(stu_orientation == null){
            $('#stu_orientation').addClass("is-invalid");
      }
      else
      {
            $('#stu_orientation').removeClass("is-invalid");
      }
      if(stutype == null || stutype == ""){
            $('#stu-type').addClass("is-invalid");
      }
      else
      {
            $('#stu-type').removeClass("is-invalid");
      }
      if(gender == null){
            $('#gender').addClass("is-invalid");
      }
      else
      {
            $('#gender').removeClass("is-invalid");
      }
      if(houseadd == ''){
            $('#houseadd').addClass("is-invalid");
      }
      else
      {
            $('#houseadd').removeClass("is-invalid");
      }
      if(city == ''){
            $('#city').addClass("is-invalid");
      }
      else
      {
            $('#city').removeClass("is-invalid");
      }
      if(prov == ''){
            $('#prov').addClass("is-invalid");
      }
      else
      {
            $('#prov').removeClass("is-invalid");
      }
      if(con_num == '' || length != '11'){
            $('#connum').addClass("is-invalid");
      }
      else
      {
            $('#connum').removeClass("is-invalid");
      }
      if(email == ''){
            $('#email').addClass("is-invalid");
      }
      else
      {
            $('#email').removeClass("is-invalid");
      }
      if(date == ''){
            $('#bday').addClass("is-invalid");
      }
      else
      {
            $('#bday').removeClass("is-invalid");
      }
      if(bplace == ''){
            $('#bdayplace').addClass("is-invalid");
      }
      else
      {
            $('#bdayplace').removeClass("is-invalid");
      }
      if(nat == ''){
            $('#nat').addClass("is-invalid");
      }
      else
      {
            $('#nat').removeClass("is-invalid");
      }
      if(p_school_name == ''){
            $('#prischname').addClass("is-invalid"); 
      }
      else
      {
            $('#prischname').removeClass("is-invalid");
      }
      if(p_school_year== ''){
            $('#prischyear').addClass("is-invalid");
      }
      else
      {
            $('#prischyear').removeClass("is-invalid");
      }
      if(s_school_name == ''){
            $('#secschname').addClass("is-invalid");
      }
      else
      {
            $('#secschname').removeClass("is-invalid");
      }
      if(s_school_year == ''){
            $('#secschyear').addClass("is-invalid");
      }
      else
      {
            $('#secschyear').removeClass("is-invalid");
      }

        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Please Check for the required Information.');  
    }
    else
    {
          $.ajax({
            url:'admin/admission/admission-process.php',
            method:'POST',
            data:{"admissionaddstudentmodal":1,fname:fname,lname:lname,mname:mname,suffix:suffix,stutype:stutype,stu_orientation:stu_orientation,con_num:con_num,email:email,bday:bday,bplace:bplace,gender:gender,nat:nat,houseadd:houseadd,city:city,prov:prov,fat_name:fat_name,fat_occ:fat_occ,fat_con_num:fat_con_num,mat_name:mat_name,mat_occ:mat_occ,mat_con_num:mat_con_num,p_school_name:p_school_name,p_school_year:p_school_year,s_school_name:s_school_name,s_school_year:s_school_year,s_school_strand:s_school_strand,t_school_name:t_school_name,t_school_year:t_school_year,t_school_course:t_school_course},
            success:function(data)
            {
                $('#sname').text(fname);
                $('#modal-default').modal('show');
            }
          });
    }
  
});
</script>
</html>