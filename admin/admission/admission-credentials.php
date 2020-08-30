<!-- Head -->
<?php require '../../src/layout/admission/head.php'; 
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
                <li class="breadcrumb-item ">Evaluation of Scores</li>
                <li class="breadcrumb-item active" aria-current="page">Submission of Credentials</li>
              </ol>
            </nav>



              <div class="card shadow-sm mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 text-gray-600">Credentials</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
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



                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-6">
                  <div class="card shadow-sm mb-4">

                  <div id="freshmen">
                    <div class="card-header">
                      Freshmen
                    </div>
                    <div class="card-body">
                      <label class="container-check">Form 137A
                        <input id="f137a" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Form 138A
                        <input id="f138a" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Good Moral Character
                        <input id="fgmc" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">TRF/Examinee Report if ALS Graduate
                        <input id="trf" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>                      
                    </div>
                  </div>  



                  <div id="transferee">
                    <div class="card-header">
                      Transferee
                    </div>
                    <div class="card-body">
                      <label class="container-check">Certificate of Grade - for Evaluation
                        <input id="cog" type="checkbox" name="radio" >
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">TOR - Copy for GRC
                        <input id="tor"type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Honorable Dismissal
                        <input id="hd"type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Good Moral Character
                        <input id="tgmc"type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>                     
                    </div>
                  </div>  



                  </div>    
                </div>


                <div class="col-lg-6">
                  <div class="card shadow-sm mb-4">
                    <div class="card-header">
                      Must Have Requirements
                    </div>
                    <div class="card-body">
                      <label class="container-check">2 pcs. - 2x2 picture (white background w/ nametag)
                        <input id="txt" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">2 pcs. - 1x1 picture (white background w/ nametag)
                        <input id="oxo" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Barangay Clearance
                        <input id="brgyclearance" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Photocopy of Birth Certificate (PSA/NSO)
                        <input id="psanso" type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">GRC College Admission Test
                        <input id="grcadtest"type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Photocopy of Marriage Certificate (PSA/NSO)
                        <input id="marrcert"type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>
                      <label class="container-check">Long Brown Envelope
                        <input id="lbe"type="checkbox" name="radio">
                          <span class="checkmark-check"></span>
                      </label>                      
                    </div>
                  </div>    
                </div>
              </div>

            <div class="d-flex justify-content-end">
               <button type="button" id="add_stud_btn" class="add-user pull-xs-right mt-3 mb-5" ripple onclick="reset()">Proceed <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

                        <!-- Modal Content -->
                        <div class="modal fade" id="modal-transferee" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">Congratulations</h6>
                                    </div>
                                    <div class="modal-body">
                                        <p class="">Congratulations <b id="sname"></b>! Please Proceed to designated Department for crediting of grcadtest.<br><br> Thank you, God bless and have a Great Day!</p>
                                    </div>
                                    <div class="modal-footer">
                                    <a href="admission-final-process?sisnum=<?php echo $sisnum; ?>"><button type="button" class="btn btn-danger">Close</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal Content -->
<!-- Footer -->
<?php require '../../src/layout/footer.php'; ?>

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

<!-- Scroll to Top Button -->
<?php require '../../src/layout/go-to-top.php'; ?>

