<?php
$servername = "ec2-34-237-166-54.compute-1.amazonaws.com";
$username = "gyuewavwrbddfh";
$password = "70345c071e84599006ac8375ca65adc894ccafd5c13cf2b2f1ef770bf061d610";
$dbname = "d46lbrs575uafs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$conn->close();
?>