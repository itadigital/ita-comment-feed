<?php
    date_default_timezone_set('America/Chicago');

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

    //Create variables
    $eventName = $_POST['eventName'];
    $comment = $_POST['comment'];

    $today = date("Y-m-d");
    $time = date("h:i:s");
    $ts = $today . " " . $time;
  
    $sql = 'INSERT INTO public."commentFeed" ("eventName", "comment", "timeStamp") VALUES
        (\'' . $eventName . '\', \'' . $comment . '\', \'' . $ts . '\')';
    $result = pg_query($db, $sql);

    if(!$result){
      echo pg_last_error($db);
    } else {
      echo "Inserted successfully";
    }

    pg_close($db);
?>