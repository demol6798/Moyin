<?php
    // array for JSON response
$response = array();

// check for required fields
if (isset($_POST['PH_LIST']) && isset($_POST['GH_LIST'])) {
 
    $ph_list = $_POST['PH_LIST'];
    $gh_list = $_POST['GH_LIST'];
}  else {
    // required field is missing
    
    $response = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>