 <div class="modal fade" id="available-modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changebtnid"></h5><h5 class="modal-title" id="subjectcode"></h5><h5 class="modal-title" id="subjecttitle"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
          </button>
        </div>
        <div class="modal-body">

          
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered">
  <thead>
   <tr class="table-bordered">
      <th scope="col" colspan="4"></th>
      <th scope="col" colspan="4" >Lecture&nbsp;Details</th>
      <th scope="col" colspan="4" >Other&nbsp;Details</th>
      <th scope="col" colspan="2" ></th>
    </tr>
    <tr>
      <th scope="col">Take</th>
      <th scope="col">Section</th>  
      <th scope="col">Course</th>  
      <th scope="col">Major</th>  
      <th scope="col">Day</th>  
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Room</th>
      <th scope="col">Day</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Room</th>
      <th scope="col" nowrap>No. of Student</th>
      <th scope="col" nowrap>Max. Student</th>
    </tr>
  </thead>
  <tbody id="getsched">

    <tr>
      <th scope="row">

      <!-- Check Box Start Here -->   
      <label class="container-check">
        <input type="checkbox">
        <span class="checkmark-check"></span>
      </label>
      <!-- Check Box End Here --> 
      </th>
      <td>sample</td>
      <td>sample</td>
      <td>sample</td>
      <td>sample</td>
      <td>sample</td>
      <td>sample</td>
      <td>sample</td>
      <td>sample</td>
    </tr>  

  </tbody>
</table>
</div>


<div class="modal-footer">

<button type="button" class="cancel" data-dismiss="modal" ripple><i class="fas fa-times"></i> CANCEL</button>

<button type="button" class="save" id="savebtn" style="display: none" ripple><i class="fas fa-save"></i><span id="savelbl"> CHANGE</span></button>


<button type="button" class="save" id="savebtn2" style="display: none" ripple><i class="fas fa-save"></i><span id="savelbl2"> CHANGE</span></button>

</div>

        </div>
      </div>
    </div>
  </div> <!-- Modal End -->

<div class="alert-box success">
  <i class="fas fa-check"></i> <span id="successmsg">Successful!</span>    
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<div class="alert-box failed">
  <i class="far fa-times-circle"></i> <span id="failedmsg">Failed!</span> 
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
</div>

<script type="text/javascript">
  
$(document).ready(function(){  

    $(document).on('click', '.cancel', function(){ 
      $('#available-modal').modal('hide');
    });


// change of schedule
var changeer2;
  $(document).on('click','button.changesched', function(){
    var id= $(this).attr("id");
    $('#savebtn').show();
    $('#savebtn2').hide();
    changeer2 = $(this).attr('name');
    var subjectcode= $('#scode'+id).text();
    var subjtitle= $('#stitle'+id+'').text();
    var units = $('#unit'+id+'').text();
    var rowid = id;
    $('#savelbl').text(' CHANGE');
    $('#subjectcode').html(subjectcode);
    $('#subjecttitle').html(" - "+subjtitle);
    $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"getscheddata":1,subjectcode:subjectcode,subjtitle:subjtitle,units:units,rowid:rowid},  
           success:function(data)  
           {    
                $('#getsched').fadeIn();  
                $('#getsched').html(data);
                $('#available-modal').modal('toggle');    
                $('#available-modal').modal('show');    
           }  
        });  
  });

var changeer;
  // change of schedule
  $(document).on('click','button.changesched2', function(){
    var id= $(this).attr("id");
    var er= $(this).attr("name");
    changeer = er;
    $('#savebtn2').show();
    $('#savebtn').hide();
    var subjectcode= $('#scode'+id).text();
    var subjtitle= $('#stitle'+id+'').text();
    var units = $('#unit'+id+'').text();
    var rowid = id;
    $('#savelbl2').text(' CHANGE');
    $('#subjectcode').html(subjectcode);
    $('#subjecttitle').html(" - "+subjtitle);
    $.ajax({  
           url:"process.php",  
           method:"POST",  
           data:{"getscheddata":1,subjectcode:subjectcode,subjtitle:subjtitle,units:units,rowid:rowid},  
           success:function(data)  
           {    
                $('#getsched').fadeIn();  
                $('#getsched').html(data);
                $('#available-modal').modal('toggle');    
                $('#available-modal').modal('show');    
           }  
        });  
  });

