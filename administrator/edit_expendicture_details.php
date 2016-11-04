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
    <form  method = "POST" action="">

    <h2 align="center"><b>Modify Expendicture Entry</b></h2>
    <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">
        <tr>
              <td align="right">Expendicture ID : </td>
              <td><input type="text" name="expendicture_id" maxlength="15" required = "required" placeholder="Enter the Expendicture ID"></td>
       </tr>

       <tr>
              <td align="right">Amount Spend : </td>
              <td><input type="text" name="amount_spend" maxlength="15" required = "required" placeholder="Enter the Amount spend"></td>
       </tr>

       <tr>
              <td align="right">Spend to shop/<br>company/organisation : </td>
              <td><input type="text" name="spend_to_shop" maxlength="255" required = "required" placeholder="Name of the shop/company name "></td>
       </tr>

       <tr>
              <td align="right">Description : </td>
              <td><textarea width = "400px" height="500px" name="description" maxlength="255" required = "required" placeholder="Type the short description about amount spend on..."></textarea></td>
       </tr>
        <tr>
              <td align="right">Day : </td>
              <td><select name="day" required = "required">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>

              </select></td>
       </tr>


       <tr>
              <td  align="right">Month :</td>
              <td ><select name="month" required = "required">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
              </select></td>
       </tr>

       <tr>
              <td align="right">Year : </td>
              <td><input type="text" name="year" maxlength="4" autocomplete = "on" required = "required" placeholder="YYYY"></td>
       </tr>

       <tr>
              <td align="right">Time : </td>
              <td><input type="text" name="time" maxlength="7" required = "required" placeholder="HH:MMam/pm"></td>
       </tr>



        <tr>
        <td align="right"> <input type="submit" value="Add Expendicture Summary" />
        <td> <input type="reset" value="Reset the Form" /></td>
        </tr>
        </table>
    </form>


<?php
include "../php/login_config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $expendicture_id = mysqli_real_escape_string($db, $_POST['expendicture_id']);
    $day = mysqli_real_escape_string($db, $_POST['day']);
    $month = mysqli_real_escape_string($db, $_POST['month']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
    $time1 = mysqli_real_escape_string($db, $_POST['time']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $amount_spend = mysqli_real_escape_string($db, $_POST['amount_spend']);
    $spend_to_shop = mysqli_real_escape_string($db, $_POST['spend_to_shop']);

    //get the current fund amount based on transaction ID
    $current_fund_query = "SELECT amount_spend FROM expendicture_entry WHERE expendicture_id = '$expendicture_id'";
    $current_fund_amount = mysqli_query($db, $current_fund_query);
    $temp = mysqli_fetch_assoc($current_fund_amount);
    $temp_fund_amount_modify = $temp["amount_spend"];


    //get the current fund amount
    $current_fund_query = "SELECT current_fund_amount FROM current_fund_amount WHERE id = '1'";
    $current_fund_amount = mysqli_query($db, $current_fund_query);
    $temp = mysqli_fetch_assoc($current_fund_amount);
    $current_fund_before = $temp["current_fund_amount"];


    $current_fund_before = $current_fund_before - $temp_fund_amount_modify;


    $current_fund_after = $current_fund_before + $amount_spend;
//update the current fund amount

     $update_current_fund_query = "UPDATE `current_fund_amount` SET `id`= '1' ,`current_fund_amount`= '$current_fund_after',`day`= '$day',`month`= '$month',`year`= '$year',`time1`= '$time1' WHERE id = '1' ";

    $result = mysqli_query($db, $update_current_fund_query);
    if($result == 1){
    print "Current fund amount updated successfully";
    }
    else
    {
    print "current Funds amount not updated Error!!!";
    }



    //update the fund amount into database

    $update_fund_query = "UPDATE `expendicture_entry` SET `expendicture_id`= '$expendicture_id' ,`day`= '$day', `month` = '$month', `year`= '$year',`time1`= '$time1', `description` = '$description', `amount_spend` = '$amount_spend', `spend_to_shop` = '$spend_to_shop', `current_fund_before` = '$current_fund_before', `current_fund_after` = '$current_fund_after' WHERE expendicture_id = '$expendicture_id';";

    $result = mysqli_query($db, $update_fund_query);
    if($result == 1){
    print "Expendicture updated successfully";
    }
    else
    {
    print "Expendicture not updated Error!!!";
    }


//display current fund amount
    $current_fund_query = "SELECT current_fund_amount, day, month, year, time1 FROM current_fund_amount WHERE id = '1' ";
    $current_fund_amount = mysqli_query($db, $current_fund_query);

      if(mysqli_num_rows($current_fund_amount)> 0){
      while($row= mysqli_fetch_assoc($current_fund_amount)){
        print "<h1> Current fund amount in trust : ₨.". $row["current_fund_amount"] . " ";
        print " Date : ". $row["day"] ."/" . $row["month"] . "/" . $row["year"] ." ";
        print " Time : ". $row["time1"] . " </h1>";
      }
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
