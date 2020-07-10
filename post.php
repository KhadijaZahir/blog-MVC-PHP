<?php session_start();?>
<?php
    include("config/db.php");
    if(isset($_FILES['feat_image'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        if ($title != "" && $description != "" && $category != "") {
          $uploadok = 1;
          $file_name = $_FILES['feat_image']['name'];
          $file_size = $_FILES['feat_image']['size'];
          $file_tmp = $_FILES['feat_image']['tmp_name'];
          $file_type = $_FILES['feat_image']['type'];
          $target_dir = "assets/featuredimages";
          $target_file = $target_dir. basename($_FILES['feat_image']['name']);
          $check = getimageSize($_FILES['feat_image']['tmp_name']);
          $file_ext = strtolower(end(explode('.', $_FILES['feat_image']['name'])));
         $extensions = array("jpeg", "jpg", "png");
         if(in_array($file_ext, $extensions) == false){
           $msg = "please choose the image which has the extension as jpeg, jpg, png";
         }
         if(file_exists($target_file)){
           $msg = "story! file alreay exist";
         }
         if ($check == false) {
           $msg = "file is not an image";
         }
          if(empty($msg) == true){
            move_uploaded_file($file_tmp, "assets/featuredimages/" . $file_name );
            $url =$_SERVER['HTTP_REFERER'];
            $seg = explode('/', $url);
            $path = $seg[0]. '/'. $seg[1]. '/'. $seg[2]. '/'. $seg[3];
            $full_url = $path. '/'. 'assets/featuredimages/'.$file_name;
            $id = $_SESSION['id'];
            $sql = "INSERT INTO posts(title, description, category,feat_image, user_role) VALUES('$title', '$description', '$category', '$full_url', '$id')";

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

<?php if(! isset($_SESSION['username'])):?>
     <?php header('Location:dashboard.php');?>
<?php else:?>


<?php include("inc/header.php");?>

<div class="container">
<form class ="form-horizontal" action="post.php" method ="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>ADD POST</legend>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="title" class="col-lg-2 col-form-label">title</label>
                <div class="col-lg-10">
                    <input type="text" name="title" class="form-control" placeholder="title">
                </div>
                </div>
         </div>
    </div>


    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="description" class="col-lg-2 col-form-label">description</label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="description" rows="5" cols="10"></textarea>
                </div>
                </div>
         </div>
    </div>


    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="category" class="col-lg-2 col-form-label">category</label>
                <div class="col-lg-10">
                  <select class="form-control" name="category">
                      <option value="">select</option>
                      <option value="sport">sport</option>
                      <option value="technology">technology</option>
                      <option value="art">art</option>
                  </select>
                </div>
                </div>
         </div>
    </div>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="featuredimage" class="col-lg-2 col-form-label">Featured image</label>
                <div class="col-lg-10">
                    <input type="file" name="feat_image" class="form-control" placeholder="Featured image">
                </div>
                </div>
         </div>
    </div>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <div class="col-lg-10">
                    <input type="submit" name="post" value="Add post" class="btn btn-primary">
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
                </div>
         </div>
    </div>

   <div class="row">
       <div class="form-group">
           <div class="col-lg-60">
        <?php if(isset($_POST['posts'])):?>
             <div class="alert alert-dismissble alert-warning">
                   <p><?php echo $msg; ?></p>
             </div>
        <?php endif;?>
          </div>
       </div>
   </div>

      </fieldset>
</form>
</div>

<?php include("inc/footer.php");?>
<?php endif; ?>
