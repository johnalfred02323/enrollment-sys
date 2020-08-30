<?php 
require '../../../config/config.php';
$course = $_GET['Course'];
?>
<form id="curriculum_form">
  <!-- Add User Modal-->
  <div class="modal fade" id="curriculum_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      <div id="curriculum_forms"></div> 
      <div id="curriculum_forms_new"> 
        <div class="modal-header">
          <h5 class="modal-title" id="curriculumlbl">Add New Curriculum</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close" onclick="reset()">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
 
        <div class="modal-body">

    <!-- for updating only of curriculum -->   
  <label id="curid" class="float-label" style="font-family:Arial, FontAwesome" hidden></label>


  <div id="curtitle" class="form-group">
    <input id="curriculumtitle" spellcheck=false class="form-control" type="text" size="18" alt="login" required="">
      <span class="form-highlight"></span>
        <span class="form-bar"></span>
        <label for="curriculumtitle" class="float-label" style="font-family:Arial, FontAwesome">Curriculum Title</label>
          <erroru>
            Curriculum Title is required
              <i>   
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M0 0h24v24h-24z" fill="none"/>
                  <path d="M1 21h22l-11-19-11 19zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                </svg>
              </i>
          </erroru>
  </div>


  <div class="box1">
      <label class="select-label">Course</label>
      <select name='' id="course" required>
        <option hidden>Choose Course</option>
        <?php 
        if($course != 'ALL')
        {
          echo "<option value='".$course."' selected>".$course."</option>";
        }
        else
        {
          $query = "SELECT DISTINCT course_abbreviation FROM course";
           $result = mysqli_query($conn, $query); 
            if($count=mysqli_num_rows($result) > 0)  
            {
            while($rows=mysqli_fetch_array($result))
            {
              echo "<option value='".$rows['course_abbreviation']."'>".$rows['course_abbreviation']."</option>";
            }
            }
        }
        ?>
      </select>
    </div>

<div class="box2 mt-4">
      <label class="select-label">Major</label>
      <select name='' id="major1" required>
        <option hidden>Choose Major</option>
      </select>
    </div>

              </div>


        </div> <!-- Modal Body End -->
       
      <div class="modal-footer">
        <button type="button" class="cancel" data-dismiss="modal" onclick="reset()" ripple><b class="fas fa-times"></b> Cancel</button>
        <button type="button" class="save" id="save_btn" ripple><i class="fas fa-save"></i> <span id="save_btnlbl">Save</span></button>
      </div>

      </div>

</div>

    </div>
  </div>
</form>

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>


<script type="text/javascript">

var coursepick = '<?php echo $course; ?>';

if(coursepick != 'ALL')
{
  var course = '<?php echo $course; ?>';
//for major
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"major2":1,course:course},
      success:function(data){
        if(data == 0)
        {
           $('#major1').html('<option>No Major</option>');
        }
        else
        {
           $('#major1').html('<option hidden>Choose Major</option>'+data); 
        }
      }
      });
}

$(document).on( 'change','#course', function (e) {
var course = $(this).val();
//for major
 $.ajax({
      url:"process.php",
      type:"POST",
      data:{"major2":1,course:course},
      success:function(data){
        if(data == 0)
        {
           $('#major1').html('<option>No Major</option>');
        }
        else
        {
           $('#major1').html('<option hidden>Choose Major</option>'+data); 
        }
      }
      });
});


function fetch_curriculum(){
  var table = $('#curr_table').DataTable( {

      "pagingType": "full_numbers",

      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

      "pageLength": 10,

      "order": [[ 1, 'desc' ]],

      "processing" : true,
      
      "serverSide" : true,

      "ajax" :{ 
            "url":"cur_fetch.php", 
            "data":{ 
              "course":"<?php echo $course; ?>",
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

function reset(){
  $('#save_btnlbl').text('Save');
  $('#curriculumlbl').text('Add New Curriculum');
  $('#curriculum_form').trigger('reset');
  $('#curriculum_forms_new').show();
  $('#curriculum_forms').hide();
}


  $('#save_btn').click(function(){
    
    var ctdiv = $('#curtitle');
    var umsg = $('errorun');
    var curtitle = $('#curriculumtitle').val();
    var curcourse = $('#course').val();
    var curmajor = $('#major1').val();
    var buttonlbl = $('#save_btn').text();
    var curid = $('#curid').text();
    if(curtitle == ''){
        ctdiv.attr('errr','');
    }
    else{
      $.ajax({
        url:'process.php',
        method:'POST',
        data:{"addcurr":1,curid:curid,curtitle:curtitle,curcourse:curcourse,curmajor:curmajor,buttonlbl:buttonlbl},
        success:function(data)
        {
          if(data == "0"){
            ctdiv.attr('errr','');
            umsg.html('Curriculum Title is already exists.');
            $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#failedmsg").html('Curriculum Title is already exists.');
          }
          else if(data == "1"){ 
            $('#curriculum_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum added successfully.');
            $('#curr_table').DataTable().destroy();
            fetch_curriculum();
            reset();
            window.location.href = "curriculum-subjects?curriculumtitle="+curtitle+"&course="+curcourse+"&year=First Year";
          }
          else if(data == "updated"){ 
            $('#curriculum_modal').modal('hide');
            $( "div.success" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
            $("#successmsg").html('Curriculum updated successfully.');
            $('#curr_table').DataTable().destroy();
            fetch_curriculum();
            reset();
          }
        }
      });

    }
  });
</script>