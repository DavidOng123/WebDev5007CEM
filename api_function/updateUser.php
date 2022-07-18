<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once  ('Api_test.php');
$api=new API();
$data= json_decode(file_get_contents("php://input"));

  $api->username=$data->username;
        $api->email=$data->email;
        $api->contact=$data->contact;
        $api->id=$data->id; 
        
        if($api->updateDetail()){
            http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "User was created."));
        echo json_encode(array("ID"=>$api->id,"username"=>$api->username,"email" => $api->email,"contact"=>$api->contact));
        }
        else{
             http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create user."));
        }
        