<?php  
require "../../config/config.php";

 if(isset($_POST["view_posts"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM news WHERE id = ".$_POST["view_posts"]." ";  
      $result = mysqli_query($conn, $query);  
  
      while($row = mysqli_fetch_array($result))
      {  
    $output .= '


      <div class="modal-header">
        <p class="modal-title text-muted" id="exampleModalLongTitle"></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
        </button>
      </div>';



      //if image row is Null, the div of image is not displayed because height
      if ($row['image'] == null) 
        {
      $output .= '<div class="view-post" style="display:none;">
                 <img class="card-img-top" src="" alt="">
                 </div>';
        }
      else
            {
      $output .= '<div class="view-post" style="display:block;">
                  <img class="card-img-top" src="../../admin/registrar/images/'.$row['image'].'" alt="'.$row['image'].'" style="cursor: zoom-in" data-enlargable>
                  </div>';
            }
    

$output .= '

      <div class="modal-body">

      <h4 class="card-title title-color text-break">'.$row["title"].'</h4>

<div class="border-post">

      <p class="card-text text-break">'.$row['content'].'</p>

</div>


      </div>

      <div class="modal-footer d-flex justify-content-between">
        <p class="text-muted">Date: '.date('F d , Y \a\t\ g:i A',strtotime($row['date_posted'])).'</p>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>


      ';  
      }  
 
      echo $output;  
}  
?>


<!-- click images to fullscreen -->
<script type="text/javascript">
  $('img[data-enlargable]').addClass('img-enlargable').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'black url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});
</script>