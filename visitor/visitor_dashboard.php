<?php
   include "../php/visitor_session.php";
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Nerve 2 Serve</title>

	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body >
	<div id="header">
		<div>

			<a href="../visitor/visitor_dashboard.php" class="logo"><img src="../images/logo.png" alt=""></a>
			<p><h1>Visitor Dashboard | Welcome <span style="color: green"><?php echo $login_session; ?></span></h1>

      <h2 align="right"><a href = "../php/logout.php">Log Out</a></h2></p>
		</div>
		<div class="navigation">
			<ul>

				<li class="selected">
					<a href="../visitor/visitor_dashboard.php">funds</a>
				</li>

				<li>
					<a href="../visitor/visitor_view_expendicture_details.php">expendicture</a>
				</li>
				<li >
          		<a href="../visitor/visitor_feed_back.php">feedback</a>
        		</li>



			</ul>
		</div>
	</div>

	<div id="body">
		<div class="body">

	<h2 align="center"><b>Visitor Funds Summary</b></h2>
	<form action = "" method = "POST" autocomplete = "on">

	<table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">

		<tr>
            <td align="right">Order By : </td>
            <td><select name="order_by">
				<option value="ASC">Ascending Order</option>
				<option value="DESC">Descending Order</option>
				</select></td>
       	</tr>

		<tr>
            <td align="right">Sort By : </td>
            <td><select name="sort_by">
				<option value="amount">Amount</option>
				<option value="year">Year</option>
				</select></td>
       	</tr>

		<tr>
            <td align="right">Email ID : </td>
            <td><input type="text" name="email_id" required = "required" maxlength="30" placeholder="Enter the Email ID"></td>
       	</tr>

		<tr >
			<td align="right"><input type="submit" value="Filter the View" name = "submit"></td>
			<td ><input type="button" value="Refresh the Site" onClick="window.location.href=window.location.href" ></td>
		</tr>
		</table>
		</form>


<?php

include "../php/login_config.php";

   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // data sent from form
	  $order_by = mysqli_real_escape_string($db,$_POST['order_by']);
      $sort_column = mysqli_real_escape_string($db,$_POST['sort_by']);
      $email_id = mysqli_real_escape_string($db,$_POST['email_id']);

      $_SESSION['view_fund_order_by'] = $order_by;
      $_SESSION['view_fund_sort_column'] = $sort_column;
      $_SESSION['view_fund_email_id'] = $email_id;


	  $current_fund_query = "SELECT current_fund_amount, day, month, year, time1 FROM current_fund_amount";
      $current_fund_amount = mysqli_query($db, $current_fund_query);

      if(mysqli_num_rows($current_fund_amount)> 0){
			while($row= mysqli_fetch_assoc($current_fund_amount)){
				print "<h1 align = 'center'> Current fund amount in trust : ₨.". $row["current_fund_amount"] . " ";
				print " Date : ". $row["day"] ."/" . $row["month"] . "/" . $row["year"] ." ";
				print " Time : ". $row["time1"] . " </h1>";
			}
      }



      $query = "SELECT email_id, first_name, last_name, amount, day, month, year, time1 FROM account_summary WHERE email_id = '$email_id' ORDER BY $sort_column $order_by ";
      $result = mysqli_query($db, $query);



			if(mysqli_num_rows($result)> 0){


					print "<table border = 1 cellspacing = 5px cellpadding = 5% ; align = center> <tr> <th> Email ID </th> <th> First Name </th> <th> Last Name </th> <th> Amount </th> <th> Day </th> <th> Month </th> <th> Year </th> <th> Time </th> </tr>";

					while($row= mysqli_fetch_assoc($result)){
						print "<tr>";
						print "<td> ". $row["email_id"] . "</td>";
						print "<td> ". $row["first_name"]. "</td>";
						print "<td> ". $row["last_name"]. "</td>";
						print "<td> ". $row["amount"]. "</td>";
						print "<td> ". $row["day"]. "</td>";
						print "<td> ". $row["month"]. "</td>";
						print "<td> ". $row["year"]. "</td>";
						print "<td> ". $row["time1"]. "</td>";
						print "</tr>";
					}
					print "</table>";



//download as excel


					print " <form align = 'center' action = 'visitor_export_fund_details.php' method = 'post'>";

					print " <br><input type = 'submit' value = 'Export as Excel' name = 'export_excel' />";
					print " </form>";



			}
			else {
				 print "Entered Email ID is InValid";
			}

	}
	else{
		$error = "sample error";
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
						<a href="#">Funds Credit</a>
					</li>
					<li>
						<a href="#">Funds Debit</a>
					</li>
					<li>
						<a href="#">Funds Modify</a>
					</li>
					<li>
						<a href="../visitor/visitor_dashboard.php">View Funds Details</a>
					</li>
				</ul>
			</div>
			<div class="tweets">
				<h3>expendicture subdomain</h3>
				<ul>
					<li>
						<a href="#">Expendicture Credit</a>
					</li>
					<li>
						<a href="#">Expendicture Debit</a>
					</li>
					<li>
						<a href="#">Expendicture Modify</a>
					</li>
					<li>
						<a href="../visitor/visitor_view_expendicture_details.php">Expendicture Details</a>
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
					<a href="../visitor/visitor_dashboard.php">funds</a>
				</li>
				<li>
					<a href="../visitor/visitor_view_expendicture_details.php">expendicture</a>
				</li>
				<li>
					<a href="../visitor/visitor_feed_back.php">feed back</a>
				</li>
				<li>
					<a href="#">contact</a>
				</li>

			</ul>
		</div>
	</div>
</body>
</html>
