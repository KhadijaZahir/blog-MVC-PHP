<?php
   session_start();
 ?>
 <?php
    include("config/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT * FROM profile WHERE id = '$id'";
    $result = mysqli_query($conn, $query) or die('error');
    if(mysqli_num_rows($result) > 0){
      while ($row == mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $avatar = $row['avatar'];
              $profession = $row['profession'];
      }
    }

  ?>
 <?php if(!$_SESSION['username']):?>
      <?php header('Location:login.php');?>
<?php else:?>
 <?php include("inc/header.php");?>
      <div class="container">
      <?php
           $url = $_SERVER['PHP_SELF'];
           $seg = explode('/', $url);
           $path = "http://localhost/".$seg[0].'/'.$seg[1];
           $full_url = $path.'/'.'img'.'/'.'avatar.png';
       ?>
       <?php if ($_SESSION['id'] == 1):?>
         <h1>Admin Dashboard</h1>
      <?php else:?>
          <h1>Users Dashboard</h1>
       <?php endif; ?>
       <h1 style="text-align: center;"><?php echo $_SESSION['username'];?> </h1>
       <div class="row">
           <div class="col-lg-12">
              <p style="text-align: center;">
                <?php if(isset($avatar)):?>
                <img src=<?php echo $avatar;?> style= "width:200px; height: 200px; border-raduis:50%" />
                <h4 style="text-align: center;"><?php echo $profession;?></h4>
              <?php else:?>
                 <img src=<?php ECHO $full_url;?>>
              <?php endif;?>
              </p>
           </div>
            <h1 style="text-align: center;">ALL POSTS</h1>
       </div>
       <?php
       $posts_query = "SELECT * FROM posts";
       $posts_result = mysqli_query($conn, $posts_query) or die("error");
       if (mysqli_num_rows($posts_result) > 0) {
         while ($posts = mysqli_fetch_assoc($posts_result)) {
             $id = $posts['id'];
             $title = $posts['title'];
             $description = $posts['description'];
             $category = $posts['category'];
             $feat_image = $posts['feat_image'];
       ?>

       <div class="row">
         <div class="col-lg-2">
              <img src=<?php echo $feat_image;?> style="width: 150px; height: 150px;">
         </div>
         <div class="col-lg-10">
            <h3><a href="#"><?php echo $title;?></a> </h3>
            <p><?php echo $description;?></p>
            <a href="#"><?php echo $category;?></a>
            <div class="row">
                    <?php if($_SESSION['id'] != 1):?>
                    <div class="col-lg-1"> <a href=view.php?id=<?php echo $id;?>>VIEW</a></div>
                    <?php else:?>
                    <div class="col-lg-1"> <a href=view.php?id=<?php echo $id;?>>VIEW</a></div>
                    <div class="col-lg-1"> <a href=edit.php?id=<?php echo $id;?>>EDIT</a></div>
                    <div class="col-lg-1">
                      <form action="delete.php" method="POST">
                            <input type="hidden" name="id" value=<?php echo $id;?>>
                            <input type="submit" name="delete" value="DELETE" class="btn btn-primary" style="background: none; color:#337ab7; border:none;">
                      </form>
                    </div>
          <?php endif;?>
         </div>

       </div>
       <?php
         }
       }
  ?>
</div>
 <?php include("inc/footer.php");?>
<?php endif;?>
