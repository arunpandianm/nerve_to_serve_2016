<?php
   
include "../php/login_config.php";
 
 $query = "SELECT name, email_id, subject, comment FROM visitor_feedback ";

      $result = mysqli_query($db, $query);

			if(mysqli_num_rows($result)> 0){
					print "<h2 align='center'><b>Visitor's Feedback</b></h2>";
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

					header("Content-Type: application/xls");
					header("Content-Disposition : attachment; filename = Feedback_export_by_admin.xls");

			}
			else {
				 $error = "sample error";
				}	
?>
