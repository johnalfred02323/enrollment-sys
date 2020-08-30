<!-- Head -->
<?php require '../../src/layout/sample/head.php'; ?>

<!-- jquery -->
<script src="../../src/vendor/jquery/jquery-3.3.1.min.js"></script>

<!-- Animation CSS -->
<link href="../../src/css/aos.css" rel="stylesheet">

  <title>GRC System | Registrar</title>

</head>
<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Side Nav -->
    <?php require '../../src/layout/sample/side-nav.php'; ?>




    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Top Nav -->
        <?php require '../../src/layout/sample/top-nav.php'; ?>



  <div class="container-fuel text-center p-3">
    <img class="" src="logo-name-dark.png" height="120px" />
    <p class="text-dark">454 GRC Bldg., Rizal Ave., 9<sup>th</sup> Ave. <br/> Grace park, Caloocan City.  <br/> Telfax :361-6330 </p>
    <h3 class="text-dark font-weight-bold">OFFICE OF ADMISSION</h3>
  </div>


       <!-- Begin Page Content -->
        <div class="container-fluid">



<h5>Breadcrumb</h5>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Link-Here">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Title Active Page</li>
  </ol>
</nav>


<!-- Sample Two -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Link-Here">Home</a></li>
    <li class="breadcrumb-item"><a href="Link-Here">Page 2</a></li>
    <li class="breadcrumb-item active" aria-current="page">Title Active Page</li>
  </ol>
</nav>




<br><br><br>









<!-- SPACER -->
<div class="mx-auto" style="height: 20px;"></div>









<h5>Two Column</h5>
<br>


 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

            

            <h3>Column One</h3>



            </div> <!-- left column End -->




            <div class="col-lg-6">  <!-- Right column Start -->



            
            <h3>Column Two</h3>




            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->











<br><br><br>

<!-- //////////////////////////// Modal Start Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<h5>Modal</h5>
<p>Optional sizes, place nyo sa tabi ng .modal-dialog </p>
<p>Large Modal ( class="modal-lg" )</p>
<p>Small Modal ( class="modal-sm" )</p>


<!-- modal button -->
<button data-toggle="modal" data-target="#call-the-mdoal" > Modal </button>

  <!-- Modal Start -->
  <div class="modal fade" id="call-the-mdoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Title Head</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

          
          <h5>Your Content Here</h5>
          <h5>This Modal is Default Size</h5>


<div class="modal-footer">

<h5>Footer</h5>

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

<!-- //////////////////////////// Modal End Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->









<br><br><br><br><br> 













<h5>Alert and Modal QUESTION Yes or No</h5> 




<!-- ////////////////////////////////////////////   QUESTION ALERT START HERE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<button data-toggle="modal" data-target="#yesorno">Yes or No</button>

  <!-- Yes or No Modal-->
  <div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
		
		<h5>Are you sure?</h5>
		
        </div>
			<div class="modal-footer"> <!-- Footer -->
				<button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
				<button type="button" class="save" id="" ripple><i class="fas fa-check"></i> Yes</button>
			</div>
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////   QUESTION ALERT END HERE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
  
  







<!-- ////////////////////////////////////////////  MESSAGE ALERT START HERE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
    <button id="success-button">Success</button>
    <button id="failed-button">Failed</button>
    <button id="warning-button">Warning</button>
    <button id="info-button">Info</button>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>   
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> Failed!
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box warning">
  <i class="fas fa-exclamation-triangle"></i> Warning!
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box info">
  <i class="fas fa-info-circle"></i> Info!
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<script type="text/javascript">
$( "#success-button" ).click(function() {
  $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
  $("#successmsg").html('Changed');
});

$( "#failed-button" ).click(function() {
  $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
});

