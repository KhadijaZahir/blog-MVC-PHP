<?php session_start();?>
<?php
    include("config/db.php");
    if(isset($_FILES['feat_image'])){
        $post_id = $_POST['id'];
        $upl_feat_image = $_POST['feat_image'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
         /*
        $data = array(
          'id' => $post_id,
          'title' => $title,
          'description' => $description,
          'category' => $category,
          'upl_feat_image' => $upl_feat_image,
        );
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
       */

        if ($title != "" && $description != "" && $category != "") {
          $uploadok = 1;
          $file_name = $_FILES['feat_image']['name'];
          $file_size = $_FILES['feat_image']['size'];
          $file_tmp = $_FILES['feat_image']['tmp_name'];
          $file_type = $_FILES['feat_image']['type'];
          $target_dir = "assets/featuredimages";
          $target_file = $target_dir. basename($_FILES['feat_image']['name']);
          $check = getimageSize($_FILES['feat_image']['tmp_name']);
          //$file_ext = strtolower(end(explode('.', $_FILES['feat_image']['name'])));
          $split = explode('.', $_FILES['feat_image']['name']);
          $file_ext = strtolower(end($split));

         $extensions = array("jpeg", "jpg", "png");
         if(in_array($file_ext, $extensions) == false){
           $msg = "please choose the image which has the extension as jpeg, jpg, png";
         }
         if(file_exists($target_file)){
           $msg = "sorry! file alreay exist";
         }
         if ($check == false) {
           $msg = "file is not an image";
         }
          if(empty($msg) == true){
            move_uploaded_file($file_tmp, "assets/featuredimages/" . $file_name );
            $url =$_SERVER['HTTP_REFERER'];
            $seg = explode('/', $url);
            $path = $seg[0]. '/'. $seg[1]. '/'. $seg[2]. '/'. $seg[3];
            $image_path = explode('/', $upl_feat_image);
            $image = $image_path[6];
            $full_url = $path. '/'. 'assets/featuredimages/'.$file_name;
            $id = $_SESSION['id'];
            $sql = "UPDATE posts
                    SET title = '$title', description = '$description', category = '$category',feat_image = '$full_url'
                    WHERE id = '$post_id'";
            unlink("assets/featuredimage/".$image);
            $query = $conn->query($sql);
            if ($query) {
              header('Location:dashboard.php');
            }
            else {
             $msg = 'failed to upload image';
            }
          }
        }
        else{
           $msg = "please fill all the details";
        }
    }
 ?>
