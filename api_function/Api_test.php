<?php

require_once ('..\DB.php');
class API{
    public $res_name;
    public $res_desc;
    public $contact;
    public $cuisine_type;
    public $image;
    public $username;
    public $password;
    public $email;
   
    public $user_password;
    public $id;
            
            function fetchAllRestaurant() {
$db=new DB();
 $query="SELECT res_name,res_des,image FROM restaurant";
        $user=array();
        $stmt= $db->con->prepare($query);
        $stmt->execute();
        $i=0;
        while($data=$stmt->fetch(PDO::FETCH_ASSOC)){
            $user[$i]=array(
                'name'=>$data['res_name'],
                'desc'=>$data['res_des'],
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
     public function insertRest() {
        $db=new DB();
        
        
        $query="INSERT INTO restaurant (res_name, res_des, contact,cuisine_type,image)
VALUES (:res_name, :res_desc, :contact, :cuisine_type,:image)";
        
        
        
        $stmt= $db->con->prepare($query);
        
         $this->res_name=htmlspecialchars(strip_tags($this->res_name));
        $this->res_desc=htmlspecialchars(strip_tags($this->res_desc));
        $this->contact=htmlspecialchars(strip_tags($this->contact));
        $this->cuisine_type=htmlspecialchars(strip_tags($this->cuisine_type)); 
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $stmt->bindParam(":res_name", $this->res_name);
        $stmt->bindParam(":res_desc", $this->res_desc);
        $stmt->bindParam(":contact", $this->contact);
        $stmt->bindParam(":cuisine_type", $this->cuisine_type);
        $stmt->bindParam(":image", $this->image );
        
        
        
        
        
        $stmt->execute();
        $query2="SELECT * FROM restaurant WHERE res_name=:res_name";
        $stmt2= $db->con->prepare($query2);
        $stmt2->bindParam(":res_name", $this->res_name);
        $stmt2->execute();
        $data=$stmt2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $a){
            $res_id=$a['res_id'];
        }
        $query3="INSERT INTO restaurant_owner (username, email, password,res_id)
VALUES (:username, :email, :password,'$res_id')";
        
        $stmt3= $db->con->prepare($query3);
        $stmt3->bindParam(":username", $this->username);
        $stmt3->bindParam(":email", $this->email);
        $stmt3->bindParam(":password", $this->password);
        $stmt3->execute();
        
        return true;
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
    
    public function updateDetail() {
         $db=new DB();
         
        $query="UPDATE user SET username=:name,email=:email,mobile_number=:contact WHERE id=:id";
       $stmt= $db->con->prepare($query);
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->contact=htmlspecialchars(strip_tags($this->contact));
        $stmt->bindParam(":name", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":contact", $this->contact);
        $stmt->bindParam(":id", $this->id);
        if($stmt->execute()){
            return true;
        }
             
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
                'cuisine'=>$data['cuisine_type']
            );
            $i++;
        
    }
    return json_encode($res);
}

public function getReservation($param) {
        $db=new DB();
        $query="SELECT * FROM history WHERE res_id= '$param' AND status='1'";
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
}
?>

