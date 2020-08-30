

<!-- Modal -->
<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="printmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="printmodal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive" id="view-student-subject">
        </div>
      <div class="modal-footer">
        <button type="button" class="delete-user" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
        <!-- <button type="button" class="edit-user"><i class="far fa-file-excel"></i> Print Now</button> -->
      </div>
    </div>
  </div>
</div>


<!-- Modal Start -->
<div class="modal fade" id="transfereesubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Transferee Student Details</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row"> <!-- ROW Start Here -->
            <div class="col-lg-6"> <!-- left column Start -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                <small class="readonly">Fullname</small>
                <input id="trlname" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">Gender</small>
                <input id="trgender" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input Start Here -->      
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">Last School Attended</small>
                <input id="trschool" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Select Start Here --> 
              <!-- Select End Here --> 
            </div> <!-- left column End -->
            <div class="col-lg-6">  <!-- Right column Start -->
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">S.I.S. Number</small>
                <input id="trsis" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->   
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">Student Number</small>
                <input id="trstudnum" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->   
              <!-- Input Start Here -->        
              <div id="" class="form-group">
                    <small class="readonly">Curriculum Title</small>
                <input id="trcur" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
                  <span class="form-highlight"></span>
                    <span class="form-bar"></span>
              </div>
              <!-- Input End Here -->   
            </div> <!-- Right column Start -->
          </div> <!-- ROW End Here -->

      <div class="modal-body table-responsive" id="student-subject">
        </div>
          <div class="modal-footer footer1" style="display: none">
            <button type="button" class="view-user" id="removestud" ripple><i class="fas fa-ban"></i> Cancel Request</button>
            <button type="button" class="delete-user" data-dismiss="modal" ripple><i class="fas fa-times"></i> CLOSE</button>
          </div>

          <div class="modal-footer footer2" style="display: none">
            <button type="button" class="edit-user" id="savegrade" ripple><i class="fas fa-save"></i> <b id="gradeslbl">save grades</b></button>
            <button type="button" class="view-user" id="removestud" ripple><i class="fas fa-ban"></i> Cancel Request</button>
            <button type="button" class="delete-user" data-dismiss="modal" ripple><i class="fas fa-times"></i> CLOSE</button>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

<!-- Save subjects notif -->
<div class="modal fade" id="savegrademodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h5>Save Grades?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="cancel no" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save" id="savegradebtn" ripple><i class="fas fa-check"></i> Yes</button>
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

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box info">
  <i class="far fa-info-circle"></i> <span id="infomsg"></span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


  <script type="text/javascript">
    function isNumberKey(txt, evt)
       {
         var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
              return true;
            } else {
              return false;
            }
          } else {
            if (charCode > 31 &&
              (charCode < 48 || charCode > 57))
              return false;
          }
          return true;
       }


    $('.footer2').on('click','#savegrade', function(e){
        $('#savegrademodal').modal('show');
            $('#savegrademodal').on('click','#savegradebtn', function(e){
              var all = {};
              all.grades = new Array();
              all.id = new Array();
              var sisnum = $('#trsis').val();
              var c = 0;
              var table = document.getElementById("subjdetails");
              var tablecount = table.rows.length;
              for(var i = 1; i <= tablecount; i++)
              {
                var get_id = $('#ar'+i+'').attr('name');
                var get_grade = $('#gr'+i).val();
                if(get_grade == '')
                {
                  alert('a');
                      c++;
                      (function() {
                      var $el = $('#ar'+i),
                      originalColor = $el.css("background");
                      $el.css("background", "#ffc1bd");
                      setTimeout(function () {
                          $el.css("background", originalColor);
                      }, 3000); })(i);
                }
                else
                {
                    all.grades.push(get_grade);
                    all.id.push(get_id);
                }
              }
              if(c > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Grade must have value');
                var all = {};
                all.grades = new Array();
                all.id = new Array();
              }
              else
              {
                    var data = JSON.stringify(all);
                    console.log(data);
                    $.ajax({
                    url:"process.php",
                    type:"POST",
                    data:{"save-grades":1,data:data,sisnum:sisnum},
                      cache:false,
                    success:function(data){
                      //successfull notif
                      $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                      $("#successmsg").html('Grades Saved Successfully');
                      var sy = $('#sy').val();
                      var sem = $('#sem').val();
                      var studnum = sisnum;
                      //reload of table for grades
                      $.ajax({
                          url:"process.php",
                          method:"POST",
                          data:{"studsubject":1,studnum:studnum,sy:sy,sem:sem},
                          success:function(data)
                          {
                            $('#student-subject').html(data);
                            $('#savegrade').hide();
                          }
                        });
                      //restarting array
                      var all = {};
                      all.grades = new Array();
                      all.id = new Array();
                    }
                    });
              }

              $('#transfereesubject').css('overflow-y', 'auto');
              $('#savegrademodal').modal('hide');
            });

            $('#savegrademodal').on('click','.no', function(e){
                $('#transfereesubject').css('overflow-y', 'auto');
            });
    });

    //cancelling action
    $('#yesorno1').on('click','.no', function (e){
      $('#transfereesubject').css('overflow-y', 'auto');
      $('#yesorno1').modal('hide');
      $( "div.info" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      $("#infomsg").html('Removing of Student Cancelled!');
    });

    //remove subject
    $(document).on('click','.removegrade', function (e){
      var id = $(this).attr('id');
      $('#hide'+id+'').show(); 
      $('#hide2'+id+'').show(); 
      $("#ar"+id+" th").eq(0).nextUntil("tr").hide();

    });
    //undo action (removing of subjects)
    $(document).on('click','.undograde', function (e){
      var id = $(this).attr('id');
      $('#hide'+id+'').hide(); 
      $('#hide2'+id+'').hide(); 
      $("#ar"+id+" th").eq(0).nextUntil("tr").show();

    });
  </script>