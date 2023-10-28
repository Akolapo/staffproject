<?php
require_once "Db.php";
class Grade extends Db{
public function fetch_grade(){
    $sql = "SELECT * FROM grade_level";
    $stmt= $this->connect()->prepare($sql);
     $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $response;
}
public function get_grade_details($grad_id){
    $sql = "SELECT * FROM grade_level";
    $stmt= $this->connect()->prepare($sql);
    $stmt->bindParam(1, $grad_id, PDO::PARAM_INT);
     $stmt->execute();
     $count =$stmt->rowCount();
    if($count < 1 ){
        return false;
    }else{
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        return $response;
    }

}
}
?>