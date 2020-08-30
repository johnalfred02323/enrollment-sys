<style type="text/css">
  .table td, th {
   text-align: center;   
}
</style>



<!-- Modal Start -->
  <div class="modal fade" id="view-modal-summer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="summer-details">
        <div class="modal-header">
          <h5 class="modal-title" id="section">SUMMER</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

<div class="table-responsive">          
<table class="table table-striped table-bordered">
  <thead>
    <tr>
        <th colspan="3">Subject Details</th>
        <th colspan="3">Lecture Details</th>
        <th colspan="3">Other Details</th><th colspan="2"></th>
      </tr>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Title</th>
      <th scope="col">Unit</th>
      <th scope="col">Day</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">Day</th>
      <th scope="col">Time</th>
      <th scope="col">Room</th>
      <th scope="col">Faculty</th>
    </tr>
  </thead>
  <tbody id="schedlist">
  
  </tbody>
</table>
</div>


<div class="modal-footer">

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->



<!-- Modal Start -->
  <div class="modal fade" id="subject-summer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" id="summer-details">
        <div class="modal-header">
          <h5 class="modal-title" >SUMMER</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">
 <!-- Card Header - Dropdown -->
  <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

      <h6 class="m-0 font-weight-bold"><input type="text" class="input-table2" placeholder="Insert Section Here..." id="summersection"></th></h6>

      

  </div>
<div class="table-responsive">          
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Subject Code</th>
      <th scope="col">Subject Title</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="add-subject">
    <tr id="1" class="tr1">
      <th scope="col" id=""><input list="data" type="text" class="input-table2 code" name="1" placeholder="Insert Subject Code" id="subcode1"><datalist id="data"></datalist></th>
      <td id="stitle1" scope="col"></td>
      <td scope="col"><button id="1" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td>
    </tr>
  </tbody>
</table>
</div>

<button type="button" id="add-row" class="view-user pull-xs-right"><i class="fas fa-plus"></i> ADD ROW</button><br><br>

<div class="modal-footer">

<button type="button" class="delete-user" data-dismiss="modal" onclick="reset()" ripple><i class="fas fa-times"></i> CLOSE</button>
<button type="button" class="view-user" id="acceptsummer" ripple><i class="fas fa-check"></i> ACCEPT</button>   


</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->
<script type="text/javascript">
    function reset(){
  $('#summer-details').trigger('reset');
  $('#user_forms_new').show();
  $('#subject-summer').hide();
  }
  $(document).ready(function() {

    //getting subjects
             //for subject code  
             $.ajax({  
                url:"petition-summer-process.php",
               method:"POST",  
               data:{"searchsubject":1},  
               success:function(data)  
               {    
                  $('#data').html(data);
               }  
              });
    
      
    //add new subject for summer
    $('#add-row').click(function() {
      var id = $(this).attr("id");
      var count = $('#add-subject tr').last().attr('id');
      if(typeof count == "undefined")
      {
        count = '0';
      }
      var trid = Number(count)+1;
      $('#add-subject').append('<tr id="'+trid+'" class="tr'+trid+'"><th scope="col" id="'+trid+'"><input type="text" list="data" class="input-table2 code" placeholder="Insert Subject Code" name="'+trid+'" id="subcode'+trid+'"><datalist id="data"></datalist></th><td scope="col" id="stitle'+trid+'"></td><td scope="col"><button id="'+trid+'" class="delete-user pull-xs-right delete" ripple><i class="far fa-trash-alt"></i> REMOVE</button></td></tr>');
    });
    //remove subject
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      $('.tr'+id).remove(); 
    });
      //accepting summer sched
     $('#acceptsummer').click(function() {
      var c = 0;
      var dup = 0;
      var count = $('#add-subject tr').last().attr('id');
      var getsubject2 = 'add-summer?';
      var get_subject = '';
      var section = $('#summersection').val();
      if(section == '')
      {
        $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
        $("#failedmsg").html('Please Input Section');
      }
      else
      {
            for(var i = 1; i <= count; i++)
            {
              var subjcode = $('#subcode'+i).val();
              var subjtitle = $('#stitle'+i).text();
              if(typeof subjcode == 'undefined')
              {

              }
              else
              {
                  if(subjtitle == '')
                  {
                    c++;
                    (function() {
                    var $el = $('#'+i),
                    originalColor = $el.css("background");
                    $el.css("background", "#ffc1bd");
                    setTimeout(function () {
                        $el.css("background", originalColor);
                    }, 3000); })(i);
                  }
                  else
                  {
                      var duplicate = 0;
                       //for checking if duplicate subject inputted
                        for(var ii = 1; ii <= count; ii++)
                          {
                              var subjcode2 = $('#subcode'+ii).val();
                              if(typeof subjcode2 == 'undefined')
                              {

                              }
                              else
                              {
                                if(subjcode == subjcode2)
                                  {
                                    duplicate++;
                                  }
                              }
                          }

                        if(duplicate == 1)
                        {
                                  (function() {
                                    var $el = $('#'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#1C00ff00");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
                                   
                                  if( i == 1){get_subject = 'data'+i+'='+subjcode;}
                                  else{get_subject = '&data'+i+'='+subjcode;}
                                  getsubject2 = getsubject2+get_subject;
                        }
                        else
                        {
                                  (function() {
                                    var $el = $('#'+i),
                                    originalColor = $el.css("background");
                                    $el.css("background", "#a6c8ff");
                                    setTimeout(function () {
                                        $el.css("background", originalColor);
                                    }, 3000); })(i);
                                  
                                  dup++; 
                        }
                    }
              }        
            }
              if(c > 0 && dup > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Invalid Subject Code and Duplicate Subject');
              }
              else if(c > 0)
              {
                $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                $("#failedmsg").html('Invalid Subject Code');
              }
              else if (dup > 0)
              {
                 $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
                 $("#failedmsg").html('Duplicate Subject Code');
              }
              else
              {
                  var section =$('#summersection').val();
                  window.location.href = getsubject2+'&section='+section;
              }
      }
     });

    //getting subjects details
         $(document).on('keyup', '.code', function(){
            var id = $(this).attr("name");
             var query = $(this).val();
              //subject details
               $.ajax({  
                url:"petition-summer-process.php",
               method:"POST",  
               data:{"searchsubjectdetails":1,query:query},  
               success:function(data)  
               { 
                  $('#stitle'+id).text(data);
               }  
            }); 
        });


  });
</script>