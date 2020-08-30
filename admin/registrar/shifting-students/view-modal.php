

<!-- Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="printmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">CREDITED SUBJECTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive" id="view-shiftingstudent-subject">
        </div>
      <div class="modal-footer">
        <button type="button" class="edit-user" ripple><i class="fas fa-check"></i> APPROVE</button>
        <button type="button" class="view-user" id="removestud" ripple><i class="fas fa-ban"></i> Cancel Request</button>
        <button type="button" class="delete-user" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <!-- <button type="button" class="edit-user"><i class="far fa-file-excel"></i> Print Now</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewapprovemodal" tabindex="-1" role="dialog" aria-labelledby="printmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="printmodal">STUDENT DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive" id="view-approvestudent-subject">
        </div>
      <div class="modal-footer">
        <button type="button" class="delete-user" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <!-- <button type="button" class="edit-user"><i class="far fa-file-excel"></i> Print Now</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Start -->
<div class="modal fade" id="shift" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shifting Form</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row"> <!-- ROW Start Here -->
            <div class="col-lg-6"> <!-- left column Start -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                <small class="readonly">Student Number</small>
                <input id="smstudentnumber" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                  <small class="readonly">Student Name</small>
              <input id="smfullname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                <span class="form-highlight"></span>
                  <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->        
              <!-- Select Start Here --> 
              <div id="" class="form-group">
                    <small class="readonly">School Year</small>
                <input id="smsy" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Select End Here --> 
              <!-- Select Start Here --> 
              <div id="" class="form-group">
                    <small class="readonly">Semester</small>
                <input id="smsem" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Select End Here --> 
            </div> <!-- left column End -->
            <div class="col-lg-6">  <!-- Right column Start -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">Current Course</small>
                <input id="smcourse" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->   
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">New Course</small>
                <input id="smnewcourse" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->   
              <textarea class="textarea-input" id="reason" name="subject" placeholder="Write your reason..." style="height:140px" readonly></textarea>
            </div> <!-- Right column Start -->
          </div> <!-- ROW End Here -->
          <div class="modal-footer">
            <button type="button" class="view-user" id="removestud" ripple><i class="fas fa-ban"></i> Cancel Request</button>
            <button type="button" class="delete-user" data-dismiss="modal" ripple><i class="fas fa-times"></i> CLOSE</button>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Modal End -->
<!-- for cancel request status -->
<div class="modal fade" id="yesorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Remove this Student?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- for cancel credited status -->
<div class="modal fade" id="yesorno1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h6>Remove this Student?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="confirmdelete_btn1" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box info">
  <i class="far fa-info-circle"></i> <span id="infomsg"></span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>



  <script type="text/javascript">
    
function table()
{
          //for fetching all the subject
         var sy=$('#sy').val();
         var sem=$('#sem').val();
         var view = $("#viewby").text();

        var table = $('#studentlist').DataTable( {

            "pagingType": "full_numbers",

            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

            "pageLength": 10,

            "order": [[ 1, 'desc' ]],

            "processing" : true,
            
            "serverSide" : true,

            "ajax" :{ 
                  "url":"fetch_shifting_student.php", 
                  "data":{ 
                    "schoolyear":sy,
                    "semester":sem,
                    "view":view,
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
    //for removing requested student
    $('#shift').on('click','#removestud', function (e){
      $('#yesorno').modal('show');
        $('#yesorno').on('click','#confirmdelete_btn', function (e){
            var studnum = $('#smstudentnumber').val();
            var sy=$('#sy').val();
            var sem=$('#sem').val();
            $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"removereqstudent":1,studnum:studnum,sy:sy,sem:sem},
                  success:function(data)
                  {
                    $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#successmsg").html(data);
                    $('#studentlist').DataTable().destroy();
                    table();
                    $('#yesorno').modal('hide');
                    $('#shift').modal('hide');
                  }
                }); 
            });
        });

    //for removing student with credited subject
    $('#viewmodal').on('click','#removestud', function (e){
      $('#yesorno1').modal('show');
        $('#yesorno1').on('click','#confirmdelete_btn1', function (e){
            var studnum = $('#viewstudnum').text();
            var sy=$('#sy').val();
            var sem=$('#sem').val();
            $.ajax({
                  url:"process.php",
                  method:"POST",
                  data:{"removecredstudent":1,studnum:studnum,sy:sy,sem:sem},
                  success:function(data)
                  {
                    $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                    $("#successmsg").html(data);
                    $('#studentlist').DataTable().destroy();
                    table();
                    $('#yesorno1').modal('hide');
                    $('#viewmodal').modal('hide');
                  }
                }); 
            });
        });


    $(document).on('click','.no', function (e){
      $('#yesorno').modal('hide');
      $('#yesorno1').modal('hide');
      $( "div.info" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#infomsg").html('Removing of Student Cancelled!');
    });


  </script>