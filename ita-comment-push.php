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

// id, eventName, firstName, lastName, fullName, location, comment, timeStamp, imageUpload

$date = new DateTime();

$sql = "INSERT INTO commentFeed (eventName, comment, timeStamp)
VALUES ('2I79C1', 'this is a test comment', '" . $date->getTimestamp(); . "')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>




