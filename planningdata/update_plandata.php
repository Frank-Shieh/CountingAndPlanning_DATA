<?php

/*
 * Following code will update a product information
 * A product is identified by product id (id)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['pid']) && isset($_POST['startdate'])&&isset($_POST['enddate'])&&isset($_POST['title'])&&isset($_POST['content'])) {
    
  $pid = $_POST['pid'];
  $startdate = $_POST['startdate'];
  $enddate = $_POST['enddate'];
  $title = $_POST['title'];
  $content = $_POST['content'];
 
   
    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("UPDATE data SET startdate = '$startdate',enddate ='$enddate',title='$title',content='$content' WHERE pid = $pid");

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
