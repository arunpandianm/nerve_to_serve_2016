
<?php
   
include "../php/login_config.php";
include "../php/session.php";
	
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // data sent from form
	  /*
	  $order_by = mysqli_real_escape_string($db,$_POST['order_by']);
      $sort_column = mysqli_real_escape_string($db,$_POST['sort_by']); 
      $email_id = mysqli_real_escape_string($db,$_POST['email_id']); 
*/
 
	  $order_by = $_SESSION['view_fund_order_by'];
      $sort_column = $_SESSION['view_fund_sort_column'];
       $email_id = $_SESSION['view_fund_email_id'];
     
	  $current_fund_query = "SELECT current_fund_amount, day, month, year, time1 FROM current_fund_amount";
      $current_fund_amount = mysqli_query($db, $current_fund_query);
      
      if(mysqli_num_rows($current_fund_amount)> 0){
			while($row= mysqli_fetch_assoc($current_fund_amount)){
				print "<h1> Current fund amount in trust : Rs.". $row["current_fund_amount"] . " ";
				print " Date : ". $row["day"] ."/" . $row["month"] . "/" . $row["year"] ." ";
				print " Time : ". $row["time1"] . " </h1>";
			}
      }
      


      $query = "SELECT email_id, first_name, last_name, amount, day, month, year, time1 FROM account_summary WHERE email_id = '$email_id' ORDER BY $sort_column $order_by ";
      $result = mysqli_query($db, $query);
	
      

			if(mysqli_num_rows($result)> 0){

					
					print "<table border = 1> <tr> <th> Email ID </th> <th> First Name </th> <th> Last Name </th> 
 	   					  <th> Amount </th> <th> Day </th> <th> Month </th> <th> Year </th> <th> Time </th>";
					
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


					header("Content-Type: application/xls");
					header("Content-Disposition : attachment; filename = Funds_details_export_by_visitor.xls");

			}
			else {
				 print "Entered Email ID is InValid";
			}

	}
	else{
		$error = "sample error";
	}
   

?>
