<?php

include('login_config.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $selection_query = mysqli_query($db,"SELECT email_id FROM login_details WHERE email_id = '$user_check' AND access_type = 'administrator'");

   $row = mysqli_fetch_array($selection_query,MYSQLI_ASSOC);

if($row > 0){
    $login_session = $row['email_id'];
    }
    else
    {
     header("location: ../administrator/administrator_dashboard.php");
    }


   if(!isset($_SESSION['login_user'])){
      header("location: ../index.php");
   }

?>
