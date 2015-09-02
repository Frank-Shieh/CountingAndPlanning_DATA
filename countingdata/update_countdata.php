<?php

/*
 * Following code will update a product information
 * A product is identified by product id (id)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['cid']) && isset($_POST['date'])&&isset($_POST['money'])&&isset($_POST['type'])&&isset($_POST['inorout'])&&isset($_POST['adding'])) {
    
    $cid = $_POST['cid'];
   $date = $_POST['date'];
 $money = $_POST['money'];
 $type = $_POST['type'];
  $inorout = $_POST['inorout'];
  $adding = $_POST['adding'];
   
    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched id
    $result = mysql_query("UPDATE data SET date = '$date',money ='$money',type='$type',inorout='$inorout',adding='$adding' WHERE cid = $cid");

    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
        if(mysql_affected_rows()){
          $response["ok"] = "执行成功";


        }else{
             $response["ok"] = "执行失败";

        }
        // echoing JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
