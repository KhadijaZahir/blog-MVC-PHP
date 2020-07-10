<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="col-lg-10">
          <a class="navbar-brand" href="#" style="color: #fff;">php blog application</a>
    </div>
    <div class="col-lg-2" style="margin-top:8px;">
       <div> <!--class="btn-group"-->
            <a href="#" style="background-color:#FFF;" class="btn btn-default">Settings</a>
            <a href="#" style="background-color:#FFF;"class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                 <span class="caret"></span>
            </a>
            <ul> <!--class="dropdown-menu"-->
              <?php $login_url = 'http://'. $_SERVER['SERVER_NAME']. $_SERVER['PHP_SELF'];?>
             <?php if($login_url == 'http://localhost/blogphp/index.php'):?>
               <li><a href="login.php">Login</a></li>
             <?php elseif(isset($_SESSION['username'])):?>
                   <li><a href="dashboard.php">dashboard</a></li>
                   <li><a href="profile.php"> add profile</a></li>
                   <li><a href="post.php">add post</a></li>
                   <li><a href="logout.php">logout</a> </li>
               <?php else:?>
                 <li><a href="index.php">Register</a></li>

            <?php endif;?>
              <!--<li><a href="dashboard.php">Login</a></li>
              -->
            </ul>
       </div>
    </div>
</nav>
