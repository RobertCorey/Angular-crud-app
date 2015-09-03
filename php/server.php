<?php
/* 
* handles requests for .json files in the customers directory, wildcard symbols or regular expressions
* can be used to grab multiple files, or the filename for 1 file
*/
function getCustomers()
{
    $get = $_GET['query'];
    //get all the customers matching the query, 
    $filenames = glob("../customers/$get.json");
    $aJson = [];
    for ($i=0; $i < count($filenames); $i++) { 
        $aJson[] = json_decode(file_get_contents($filenames[$i]));
    }
    if (count($aJson) > 0) {
        http_response_code(200);
        echo json_encode($aJson);
    }
    else{
        http_response_code(404);
    }
    return true;
}
//deletes a customer .json
function deleteCustomer()
{
    //get the location of the target file
    $filepath = '../customers' . $_SERVER['PATH_INFO'] . ".json";
    //delete the target file
    if(unlink($filepath)){
        http_response_code(200);
    }else{
        http_response_code(400);
    }
    return true;
}
function writeCustomer(){
    //decode json object into associate array to extract email to use as filename
    $json = file_get_contents("php://input");
    $filedata = json_decode($json,true);
    $filename = '../customers/' . $filedata['email'] . ".json";
    //write json to file
    if(file_put_contents($filename,$json)){
        http_response_code(200);
    }else{
        http_response_code(400);
    }
    return true;
}
//handle the request based on the method
$requestType = $_SERVER['REQUEST_METHOD'];
switch ($requestType) {
    case 'GET':
        getCustomers();
        break;
    case 'DELETE':
        deleteCustomer();
        break;
    case 'PUT':
        writeCustomer();
        break;
    default:
        echo "Error, request method $requestType is not supported";
        break;
}
?>