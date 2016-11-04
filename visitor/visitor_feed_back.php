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

        <li >
          <a href="../visitor/visitor_dashboard.php">funds</a>
        </li>

        <li >
          <a href="../visitor/visitor_view_expendicture_details.php">expendicture</a>
        </li>

        <li class="selected">
          <a href="../visitor/visitor_feed_back.php">feedback</a>
        </li>

      </ul>
    </div>
  </div>

  <div id="body">
    <div class="body">
    <form  method = "POST" action="">

 <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center">

       <tr>
              <td align="right">Name : </td>
              <td><input type="text" name="name" maxlength="30" required = "required" placeholder="Enter the Amount spend"></td>
       </tr>

       <tr>
              <td align="right">Email ID : </td>
              <td><input type="text" name="email_id" maxlength="30" required = "required" placeholder="Name of the shop/company name "></td>
       </tr>

       <tr>
              <td align="right">Subject : </td>
              <td><textarea width = "400px" height="500px" name="subject" maxlength="80" required = "required" placeholder="Type the subject..."></textarea></td>
       </tr>
        <tr>
              <td align="right">Message/Comment : </td>
              <td><textarea width = "400px" height="500px" name="message" maxlength="255" required = "required" placeholder="Type the your comment..."></textarea></td>
       </tr>

        <tr>
        <td align="right"> <input type="submit" value="Sent Message" />
        <td> <input type="reset" value="Reset the Form" /></td>
        </tr>
        </table>
    </form>


<?php
include "../php/login_config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
    $subject = mysqli_real_escape_string($db, $_POST['subject']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

//insert the comment into database
    $query = "INSERT INTO `visitor_feedback` (`name`, `email_id`, `subject`, `comment`) VALUES ('$name', '$email_id', '$subject', '$message');";

    $result = mysqli_query($db, $query);
    if($result == 1){
    print "Message sent successfully";
    }
    else
    {
    print "Message not sent Error!!!";
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
