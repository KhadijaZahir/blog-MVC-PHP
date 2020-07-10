<?php
include("config/db.php");
if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($username !='' && $email !='' && $password !=''){
        $pwd_hash = sha1($password);
        $sql = "INSERT INTO users(username, email, password, user_role) VALUES('$username', '$email', '$pwd_hash', 0)";
        $query = $conn->query($sql);
        if($query){
           header('Location:login.php');
        }
        else{
            $error = 'falied to register user';
        }
    }
    else{
        $error = 'please fill all detalis';
    }
}

?>



<?php include("inc/header.php");?>

<div class="container">
<form class ="form-horizontal" action="index.php" method ="POST">
  <fieldset>
    <legend>REGISTER USER</legend>
    <div class="row">
         <div class="col-md-6">
            <div class="form-group">
                <label for="username" class="col-lg-2 col-form-label">username</label>
                <div class="col-lg-10">
                    <input type="text" name="username" class="form-control" placeholder="username">
                </div>
            </div>
         </div>
    </div>

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
                    <input type="submit" value="register" name="register" class="btn btn-dark">
                  <button type="reset" class="btn btn-dark">Cancel</button>
                </div>
                </div>
         </div>
    </div>

   <div class="row">
       <div class="form-group">
           <div class="col-lg-60">
        <?php if(isset($_POST['register'])):?>
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
<script type="text/javascript" src="assets/js/jquery-3.1.0.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
