<?php session_start();?>
<?php if(!isset($_SESSION['username'])):?>
      <?php header('Location:dashboard.php');?>

<?php else:?>
   <?php
       include("config/db.php");
       echo $id = $_GET['id'];
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

<?php include("inc/header.php");?>

<div class="container">
<form class ="form-horizontal" action="update.php" method ="POST" enctype="multipart/form-data">
   <input type="hidden" name="id" value=<?php echo $id;?>>
  <fieldset>
    <legend>UPDATE POST</legend>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="title" class="col-lg-2 col-form-label">title</label>
                <div class="col-lg-10">
                    <input type="text" name="title" value=<?php echo $title;?>  class="form-control" placeholder="title">
                </div>
                </div>
         </div>
    </div>


    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="description" class="col-lg-2 col-form-label">description</label>
                <div class="col-lg-10">
                  <textarea class="form-control" name="description" rows="5" cols="10"><?php echo $description;?></textarea>
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
                      <option value=<?php echo $category;?>><?php echo $category;?></option>
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
                    <input type="submit" name="post" value="update post" class="btn btn-primary">
                  <a href=dashboard.php class="btn btn-primary">Back</a>
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
<?php endif;?>
