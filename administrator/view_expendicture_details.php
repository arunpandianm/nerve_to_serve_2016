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

        <li class="selected">
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
        <li >
          <a href="../administrator/view_feedback.php">view feedback</a>
        </li>

      </ul>
    </div>
  </div>

  <div id="body">
    <div class="body">
<h2 align="center"><b>Complete Expendicture Summary</b></h2>
  <form action = "" method = "POST" autocomplete = "on">


      <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">

      <tr>
          <td align="right">Order By : </td>
          <td><select name="order_by">
          <option value="DESC">Descending Order</option>
          <option value="ASC">Ascending Order</option>
          </select></td>
      </tr>

      <tr>
          <td align="right">Sort By : </td>
          <td><select name="sort_by">
          <option value="year">Year</option>
          <option value="amount">Amount</option>
          </select></td>
      </tr>

      <tr>
          <td align="right">View All Expendicture :</td>
          <td><select name="view_all">
          <option value="1">YES</option>
          <option value="0">NO</option>
          </select></td>
      </tr>

      <tr>
          <td align="right">Year : </td>
          <td><input type="text" name="year" maxlength="4" autocomplete = "on" placeholder="YYYY"></td>
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
      $view_all = mysqli_real_escape_string($db,$_POST['view_all']);
      $year = mysqli_real_escape_string($db,$_POST['year']);

      $_SESSION['view_expendicture_order_by'] = $order_by;
      $_SESSION['view_expendicture_sort_column'] = $sort_column;
      $_SESSION['view_expendicture_year'] = $year;

	  $current_fund_query = "SELECT current_fund_amount, day, month, year, time1 FROM current_fund_amount WHERE id = '1'";
      $current_fund_amount = mysqli_query($db, $current_fund_query);

      if(mysqli_num_rows($current_fund_amount)> 0){
			while($row= mysqli_fetch_assoc($current_fund_amount)){
				print "<h1 align = 'center'> Current fund amount in trust : RS.". $row["current_fund_amount"] . " ";
				print " Date : ". $row["day"] ."/" . $row["month"] . "/" . $row["year"] ." ";
				print " Time : ". $row["time1"] . " </h1>";
			}
      }


if($view_all == '1'){
      $query = "SELECT expendicture_id, day, month, year, time1, description, amount_spend, spend_to_shop, current_fund_before, current_fund_after FROM expendicture_entry ORDER BY $sort_column $order_by ";
  }
  else{
    $query = "SELECT expendicture_id, day, month, year, time1, description, amount_spend, spend_to_shop, current_fund_before, current_fund_after FROM expendicture_entry WHERE year = '$year' ORDER BY $sort_column $order_by ";
  }


      $result = mysqli_query($db, $query);



			if(mysqli_num_rows($result)> 0){


					print "<table border = 1 cellspacing = 5px cellpadding = 5% ; align = center> <tr> <th> Expendicture ID </th> <th> Day </th> <th> Month </th> <th> Year </th> <th> Time </th> <th> Description </th> <th> Amount Spend </th> <th> Spend To  </th> <th> Current Fund Before </th> <th> Current Fund After </th> </tr>";

					while($row= mysqli_fetch_assoc($result)){
						print "<tr>";
            print "<td> ". $row["expendicture_id"] . "</td>";
						print "<td> ". $row["day"] . "</td>";
						print "<td> ". $row["month"]. "</td>";
						print "<td> ". $row["year"]. "</td>";
						print "<td> ". $row["time1"]. "</td>";
						print "<td> ". $row["description"]. "</td>";
						print "<td> ". $row["amount_spend"]. "</td>";
						print "<td> ". $row["spend_to_shop"]. "</td>";
						print "<td> ". $row["current_fund_before"]. "</td>";
						print "<td> ". $row["current_fund_after"]. "</td>";
						print "</tr>";
					}
					print "</table>";


          //download as excel


          print " <form align = 'center' action = 'admin_export_expendicture_details.php' method = 'post'>";

          print " <br><input type = 'submit' value = 'Export as Excel' name = 'export_excel' />";
          print " </form>";
			}
			else {
				 print "Entered year is InValid";
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
