<?php

/*
 * Following code will list all the data
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all data from data table
$result = mysql_query("SELECT *FROM data") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // data node
    $response["data"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["cid"] = $row["cid"];
        $product["date"] = $row["date"];
        $product["money"] = $row["money"];
        $product["type"] = $row["type"];
        $product["inorout"] = $row["inorout"];
        $product["adding"] = $row["adding"];
      

        // push single data into final response array
        array_push($response["data"], $product);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no data found
    $response["success"] = 0;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
?>
