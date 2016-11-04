<?php
   include "../php/admin_session.php";
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

      <a href="../administrator/administrator_dashboard.php" class="logo"><img src="../images/logo.png" alt=""></a>
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
        <li >
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
        <li  class="selected">
          <a href="../administrator/view_feedback.php">view feedback</a>
        </li>

      </ul>
    </div>
  </div>

  <div id="body">
    <div class="body">
<h2 align="center"><b>Visitor's Feedback</b></h2>

<?php

include "../php/login_config.php";

      $query = "SELECT name, email_id, subject, comment FROM visitor_feedback ";

      $result = mysqli_query($db, $query);

			if(mysqli_num_rows($result)> 0){


					print "<table border = 1 cellspacing = 5px cellpadding = 5% ; align = center> <tr> <th> Name </th> <th> Email ID </th> <th> Subject </th> <th> Comment </th></tr>";

					while($row= mysqli_fetch_assoc($result)){
						print "<tr>";
						print "<td> ". $row["name"] . "</td>";
						print "<td> ". $row["email_id"]. "</td>";
						print "<td> ". $row["subject"]. "</td>";
						print "<td> ". $row["comment"]. "</td>";
						print "</tr>";
					}
					print "</table>";


          //download as excel

          print " <form align = 'center' action = 'admin_export_visitor_feedback.php' method = 'post'>";

          print " <br><input type = 'submit' value = 'Export as Excel' name = 'export_excel' />";
          print " </form>";
			}
			else {
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
