<?php session_start();?>
<?php
    include("config/db.php");
    if(isset($_FILES['avatar'])){
        $profession = $_POST['profession'];
        if ($profession != "") {
          $uploadok = 1;
          $file_name = $_FILES['avatar']['name'];
          $file_size = $_FILES['avatar']['size'];
          $file_tmp = $_FILES['avatar']['tmp_name'];
          $file_type = $_FILES['avatar']['type'];
          $target_dir = "assets/uploads";
          $target_file = $target_dir. basename($_FILES['avatar']['name']);
          $check = getimageSize($_FILES['avatar']['tmp_name']);
          //$file_ext = strtolower(end(explode('.', $_FILES['avatar']['name'])));

          $split = explode('.', $_FILES['avatar']['name']);
          $file_ext = strtolower(end($split));

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
            move_uploaded_file($file_tmp, "assets/uploads/" . $file_name );
            $url =$_SERVER['HTTP_REFERER'];
            $seg = explode('/', $url);
            $path = $seg[0]. '/'. $seg[1]. '/'. $seg[2]. '/'. $seg[3];
            $full_url = $path. '/'.'assets/uploads/'.$file_name;
            $id = $_SESSION['id'];
            $sql = "INSERT INTO profile(profession, avatar, user_role) VALUES('$profession', '$full_url', '$id')";

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

<?php if(!isset($_SESSION['username'])):?>
     <?php header('Location:dashboard.php');?>
<?php else:?>

<?php include("inc/header.php");?>

<div class="container">
<form class ="form-horizontal" action="profile.php" method ="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>ADD PROFILE</legend>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="profession" class="col-lg-2 col-form-label">profession</label>
                <div class="col-lg-10">
                    <input type="text" name="profession" class="form-control" placeholder="profession">
                </div>
                </div>
         </div>
    </div>


    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="avatar" class="col-lg-2 col-form-label">avatar</label>
                <div class="col-lg-10">
                    <input type="file" name="avatar" class="form-control" placeholder="avatar">
                </div>
                </div>
         </div>
    </div>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <div class="col-lg-10">
                    <input type="submit" name="profile" value="Add profile" class="btn btn-primary">
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
                </div>
         </div>
    </div>

   <div class="row">
       <div class="form-group">
           <div class="col-lg-60">
        <?php if(isset($_POST['profile'])):?>
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
