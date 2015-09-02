<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['date'])&&isset($_POST['money'])&&isset($_POST['type'])&&isset($_POST['inorout'])&&isset($_POST['adding']) ) {
    
    $date = $_POST['date'];
 $money = $_POST['money'];
 $type = $_POST['type'];
  $inorout = $_POST['inorout'];
  $adding = $_POST['adding'];
    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO data(date,money,type,inorout,adding) VALUES('$date','$money','$type','$inorout','$adding')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
        $response["cid"] = mysql_insert_id();
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>