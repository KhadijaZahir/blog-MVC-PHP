<?php
    session_start();
    include("config/db.php");
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $feat_image = $_POST['feat_image'];
        $seg = explode('/', $feat_image);
        $image = $seg[6];
        $sql = "DELETE FROM posts WHERE id = $id";
        $query = $conn->query($sql);
        unlink("assets/featuredimage".$image);
        if($query){
          header("Location:dashboard.php");
        }
    /*$data = array(
       'id' => $post_id,
       'feat_image' => $feat_image,
     );
     print_r($data); */
   }
 ?>
