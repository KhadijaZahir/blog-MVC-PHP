<?php
//connection to db
  $server = "localhost";
  $user = "root";
  $password = "";
  $dbname = "blogphp";

  $conn = mysqli_connect($server, $user, $password, $dbname);
  if (!$conn) {
      die("connection failed". mysqli_connect_error());
  }
//   else {
//       echo"connection established";
//   }
  //connection to db

?>
