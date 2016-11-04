<?php
   
include "../php/login_config.php";
include "../php/session.php";
	
   	if($_SERVER["REQUEST_METHOD"] == "POST") {
      // data sent from form
/*
	    $order_by = mysqli_real_escape_string($db,$_POST['order_by']);
      $sort_column = mysqli_real_escape_string($db,$_POST['sort_by']); 
      $year = mysqli_real_escape_string($db,$_POST['year']); 

*/
      $order_by = $_SESSION['view_expendicture_order_by'];
      $sort_column = $_SESSION['view_expendicture_sort_column'];
      $year = $_SESSION['view_expendicture_year'];
     
	  $current_fund_query = "SELECT current_fund_amount, day, month, year, time1 FROM current_fund_amount WHERE id = '1'";
      $current_fund_amount = mysqli_query($db, $current_fund_query);
      
      if(mysqli_num_rows($current_fund_amount)> 0){
			while($row= mysqli_fetch_assoc($current_fund_amount)){
				print "<h1> Current fund amount in trust : Rs.". $row["current_fund_amount"] . " ";
				print " Date : ". $row["day"] ."/" . $row["month"] . "/" . $row["year"] ." ";
				print " Time : ". $row["time1"] . " </h1>";
			}
      }
      


      $query = "SELECT expendicture_id, day, month, year, time1, description, amount_spend, spend_to_shop, current_fund_before, current_fund_after FROM expendicture_entry ORDER BY $sort_column $order_by ";
      $result = mysqli_query($db, $query);
	
      

			if(mysqli_num_rows($result)> 0){

					
					print "<table border = 1> <tr> <th> Day </th> <th> Month </th> <th> Year </th> 
 	   					  <th> Time </th> <th> Description </th> <th> Amount Spend </th> <th> Spend To  </th> <th> Current Fund Before </th> <th> Current Fund After </th>";
					
					while($row= mysqli_fetch_assoc($result)){
						print "<tr>";
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

					header("Content-Type: application/xls");
					header("Content-Disposition : attachment; filename = Expendicture_details_export_by_admin.xls");

         
			}
			else {
				 print "Entered year is InValid";
			}

	}
	else{
		$error = "sample error";
	}
   

?>