<?php
session_start();
include("config/db.php");
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email !="" && $password !=""){
         $passwd = sha1($password);
         $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passwd'";
         $result = mysqli_query($conn, $sql) or die('Error');
         if (mysqli_num_rows($result) > 0) {
           while($row = mysqli_fetch_assoc($result)){
             $id = $row['id'];
             $username = $row['username'];
             $password = $row['password'];
             $email = $row['email'];

            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location:dashboard.php');
           }
         }
         else{
            $error = 'username or passqord is incorrect';

         }
    }
    else{
      $error = 'falied to register user';
  }
}

?>

<?php if(isset($_SESSION['username'])):?>
     <?php header('Location:dashboard.php');?>
<?php else:?>


<?php include("inc/header.php");?>

<div class="container">
<form class ="form-horizontal" action="login.php" method ="POST">
  <fieldset>
    <legend>LOGIN USER</legend>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="email" class="col-lg-2 col-form-label">email</label>
                <div class="col-lg-10">
                    <input type="email" name="email" class="form-control" placeholder="email">
                </div>
                </div>
         </div>
    </div>


    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label for="password" class="col-lg-2 col-form-label">password</label>
                <div class="col-lg-10">
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                </div>
         </div>
    </div>

    <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <div class="col-lg-10">
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                  <button type="reset" class="btn btn-primary">Cancel</button>
                </div>
                </div>
         </div>
    </div>

   <div class="row">
       <div class="form-group">
           <div class="col-lg-60">
        <?php if(isset($_POST['login'])):?>
             <div class="alert alert-dismissble alert-warning">
                   <p><?php echo $error; ?></p>
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
