<?php

// Start the session
session_start();


$servername = "db729292942.db.1and1.com";
$username = "dbo729292942";
$password = "@@Tit123";
$dbname = "db729292942";

//include sucess page in the php file 
include "success.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// define variables and set to empty values
$fname = $lname = $cname = $contact = $email = $participant = $member2 =  $reg = $caname = $transaction = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $transaction = $_POST["transaction_id"];
}
  $fname = $_SESSION["fname"];
  $lname = $_SESSION["lname"];
  $cname = $_SESSION["cname"];
  $contact = $_SESSION["contact"];
  $email = $_SESSION["email"];
  $participant = $_SESSION["participant"];
  $member2 = $_SESSION["member2"];
  $reg = $_SESSION["reg"];
  $caname = $_SESSION["caname"];

$sql = "INSERT INTO registration_list (FIRST_NAME, LAST_NAME, CLG_NAME, CONTACT_NO, EMAIL_ID, PARTICIPANT_TYPE, MEMBER_2, REGISTRATION_TYPE, CA_NAME, TRANSACTION_ID)
VALUES ('$fname', '$lname', '$cname', '$contact', '$email', '$participant', '$member2', '$reg' , '$caname', '$transaction')";
//include sucess page in the php file 
if ($conn->query($sql) === TRUE) {
	
success();
	
	// the message
$msg = "Greetings!! \n
Hello($fname...) \n
Payment successfull !!  \n 
your transcation id is ($transaction) \n
You have been successfully registered for the event DesignoWar.\n
Come along with any of your ID proof at sharp 10am, 06/04/18.\n
\n
For more details of the event kindly visit to our website www.designowar.org\n
\n
We wish you will have a great time at Technocrates Institute of Technology(Excellence)\n
\n
Wishing you all the best!!! \n
Regards, \n
Team Designowar, TIT(EXCELLENCE)";

// send email
mail($email ,"Congratulations on your successful registration!",$msg);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>