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
    $eventName = $_GET['eventName'];

    $sql = 'SELECT comment FROM public."commentFeed" WHERE "eventName"=\'' . $eventName . '\'';
    $result = pg_query($db, $sql);

    //echo json_encode($result);


    $rows = array();
    while($r = pg_fetch_row($result)) {
        $rows[] = $r;
    }
    print json_encode($rows);


    pg_close($db);
?>