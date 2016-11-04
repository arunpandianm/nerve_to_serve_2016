<?php

include('login_config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $selection_query = mysqli_query($db,"select email_id from login_details where email_id = '$user_check'");

   $row = mysqli_fetch_array($selection_query,MYSQLI_ASSOC);

   $login_session = $row['email_id'];

   if(!isset($_SESSION['login_user'])){
      header("location: ../index.php");
   }
?>
