<?php

if(isset($_POST["limit"], $_POST["start"]))
{

include('../../config/config.php');

 $query = "SELECT * FROM news ORDER BY created_at DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = mysqli_query($conn, $query);

 while($row = mysqli_fetch_array($result))
 {
  echo '

            <div class="card shadow-sm mb-4 view_data" data-toggle="modal" id="'.$row['id'].'" data-target="#dataModal">
                <div class="card-header py-3">
                  <h6 class="m-0 text-muted">Date: '.date('F d , Y \a\t\ g:i A',strtotime($row['created_at'])).'</h6>
                </div>';



      //if image row is Null, the div of image is not displayed because height
      if ($row['image'] == null) {

          echo ' <div class="thumb-post" style="display:none;">
                  <img class="card-img-top rounded-0" src="admin/registrar/news/images/'.$row['image'].'" alt="'.$row['image'].'">
                </div> ';
      }

      else {
          echo ' <div class="thumb-post" style="display:block;">
                  <img class="card-img-top rounded-0" src="admin/registrar/news/images/'.$row['image'].'" alt="'.$row['image'].'">
                </div> ';
      }


          echo '<div class="card-body">

                  <h4 class="card-title title-color text-break">'.$row["title"].'</h4>

                  <div class="border-post">';



  $content = $row["content"];

  if (strlen($content) > 200)
  {
    $content = substr($content, 0,200)."<b>. . .</b>";
  }

                  
                echo '<p class="text-break">'.$content.'</p>

                  </div>
                </div>

              </div>

  ';
 }
}

?>



<script type="text/javascript">
$(document).ready(function() {
	var id;

$('.view_data').click(function(){  
     var view_posts = $(this).attr("id");  
     $.ajax({  
          url:"src/public-page/view-data.php",  
          method:"post",  
          data:{view_posts:view_posts},  
          success:function(data){  
               $('#post_detail').html(data);  
               $('#dataModal').modal("show");  
          }  
     });  
}); 

});
</script>