<?php
require_once ('Api.php');
        $api=new API();
$name=$_POST['name'];

$data=$api->searchData($name);
echo json_encode($data);?>


