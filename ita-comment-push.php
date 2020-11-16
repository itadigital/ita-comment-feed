<?php
   $host = "host=ec2-34-237-166-54.compute-1.amazonaws.com";
   $port = "port=5432";
   $dbname = "dbname=d46lbrs575uafs";
   $credentials = "user=gyuewavwrbddfh password=70345c071e84599006ac8375ca65adc894ccafd5c13cf2b2f1ef770bf061d610";

   $db = pg_connect( "$host $port $dbname $credentials" );
   if(!$db) {
   echo "Error : Unable to open database\n";
   } else {
   echo "Opened database successfully\n";
   }

   // id, eventName, firstName, lastName, fullName, location, comment, timeStamp, imageUpload

   $date = new DateTime();
   $ts = $date->getTimestamp();

  
$sql = 'INSERT INTO commentFeed (eventName, firstName, lastName, fullName, location, comment, timeStamp, imageUpload) 
       VALUES ("2I79C1", "", "", "", "", "this is a test comment" , "", "")';
$result = pg_query($db, $sql);
if(!$result){
  echo pg_last_error($db);
} else {
  echo "Inserted successfully";
}

    pg_close($db);
?>