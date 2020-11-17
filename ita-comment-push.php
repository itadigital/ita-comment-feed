<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    date_default_timezone_set('America/Chicago');

    $host = "host=ec2-34-237-166-54.compute-1.amazonaws.com";
    $port = "port=5432";
    $dbname = "dbname=d46lbrs575uafs";
    $credentials = "user=gyuewavwrbddfh password=70345c071e84599006ac8375ca65adc894ccafd5c13cf2b2f1ef770bf061d610";

    $db = pg_connect( "$host $port $dbname $credentials" );
    if(!$db) {
        //echo "Error : Unable to open database. ";
        $return = array(
            'status' => 500,
            'message' => "Error : Unable to open database."
        );
        http_response_code(500);
        
        print_r(json_encode($return));
    } 

    // id, eventName, firstName, lastName, fullName, location, comment, timeStamp, imageUpload

    //Create variables
    $eventName = $_POST['eventName'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $fullName = $_POST['fullName'];
    $location = $_POST['location'];
    $comment = $_POST['comment'];
    $imageUpload = $_POST['imageUpload'];

    $today = date("Y-m-d");
    $time = date("h:i:s");
    $ts = $today . " " . $time;
  
    $sql = 'INSERT INTO public."commentFeed" ("eventName", "firstName", "lastName", "fullName", "location", comment", "timeStamp", "imageUpload") VALUES
        (\'' . $eventName . '\', 
        \'' . $firstName . '\', 
        \'' . $lastName . '\', 
        \'' . $fullName . '\', 
        \'' . $location . '\', 
        \'' . $comment . '\', 
        \'' . $ts . '\', 
        \'' . $imageUpload . '\')';
    $result = pg_query($db, $sql);

    if(!$result){
        $return = array(
            'status' => 500,
            'message' => pg_last_error($db)
        );
        http_response_code(500);
    } else {
      $return = array(
            'status' => 200,
            'message' => "Submission successful."
        );
        http_response_code(200);
    }

    print_r(json_encode($return));

    pg_close($db);
?>