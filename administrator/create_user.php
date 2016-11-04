<?php
   include "../php/admin_session.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="arunpandian">
	<title>Nerve 2 Serve</title>

	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div>

			<a href="../administrator/administrator_dashboard.php" class="logo"><img src="../images/logo.png" alt=""></a>
			<p>
			<p><h1>Administrator Dashboard | Welcome <span style="color: green"><?php echo $login_session; ?></span></h1>
      <h2 align="right"><a href = "../php/logout.php">Log Out</a></h2></p>
		</div>
		<div class="navigation">
			<ul>

				<li >
					<a href="../administrator/administrator_dashboard.php">funds</a>
					<ul>
						<li>
							<a href="../administrator/administrator_dashboard.php">funds credit</a>
						</li>
						<li>
							<a href="../administrator/view_fund_details.php">view funds details</a>
						</li>
						<li>
						<a href="../administrator/edit_fund_details.php">Funds Modify</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="../administrator/expenditure_entry.php">expendicture</a>
					<ul>
						<li>
							<a href="../administrator/expenditure_entry.php">expendicture entry</a>
						</li>
						<li>
							<a href="../administrator/view_expendicture_details.php">view expendicture</a>
						</li>
						<li>
              				<a href="../administrator/edit_expendicture_details.php">modify expendicture</a>
            			</li>

					</ul>
				</li>

				<li class="selected">
					<a href="../administrator/create_user.php">user account</a>
					<ul>
						<li>
							<a href="../administrator/create_user.php">create user</a>
						</li>
						<li>
							<a href="../administrator/delete_user.php">delete user</a>
						</li>
						<li>
							<a href="../administrator/change_password.php">change password</a>
						</li>
					</ul>
				</li>

				<li >
					<a href="../administrator/view_feedback.php">view feedback</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="body">

		<form  method = "POST" action="">
    	<h2 align="center"><b> User Account creation</b></h2>
    	<table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">
        <tr>
              <td align="right">Email ID : </td>
              <td><input type="text" name="email_id" maxlength="30" autocomplete = "on" required = "required" autofocus = "autofocus" placeholder="Enter the Email ID"></td>
       </tr>

       <tr>
              <td align="right">Password : </td>
              <td><input type="password" name="password" maxlength="15" required = "required" placeholder="Enter the password"></td>
       </tr>

       <tr>
              <td align="right">Access Type : </td>
              <td><select name="access_type" required = "required">
                <option value="administrator">Administrator</option>
                <option value="visitor">Visitor</option>
                </select></td></tr>

        <tr>
        <td align="right"> <input type="submit" value="Create User" /></td>
        <td> <input type="reset" value="Reset the Form" /></td>
        </tr>
        </table>
    	</form>



<?php
include "../php/login_config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $access_type = mysqli_real_escape_string($db, $_POST['access_type']);
//insert user into database
    $add_fund_query = "INSERT INTO `login_details` (`email_id`, `password`, `access_type`) VALUES ('$email_id', '$password', '$access_type');";

    $result = mysqli_query($db, $add_fund_query);
    if($result == 1){
    print "User added successfully";
    }
    else
    {
    print "User not added Error!!!";
    }


}
else
{
  $error = "dummy error message";
}
?>
		</div>

	</div>
	<div id="footer">
		<div>
			<div class="contact">
				<h3>contact information</h3>
				<ul>
					<li>
						<h3>Created by Arunpandian(final cse A)</h3>
					</li>
					<li>
						<b>mobile no:</b> <span>90-425-33-101</span>
					</li>
					<li>
						<b>email:</b> <span><a target = "_blank" href="http://www.mail.google.com">arunpandianm04@gmail.com</a></span>
					</li>
				</ul>
			</div>
			<div class="tweets">
				<h3>funds subdomain</h3>
				<ul>
					<li>
						<a href="../administrator/administrator_dashboard.php">Funds Credit</a>
					</li>
					<li>
						<a href="#">Funds Debit</a>
					</li>
					<li>
						<a href="../administrator/edit_fund_details.php">Funds Modify</a>
					</li>
					<li>
						<a href="../administrator/view_fund_details.php">View Funds Details</a>
					</li>
				</ul>
			</div>
			<div class="tweets">
				<h3>expendicture subdomain</h3>
				<ul>
					<li>
						<a href="../administrator/expenditure_entry.php">Expendicture Credit</a>
					</li>
					<li>
						<a href="#">Expendicture Debit</a>
					</li>
					<li>
						<a href="../administrator/edit_expendicture_details.php">Expendicture Modify</a>
					</li>
					<li>
						<a href="../administrator/view_expendicture_details.php">Expendicture Details</a>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h3>stay in touch</h3>
				<p>
					We are happy to stay connected with you through social media...
				</p>
				<ul>
					<li id="facebook">
						<a href="#">facebook</a>
					</li>
					<li id="twitter">
						<a href="#">twitter</a>
					</li>
					<li id="googleplus">
						<a href="#">googleplus</a>
					</li>
				</ul>

			</div>
		</div>
		<div class="section">
			<p>
				Nerve 2 Serve &copy; 2016
			</p>
			<ul>

				<li>
					<a href="../administrator/administrator_dashboard.php">funds</a>
				</li>
				<li>
					<a href="../administrator/expenditure_entry.php">expendicture</a>
				</li>
				<li>
					<a href="../administrator/create_user.php">user account</a>
				</li>
				<li>
					<a href="#">contact</a>
				</li>

			</ul>
		</div>
	</div>
</body>
</html>