$( "#warning-button" ).click(function() {
  $( "div.warning" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
});

$( "#info-button" ).click(function() {
  $( "div.info" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
});
</script>
<!-- ////////////////////////////////////////////  MESSAGE ALERT START HERE  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
















<br><br><br><br><br><br>











<h5>If ayaw nyo malaki yung title sa head remove "card-text-title-head" class</h5>
<br>



<h3>Cards</h3>
<br>


          <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->



              <!-- Example 1 -->
              <div class="card mb-4">
                <div class="card-header">
                  Example 1
                </div>
                <div class="card-body">
                  dwadwadwad
                </div>
              </div>




              <!-- Example 2 -->
              <div class="card shadow-sm mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold card-text-title-head">Example 2</h6>
                </div>
                <div class="card-body">
                  dwadwadwadwad
                </div>
              </div>


            </div> <!-- left column End -->


            <div class="col-lg-6">  <!-- Right column Start -->



              <!-- Example 3 -->
              <div class="card shadow-sm mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold card-text-title-head">Example 3</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  dawdwadwadwa
                </div>
              </div>




              <!-- Example 4 -->
              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold card-text-title-head">Example 4</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    dwadwadwadwa
                  </div>
                </div>
              </div>




            </div> <!-- Right column Start -->

          </div> <!-- ROW End Here -->




<div class="card shadow-sm mb-4"> <!-- card 5 start -->

  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold card-text-title-head">Example 5</h6>

      <button>Button</button>

  </div>

    <div class="card-body" >
      
        dwadwadwadwa

    </div>
</div> <!-- card 5 end -->





<br><br><br>
<!-- ////////////////////////////////////   Admin Card Total Start Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<br>
<h5>Admin Card Total</h5>

  <!-- Counter JS -->
<p>  < script src="../../src/js/counter.js"> < /script> </p>

<!-- Cards Total Start Here 1 -->
        <div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Students Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 student-bg">
                 Students
                </div>
              <div class="student-color">

                <span class="float-left"><h4 class="counts">4244</h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 student-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Students End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- New enrollees Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 new-enrollees-bg">
                  New enrollees
                </div>
              <div class="new-enrollees-color">

                <span class="float-left"><h4 class="counts">2424</h4></span>
                <span class="float-right"><h4><i class="fas fa-user"></i></h4></span>
             
              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 new-enrollees-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- New enrollees End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Subjects Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 subjects-bg ">
                  Subjects
                </div>
              <div class="subjects-color">

                <span class="float-left"><h4 class="counts">24242</h4></span>
                <span class="float-right"><h4><i class="fas fa-book"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 subjects-bg " href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Subjects End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Instructor Start Here -->
             <div class="card total-count-card">
                <div class="pt-1 pb-1 instructor-bg">
                  Instructor
                </div>
              <div class="instructor-color ">

                <span class="float-left"><h4 class="counts">2421</h4></span>
                <span class="float-right"><h4><i class="fas fa-user-tie"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 instructor-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>  <!-- Instructor End Here -->                   

        </div>
<!-- Cards Total End Here 1 -->









<!-- Cards Total Start Here 2 -->
        <div class="row">

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Sections Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 sections-bg">
                 Sections
                </div>
              <div class="sections-color">

                <span class="float-left"><h4 class="counts">2156</h4></span>
                <span class="float-right"><h4><i class="far fa-clipboard"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 sections-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Sections End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- Admins Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 admins-bg">
                  Admins
                </div>
              <div class="admins-color">

                <span class="float-left"><h4 class="counts">2565</h4></span>
                <span class="float-right"><h4><i class="fas fa-user-shield"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 admins-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!-- Admins End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!--  Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 none-bg">
                  None
                </div>
              <div class="none-color">

                <span class="float-left"><h4 class="counts">9545</h4></span>
                <span class="float-right"><h4><i class="fas fa-users"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 text-black clearfix small z-1 none-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div> <!--  End Here -->

          <div class="col-xl-3 col-sm-6 mb-3"> <!-- News Start Here -->
            <div class="card total-count-card">
                <div class="pt-1 pb-1 news-bg">
                  News
                </div>
              <div class="news-color">

                <span class="float-left"><h4 class="counts">2481</h4></span>
                <span class="float-right"><h4><i class="far fa-newspaper"></i></h4></span>

              </div>
              <a class="footer-count pt-1 pb-1 clearfix small z-1 news-bg" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>   <!-- News End Here -->                 

        </div>
<!-- Cards Total End Here 2 -->


<!-- ////////////////////////////////////   Admin Card Total End Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->







<br><br><br>







<!-- ////////////////////////////////////   Button Start Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->

<h5>Table Buttons</h5>

<button id="" class="edit-user pull-xs-right edit" ripple><i class="fas fa-edit"></i> EDIT</button> 

<button id="" class="view-user pull-xs-right edit" ripple><i class="fas fa-eye"></i> VIEW</button> 

<button id="" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> DELETE</button>


<br><br>
<h5>Modal Buttons</h5>

<button type="button" class="cancel no" ripple><i class="fas fa-times"></i> No</button>

<button type="button" class="save" id="" ripple><i class="fas fa-check"></i> Yes</button>

<br><br>

<button type="button" class="cancel" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="" ripple><i class="fas fa-save"></i> SAVE</button>

<br><br>
<h5>Main Button</h5>

<button type="button" id="" class="add-user pull-xs-right" ripple><i class="fas fa-user-plus"></i> NEW USER</button>

<br><br>
<p> Button Effect </p>
<p> < script src="../../src/js/button-effect.js" >< /script > </p>



<!-- ////////////////////////////////////   Button End Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->







<br><br><br>






<!-- ////////////////////////////////////   Input Type , Select , Radio Button and Check Box Start Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<h5>Input Type , Select , Radio Button and Check Box</h5>

 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->



<!-- Input Start Here -->        
<div id="" class="form-group">
  <input id="" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
    <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="firstname" class="float-label" style="font-family:Arial, FontAwesome">First Name</label>
        <erroru>
          First Name is required
            <i>   
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M0 0h24v24h-24z" fill="none"/>
                <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
              </svg>
            </i>
        </erroru>
</div>
<!-- Input End Here -->                





<!-- Checked -->  
<!-- Check Box Start Here -->      
<label class="container-check">Value 1
  <input type="checkbox" checked="checked">
  <span class="checkmark-check"></span>
</label>
<!-- Check Box End Here -->    



<!-- uncheck -->   
<!-- Check Box Start Here -->   
<label class="container-check">Value 2
  <input type="checkbox">
  <span class="checkmark-check"></span>
</label>
<!-- Check Box End Here --> 


<br>



<!-- Date -->  
<input type="date" placeholder="My Placeholder :">






  <div class="form-group">
    <small class="readonly">Read Only</small>
    <input type="text" class="form-control" id="semester" size="18" placeholder="Name" value="" readonly>
  </div>



            </div> <!-- left column End -->




            <div class="col-lg-6">  <!-- Right column Start -->



<!-- Select Start Here --> 
<div class="box1">
  <label class="select-label">Title</label>
  <select name='' id="" required>
    <option hidden>Choose Value</option>
    <option value="">Value 1</option>
    <option value="">Value 2</option>
    <option value="">Value 3</option>
    <option value="">Value 4</option>
  </select>
</div>
<!-- Select End Here --> 


<br>


<!-- Radio Box Start Here -->   
<label class="container-radio">Radio one
  <input type="radio" checked="checked" name="radio">
  <span class="checkmark-radio"></span>
</label>
<!-- Radio Box End Here -->   



<!-- Radio Box Start Here -->   
<label class="container-radio">Radio two
  <input type="radio" name="radio">
  <span class="checkmark-radio"></span>
</label>
<!-- Radio Box End Here -->   




            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->


<!-- ////////////////////////////////////   Input Type , Select , Radio Button and Check Box End Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->








<br><br><br>









<!-- ////////////////////////////////////   Animation Start Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
<h3>Animation</h3>

<p>official documentation. <a href="https://michalsnik.github.io/aos/?fbclid=IwAR0aVuU20oy_T50kvv2RJmYLxYCfCPmuUspgPfld7_oX9aUpy0moV8Inn4I">Click Here</a></p>

<code>
< script src="../../src/js/aos.js">< /script> 

<br>

< script>
AOS.init();
< /script>
</code>

<br><br>


 <div class="row"> <!-- ROW Start Here -->

            <div class="col-lg-6"> <!-- left column Start -->

            
              <!-- Example 1 -->
              <!-- data-aos="fade-up" -->
              <div class="card shadow-sm mb-4" data-aos="fade-up">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold card-text-title-head">Example 2</h6>
                </div>
                <div class="card-body">
                  dwadwadwadwad
                </div>
              </div>



            </div> <!-- left column End -->




            <div class="col-lg-6">  <!-- Right column Start -->

            
              <!-- Example 2 -->
              <!-- data-aos="fade-down" -->
              <div class="card shadow-sm mb-4" data-aos="fade-down">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold card-text-title-head">Example 4</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    dwadwadwadwa
                  </div>
                </div>
              </div>


            </div> <!-- Right column Start -->

</div> <!-- ROW End Here -->


<br><br><br><br><br>
<!-- ////////////////////////////////////   Animation End Here \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->



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

  <!-- Counter -->
  <script src="../../src/js/counter.js"></script> 

  <!-- Animation JS -->
  <script src="../../src/js/aos.js"></script> 
  <script>
  AOS.init();
  </script>

</body>

</html>
