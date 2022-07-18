<?php

require_once ('DB.php');
class API{
function fetchAllRestaurant() {
$db=new DB();
 $query="SELECT res_name,res_des,cuisine_type,image FROM restaurant";
        $user=array();
        $stmt= $db->con->prepare($query);
        $stmt->execute();
        $i=0;
        while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
            $user[$i]=array(
                
                'name'=>$data['res_name'],
                'desc'=>$data['res_des'],
                'type'=>$data['cuisine_type'],
                'image'=>base64_encode($data['image'])
            );
            $i++;
    }
        return json_encode($user);

}
    public function viewData() {
        $db=new DB();
        $query="SELECT res_name FROM restaurant";
        $stmt= $db->con->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
        
    public function searchData($param) {
        $db=new DB();
        $query="SELECT res_name FROM restaurant WHERE res_name LIKE :res_name";
        $stmt= $db->con->prepare($query);
        $stmt->execute(["res_name"=>"%".$param."%"]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
     public function getHistory($param) {
        $db=new DB();
        $query="SELECT * FROM history WHERE id=".$param;
        $stmt= $db->con->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }
     public function insertRest($name,$des,$contact,$cuisine_type,$image,$location,$username,$email,$password) {
        $db=new DB();
        
        $query="INSERT INTO restaurant (res_name, res_des, contact,cuisine_type,image,location)
VALUES ('$name', '$des', '$contact', '$cuisine_type','$image','$location')";
        
        $stmt= $db->con->prepare($query);
        $stmt->execute();
//        $query2="SELECT res_id FROM restaurant WHERE res_name='$name'";
//        $stmt2= $db->con->prepare($query2);
//        $stmt2->execute();
//        $data=$stmt2->fetchAll(PDO::FETCH_ASSOC);
//        foreach ($data as $a){
//            $res_id=$a['res_id'];
//        }
//        
        $query3="INSERT INTO restaurant_owner (username, email, password,res_id)
VALUES ('$username', '$email', '$password',(SELECT res_id FROM restaurant where res_name='$name'))";
        $stmt3= $db->con->prepare($query3);
        $stmt3->execute();
    }
    
    public function checkAdmin($email,$password) {
         $db=new DB();
        $query="SELECT * FROM admin where email='$email' and password='$password'";
       
        $stmt= $db->con->prepare($query);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        if(count($data)==1){
            return true;
        }
        else{
            return false;
        }
       
        
    } 
    
    public function updateDetail($id,$name,$email,$mobile) {
         $db=new DB();
         
        $query="UPDATE user SET username='$name',email='$email',mobile_number='$mobile' WHERE id='$id'";
       
        $stmt= $db->con->prepare($query);
        $stmt->execute();
             
    } 
    
    public function updateOwnerDetail($name,$desc,$contact,$type,$image) {
        
        $db=new DB();
        $query="UPDATE restaurant SET username='$name',email='$email',mobile_number='$mobile' WHERE id='$id'";
       
        $stmt= $db->con->prepare($query);
        $stmt->execute();
    }
    
    public function getResDetail($param) {
        $db=new DB();
        $query="SELECT * FROM restaurant WHERE res_id='$param'";
        $stmt= $db->con->prepare($query);
        $stmt->execute();
       
        $res=array();
        $i=0;
        while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
            $res[$i]=array(
                'name'=>$data['res_name'],
                'desc'=>$data['res_des'],
                'image'=>base64_encode($data['image']),
                'cuisine'=>$data['cuisine_type'],
                'contact'=>$data['contact'],
                'location'=>$data['location']
            );
            $i++;
        
    }
    return json_encode($res);
}

public function getReservation($param) {
        $db=new DB();
        $query="SELECT * FROM history WHERE res_id= '$param' AND status='pending'";
        $stmt= $db->con->prepare($query);
        $stmt->execute();
        
        $res=array();
        $i=0;
        while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
            $res[$i]=array(
                'id'=>$data['id'],
                'res_id'=>$data['reserve_id'],
                'date_time'=>$data['date_time'],
                'pax'=>$data['pax'],
                'status'=>$data['status']
            );
            $i++;
        
    }
    return json_encode($res);
}

public function updateRes($id,$name,$desc,$contact,$cuisine,$image,$address) {
         $db=new DB();
         
        $query="UPDATE restaurant SET res_name='$name',res_des='$desc',contact='$contact',cuisine_type='$cuisine',image='$image',location='$address' WHERE res_id='$id'";
       
        $stmt= $db->con->prepare($query);
        $stmt->execute();
             
    } 
}
?>