//getting schedule for new subject
  $(document).on('click', '#savebtn2', function(){

    if($('#savelbl2').text() == " SAVE")
    {
        var totalunit = Number($('#unit').text()) + Number($('#totalunit').text());
    }
    else
    {
      var totalunit = Number($('#totalunit').text());
    }
  if(totalunit <= 24)
  {
    var count = 0;
    var er = $('#er').text();
    var sc = $('#subjectcode').text();
    var st = $('#stitle').text();
    var un = $('#unit').text();
    var check = document.getElementsByName('check[]');
    var sec = document.getElementsByName('sec[]');
    var cou = document.getElementsByName('cou[]');
    var maj = document.getElementsByName('maj[]');
    var lecd = document.getElementsByName('lecd[]');
    var lecf = document.getElementsByName('lecf[]');
    var lect = document.getElementsByName('lect[]');
    var lecroom = document.getElementsByName('lecroom[]');
    var labd = document.getElementsByName('labd[]');
    var labf = document.getElementsByName('labf[]');
    var labt = document.getElementsByName('labt[]');
    var labroom = document.getElementsByName('labroom[]');
    var id = document.getElementsByName('id[]');
    var table = document.getElementById("editstudentdata");
    var totalrowcount = table.rows.length;
    if(totalrowcount == 0)
    {
      var tablecount = Number(totalrowcount) + 1;
    }
    else
    {
      var tablelastid = $('#editstudentdata td').last().attr('id');
      var tablecount = Number(tablelastid) + 1;
    }
    for(var i=0; i < check.length;i++)
    {
      if(check[i].checked)
      {
          if($('#savebtn2').text() == " SAVE")
          {
            
              $('#er'+er).hide();
              $('#editstudentdata').append('<tr id="cs'+tablecount+'"><th scope="row" name="sc'+tablecount+'" id="scode'+tablecount+'" nowrap>'+sc+'</th><td id="stitle'+tablecount+'" nowrap>'+st+'</td><td id="unit'+tablecount+'" nowrap>'+un+'</td><td id="sched'+tablecount+'" hidden>'+$(id[i]).text()+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap><button id="'+tablecount+'"  name="'+er+'" class="edit-user pull-xs-right changesched2" data-toggle="modal" data-target="#available-modal1" ripple><i class="fas fa-edit"></i> Change</button> <button id="'+tablecount+'"  name="er'+er+'" class="view-user pull-xs-right remove" ripple><i class="fas fa-trash-alt"></i> REMOVE</button></td><td id="'+tablecount+'" name="'+$(id[i]).text()+'" hidden></td></tr>');
              $('#available-modal1').modal('hide');

              var totunits = $('#totalunit').text();
              var total = Number(totunits) + Number(un);
              $('#totalunit').text(total); 
            }
            else
            { 

              var er2 = changeer;
              var tabledata = ('<th scope="row" name="sc'+er+'" id="scode'+er+'" nowrap>'+sc+'</th><td id="stitle'+er+'" nowrap>'+st+'</td><td id="unit'+er+'" nowrap>'+un+'</td><td id="sched'+er+'" hidden>'+$(id[i]).text()+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap name="'+er2+'"><button id="'+er+'"  name="'+er2+'" class="edit-user pull-xs-right changesched2" data-toggle="modal" data-target="#available-modal1" ripple><i class="fas fa-edit"></i> Change</button> <button id="'+er+'"  name="er'+er2+'" class="view-user pull-xs-right remove" ripple><i class="fas fa-trash-alt"></i> REMOVE</button></td><td id="'+er+'" name="'+$(id[i]).text()+'" hidden></td>');
              $('#available-modal1').modal('hide');

              $("#cs"+er+" th").eq(0).nextUntil("tr").remove();
              $('#editstudentdata tr#cs'+er+'').each(function(){
                 $('#cs'+er+'').html(tabledata);
              });
            }
      }
      else
      { count++;
      }
      if(check.length == count)
      {
         $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Please Choose A Schedule First.");
      }
    }
  }
  else
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Reach Maximum units.");
  }
  });
  


//getting schedule for enlisted subject
  $(document).on('click', '#savebtn', function(){

    if($('#savelbl').text() == " SAVE")
    {
        var totalunit = Number($('#unit').text()) + Number($('#totalunit').text());
    }
    else
    {
      var totalunit = Number($('#totalunit').text());
    }
  if(totalunit <= 24)
  {
    var count = 0;
    var er = $('#er').text();
    var sc = $('#subjectcode').text();
    var st = $('#stitle').text();
    var un = $('#unit').text();
    var check = document.getElementsByName('check[]');
    var sec = document.getElementsByName('sec[]');
    var cou = document.getElementsByName('cou[]');
    var maj = document.getElementsByName('maj[]');
    var lecd = document.getElementsByName('lecd[]');
    var lecf = document.getElementsByName('lecf[]');
    var lect = document.getElementsByName('lect[]');
    var lecroom = document.getElementsByName('lecroom[]');
    var labd = document.getElementsByName('labd[]');
    var labf = document.getElementsByName('labf[]');
    var labt = document.getElementsByName('labt[]');
    var labroom = document.getElementsByName('labroom[]');
    var id = document.getElementsByName('id[]');
    var table = document.getElementById("editstudentdata");
    var totalrowcount = table.rows.length;
    if(totalrowcount == 0)
    {
      var tablecount = Number(totalrowcount) + 1;
    }
    else
    {
      var tablelastid = $('#editstudentdata td').last().attr('id');
      var tablecount = Number(tablelastid) + 1;
    }
    for(var i=0; i < check.length;i++)
    {
      if(check[i].checked)
      { 
              var er2 = changeer2;
              // $('#cs'+er).remove();
              var tabledata = ('<th scope="row" name="sc'+er+'" id="scode'+er+'" nowrap>'+sc+'</th><td id="stitle'+er+'" nowrap>'+st+'</td><td id="unit'+er+'" nowrap>'+un+'</td><td id="sched'+er+'" hidden>'+$(id[i]).text()+'</td><td nowrap>'+$(sec[i]).text()+'</td><td nowrap>'+$(cou[i]).text()+'</td><td nowrap>'+$(maj[i]).text()+'</td><td nowrap>'+$(lecd[i]).text()+'</td><td nowrap>'+$(lecf[i]).text()+'</td><td nowrap>'+$(lect[i]).text()+'</td><td nowrap>'+$(lecroom[i]).text()+'</td><td nowrap>'+$(labd[i]).text()+'</td><td nowrap>'+$(labf[i]).text()+'</td><td nowrap>'+$(labt[i]).text()+'</td><td nowrap>'+$(labroom[i]).text()+'</td><td nowrap name="'+er2+'"><button id="'+er+'" name="'+er2+'" class="edit-user pull-xs-right changesched" data-toggle="modal" data-target="#available-modal1" ripple><i class="fas fa-edit"></i> Change</button> <button id="'+er+'" name="'+er2+'" class="delete-user pull-xs-right drop" data-toggle="modal" data-target="#yesorno" ripple><i class="fas fa-trash-alt"></i> DROP</button></td><td id="'+er+'" hidden></td>');
              $('#available-modal1').modal('hide');

              $("#cs"+er+" th").eq(0).nextUntil("tr").remove();
              $('#editstudentdata tr#cs'+er+'').each(function(){
                 $('#cs'+er+'').html(tabledata);
              });
      }
      else
      { count++;
      }
      if(check.length == count)
      {
         $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Please Choose A Schedule First.");
      }
    }
  }
  else
  {
    $( "div.failed" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
         $("#failedmsg").html("Reach Maximum units.");
  }
  });

//remove new subject added
  $(document).on('click', '.remove', function(){  
    var id = $(this).attr("id");
    var er = $(this).attr("name");
    var un = $('#unit'+id+'').text();
    var totunits = $('#totalunit').text();
    var total = Number(totunits) - Number(un);
    $('#totalunit').text(total); 
    $('#cs'+id+'').remove();
    $('#'+er+'').show();
  });

//undo dropped subject
  $(document).on('click', '.undo', function(){  
    var subid = $(this).attr("id");
    var un = $('#unit'+subid+'').text();
    var totunits = $('#totalunit').text();
    var max = $('#maxunits').text();
    var total = Number(totunits) + Number(un);
    if(total <= max)
    $('#totalunit').text(total); 
    $('#hide'+subid+'').hide(); 
    $('#hide2'+subid+'').hide(); 
    $("#cs"+subid+" th").eq(1).nextUntil("tr").show();
  });
});

</script>