<script type="text/javascript">
  var status='';
  var sisnum = '<?php echo $sisnum;?>';
     $.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"displayfullname2":1,sisnum:sisnum},
      success:function(data){
        var result = $.parseJSON(data);
                $('#lname').val(result.lname);
                $('#fname').val(result.fname);
                $('#stu_orientationtb').val(result.status);
                status = result.status;
              if (result.status == "Transferee")
              {
                if(result.txt == '')
                {
                }
                else
                {
                  // for transferee requirements
                  if(result.data1 == '1'){$('#cog').prop('checked', true);}
                      else{$('#cog').prop('checked', false);}

                  if(result.data2 == '1'){$('#tor').prop('checked', true);}
                      else{$('#tor').prop('checked', false);}

                  if(result.data3 == '1'){$('#hd').prop('checked', true);}
                      else{$('#hd').prop('checked', false);}

                  if(result.data4 == '1'){$('#tgmc').prop('checked', true);}
                      else{$('#tgmc').prop('checked', false);}
                }
                $('#transferee').show();
                $('#freshmen').hide();

              }
              else
              {
                if(result.txt == '')
                {
                }
                else
                {
                  // for freshmen requirements
                  if(result.data1 == '1'){$('#f137a').prop('checked', true);}
                      else{$('#f137a').prop('checked', false);}

                  if(result.data2 == '1'){$('#f138a').prop('checked', true);}
                      else{$('#f138a').prop('checked', false);}

                  if(result.data3 == '1'){$('#fgmc').prop('checked', true);}
                      else{$('#fgmc').prop('checked', false);}

                  if(result.data4 == '1'){$('#trf').prop('checked', true);}
                      else{$('#trf').prop('checked', false);}
                  
                }
               $('#transferee').hide();
                $('#freshmen').show(); 
              }

                if(result.txt == '')
                {
                }
                else
                {
                  // for must have requirements
                  if(result.txt == '1'){$('#txt').prop('checked', true);}
                      else{$('#txt').prop('checked', false);}

                  if(result.oxo == '1'){$('#oxo').prop('checked', true);}
                      else{$('#oxo').prop('checked', false);}

                  if(result.bc == '1'){$('#brgyclearance').prop('checked', true);}
                      else{$('#brgyclearance').prop('checked', false);}

                  if(result.pbc == '1'){$('#psanso').prop('checked', true);}
                      else{$('#psanso').prop('checked', false);}

                  if(result.test == '1'){$('#grcadtest').prop('checked', true);}
                      else{$('#grcadtest').prop('checked', false);}

                  if(result.pmc == '1'){$('#marrcert').prop('checked', true);}
                      else{$('#marrcert').prop('checked', false);}

                  if(result.lbe == '1'){$('#lbe').prop('checked', true);}
                      else{$('#lbe').prop('checked', false);}
                }
      }
    });

$('#add_stud_btn').click(function(){


var sisnum = '<?php echo $sisnum;?>';
if($('#f137a').is(':checked')) { var f137a = "1"; } else { var f137a = "0"; }
if($('#f138a').is(':checked')) { var f138a = "1"; } else { var f138a = "0"; }
if($('#fgmc').is(':checked')) { var fgmc = "1"; } else { var fgmc = "0"; }
if($('#trf').is(':checked')) { var trf = "1"; } else { var trf = "0"; }
if($('#cog').is(':checked')) { var cog = "1"; } else { var cog = "0"; }
if($('#tor').is(':checked')) { var tor = "1"; } else { var tor = "0"; }
if($('#hd').is(':checked')) { var hd = "1"; } else { var hd = "0"; }
if($('#tgmc').is(':checked')) { var tgmc = "1"; } else { var tgmc = "0"; }
if($('#txt').is(':checked')) { var txt = "1"; } else { var txt = "0"; }
if($('#oxo').is(':checked')) { var oxo = "1"; } else { var oxo = "0"; }
if($('#brgyclearance').is(':checked')) { var brgyclearance = "1"; } else { var brgyclearance = "0"; }
if($('#psanso').is(':checked')) { var psanso = "1"; } else { var psanso = "0"; }
if($('#grcadtest').is(':checked')) { var grcadtest = "1"; } else { var grcadtest = "0"; }
if($('#marrcert').is(':checked')) { var marrcert = "1"; } else { var marrcert = "0"; }
if($('#lbe').is(':checked')) { var lbe = "1"; } else { var lbe = "0"; }

$.ajax({
      url:"admission-process.php",
      method:"POST",
      data:{"credentials":1,f137a:f137a,f138a:f138a,fgmc:fgmc,trf:trf,cog:cog,tor:tor,hd:hd,tgmc:tgmc,txt:txt,oxo:oxo,brgyclearance:brgyclearance,psanso:psanso,grcadtest:grcadtest,marrcert:marrcert,lbe:lbe,sisnum:sisnum},
      success:function(data){
        if(status == 'Transferee' && data == 'admission-final-process')
        {
            window.location.href = data+'?sisnum='+sisnum;
        }
        else if(status == 'Transferee')
        {
          $('#modal-transferee').modal('show');
        }
        else
        {
            window.location.href = data+'?sisnum='+sisnum;
        }
      }
    });

});     
</script>

  <!-- Responsive core JavaScript -->
  <script src="../../src/vendor/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript -->
  <script src="../../src/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages -->
  <script src="../../src/js/admin.min.js"></script>

  <!-- Dark Theme -->
  <script src="../../src/js/dark-mode-switch.min.js"></script>

</body>

</html>
