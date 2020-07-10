<?php session_start();?>
<?php if(!isset($_SESSION['username'])):?>
      <?php header('Location:dashboard.php');?>

<?php else:?>
<?php include("inc/header.php");?>
<?php include("config/db.php");?>

<div class="container">
         <h1>view post</h1>
             <?php echo $id = $_GET['id'];?>
             <?php
             $posts_query = "SELECT * FROM posts WHERE id ='$id'";
             $posts_result = mysqli_query($conn, $posts_query) or die("error");
             if (mysqli_num_rows($posts_result) > 0) {
               while ($posts = mysqli_fetch_assoc($posts_result)) {
                   $id = $posts['id'];
                   $title = $posts['title'];
                   $description = $posts['description'];
                   $category = $posts['category'];
                   $feat_image = $posts['feat_image'];
                }
              }
             ?>
                     <div class="row">
                                   <h1 style="text-align: center;"><?php echo $title;?></h1>
                                   <div class="col-lg-12">
                                       <img src=<?php echo $feat_image;?> style="width: 300px; height: 300px;">

                                   </div>
                                   <div class="col-lg-8">
                                      <p><?php echo $description;?></p>
                                      <a href="#"><?php echo $category;?></a>
                                      <div class="row">
                                             <div class="col-lg-8">
                                                     <div class="col-lg-2">
                                                         <a href="#">like (0)</a>
                                                     </div>
                                                     <div class="col-lg-2">
                                                            <a href="#">dislike (0)</a>
                                                     </div>
                                                     <div class="col-lg-2">
                                                            <a href="#">comment (0)</a>
                                                     </div>
                                             </div>
                                      </div>
                                  </div>

                        </div>

</div>

<?php include("inc/footer.php");?>
<?php endif;?>
