<?php

	$error = "Please provide your Login ID and password";

   	include("php/login_config.php");
   	session_start();

   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

	  $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $query = "SELECT access_type FROM login_details WHERE (email_id = '$myusername' AND password = '$mypassword' )";
      $result = mysqli_query($db,$query);
      $row = mysqli_fetch_assoc($result);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
		 switch($row['access_type'])
		 {
			 case "administrator":
			 {
				$_SESSION['login_user'] = $myusername;
				header("location: ../administrator/administrator_dashboard.php");
				break;
			 }

			 case "visitor":
			 {
				$_SESSION['login_user'] = $myusername;
				header("location: ../visitor/visitor_dashboard.php");
				break;
			 }
        }
	  }else {
         $error = "Your Login ID or Password is invalid";
      }
   }

?>



<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta name="author" content="arunpandian">
  <meta name="keyword" content="nerve, serve, charity">

  <title>Nerve to Serve Login Form</title>
  		<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen">
		<script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div >Nerve<span>2</span>Serve</div>
		</div>
		<br>

		<div class="login">
		<form action = "" method = "POST" autocomplete = "on">
				<input type="text" autofocus = "autofocus" required = "required" placeholder="Email ID or Username" name="username"><br>
				<input type="password" autocomplete = "off" required = "required" placeholder="password" name="password"><br>
				<input type="submit" value="Login" name = "submit">
		</form>
		<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
		</div>

	  <script src="js/jquery.js"></script>

</body>

</html>
