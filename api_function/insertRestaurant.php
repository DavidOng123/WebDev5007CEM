<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once  ('Api_test.php');
$api=new API();
$data= json_decode(file_get_contents("php://input"));
//if(
//    !empty($data->res_name) &&
//    !empty($data->res_desc)  &&
//    !empty($data->contact) &&
//    !empty($data->cuisine_type)&&
//    !empty($data->res_id)&&
//    !empty($data->username)&&
//        !empty($data->email)&&
//        !empty($data->password)
//
//){

  $api->res_name=$data->res_name;
        $api->res_desc=$data->res_desc;
        $api->contact=$data->contact;
        $api->cusine_type=$data->cuisine_type; 
        $api->image=$data->image;
        $api->username=$data->username;
        $api->email=$data->email;
        $api->password=$data->password;

    
     if($api->insertRest()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Product was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create products."));
    }
//}
  
// tell the user data is incomplete
//else{
//  
//    // set response code - 400 bad request
//    http_response_code(400);
//  
//    // tell the user
//echo json_encode(array("message" => "Unable to create product. Data is incomplete."));}
 ?>



