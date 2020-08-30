
<!-- Modal -->
<form id="modalmajor">
<div class="modal fade" id="add-major" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Major</h5><h5 id="courseid" hidden></h5>
        <a href="./"><button type="button" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></a>
      </div>
      <div class="modal-body">
      
        <div id="coursenamediv" class="form-group">
          <small class="readonly">Course Name</small>
          <input id="coursename2" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
        </div>

        <div id="abbrivdiv" class="form-group">
          <small class="readonly">Course Abbreviation</small>
          <input id="abbriv2" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
        </div>

        <div id="yeardiv" class="form-group">
          <small class="readonly">Year to be Taken</small>
          <input id="year2" spellcheck=false class="form-control" type="text" size="18" alt="login" required="" readonly>
            <span class="form-highlight"></span>
              <span class="form-bar"></span>
        </div>        
         <table class="table table-striped table-bordered">
          <thead>
            <tr>     
              <th scope="col">Major</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody id="majors">
          </tbody>
        </table>         
          <button type="button" class="view-user" id="addmajorbtn" ripple><i class="fas fa-plus"></i> ADD MAJOR</button>    
      </div>


      <div class="modal-footer">
          <a href="./"><button type="button" class="save" ripple><i class="fas fa-times"></i> EXIT</button></a>

      </div>
    </div>
  </div>
</div>
</form>

<!-- FOR CANCELLING -->
  <div class="modal fade" id="cancel-editing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Cancel?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no overlay" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save overlay" id="canceling" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


<!-- FOR STATUS CHANGE -->
  <div class="modal fade" id="change-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5>Change Status?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no overlay" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save overlay" id="statusbtn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>


<!-- FOR SAVING AND CHANGE OF MAJOR -->
  <div class="modal fade" id="save-changes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
    
    <h5 id="lbl">Save Changes?</h5>
    
        </div>
      <div class="modal-footer"> <!-- Footer -->
        <button type="button" class="cancel no overlay" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> No</button>
        <button type="button" class="save overlay" id="savebtn" ripple><i class="fas fa-check"></i> Yes</button>
      </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  
$(document).ready(function() {

         $('#addmajorbtn').click(function() {
          var table = document.getElementById("majors");
          var totalrowcount = table.rows.length;
          var tablerow = Number(totalrowcount)+1;

         $('#majors').append('<tr id="tr'+tablerow+'"><th id="major'+tablerow+'"><label id="id'+tablerow+'" hidden>0</label><label id="label'+tablerow+'"></label><input id="majoredit'+tablerow+'" value=""></th><td><button type="button" class="edit-user editmajor" name="'+tablerow+'" ripple style="display:none;" id="edit'+tablerow+'" >EDIT</button> <button type="button" class="delete-user statusmajor" name="'+tablerow+'" ripple style="display:none;" id="status'+tablerow+'" >Active</button><button type="button" name="'+tablerow+'" class="view-user pull-xs-right savemajor" id="save'+tablerow+'" ripple>SAVE</button> <button type="button" name="'+tablerow+'" class="delete-user pull-xs-right cancelmajor" id="cancel'+tablerow+'" ripple>CANCEL</button></td></tr>');

        });
         //edit major details
         $(document).on('click', '.editmajor', function(){
            var id = $(this).attr("name");
            var major = $('#major'+id).val();
            $(this).hide();
            $('#label'+id).hide();
            $('#majoredit'+id).show();
            $('#save'+id).show();
            $('#status'+id).hide();
            $('#cancel'+id).show();
          });
         var idcancel;
         // cancel editing of major
          $(document).on('click', '.cancelmajor', function(){
            $('#cancel-editing').modal('show');
            idcancel = $(this).attr("name");
          });

          // cancel editing of major
          $(document).on('click', '#canceling', function(){
            if($('#id'+idcancel).text() == "0")
            {
                $('#tr'+idcancel).remove(); 
                $('#cancel-editing').modal('hide');

                $( "div.info" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#infomsg").html('Adding of Major Cancelled!');
                 $('#yesorno').modal('hide');
            }
            else
            {     
                $('#cancel-editing').modal('hide');
                var text = $('#label'+idcancel).text();
                $('#majoredit'+idcancel).val(text);
                $('#cancel'+idcancel).hide();
                $('#label'+idcancel).show();
                $('#majoredit'+idcancel).hide();
                $('#save'+idcancel).hide();
                $('#status'+idcancel).show();
                $('#edit'+idcancel).show();

                $( "div.info" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#infomsg").html('Editing Cancelled!');
                 $('#yesorno').modal('hide');
            }

          });

          var idstatus;
          //change status
          $(document).on('click', '.statusmajor', function(){
            $('#change-status').modal('show');
            idstatus = $(this).attr("name");
          });
          $(document).on('click', '#statusbtn', function(){
            $('#change-status').modal('hide');

            var cid = $('#id'+idstatus).text();
            var status = $('#status'+idstatus).text();
             $.ajax({
                url:'process.php',
                method:'POST',
                data:{"changestatus":1,cid:cid,status:status},
                success:function(data)
                {
                  $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                  $("#successmsg").html('Status Successfully Changed!');
                  $('#yesorno').modal('hide');
                }
              });

             if(status == 'ACTIVE')
             {
                $('#status'+idstatus).text('INACTIVE');
             }
             else
             {
                $('#status'+idstatus).text('ACTIVE');
             }
          });

          var idchange;
         // saving or updating of major
          $(document).on('click', '.savemajor', function(){
            $('#save-changes').modal('show');
            idchange = $(this).attr("name");
            if($('#id'+idchange).text() == "0")
            {
                $('#lbl').text('Save New Major?'); 
            }
            else
            {  
              $('#lbl').text('Save Changes?'); 
            }
          });

          // saving or updating of major
          $(document).on('click', '#savebtn', function(){
            var cid = $('#id'+idchange).text();
            var cname = $('#coursename2').val();
            var abbriv = $('#abbriv2').val();
            var year = $('#year2').val();
            var text = $('#majoredit'+idchange).val();
              $.ajax({
                url:'process.php',
                method:'POST',
                data:{"majoradd":1,cid:cid,text:text,cname:cname,abbriv:abbriv,year:year},
                success:function(data)
                {
                  if(data == 0)
                  {
                      $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                      $("#failedmsg").html('Major already Available!');
                      $('#yesorno').modal('hide');
                      $('#save-changes').modal('hide');
                  }
                  else if(data == 'updated')
                  {
                      $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                      $("#successmsg").html('Major Updated Successfully!');
                      $('#yesorno').modal('hide');
                      $('#save-changes').modal('hide');
                      $('#label'+idchange).text(text);
                      $('#cancel'+idchange).hide();
                      $('#label'+idchange).show();
                      $('#majoredit'+idchange).hide();
                      $('#save'+idchange).hide();
                      $('#status'+idchange).show();
                      $('#edit'+idchange).show();             
                  }
                  else
                  {
                      $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                      $("#successmsg").html('New Major Added Successfully!');
                      $('#yesorno').modal('hide');
                      $('#save-changes').modal('hide');
                      $('#label'+idchange).text(text);
                      $('#id'+idchange).text(data);
                      $('#cancel'+idchange).hide();
                      $('#label'+idchange).show();
                      $('#majoredit'+idchange).hide();
                      $('#save'+idchange).hide();
                      $('#status'+idchange).show();
                      $('#status'+idchange).text('INACTIVE');
                      $('#edit'+idchange).show();
                  }
                }
              });
          });
       });
</script>