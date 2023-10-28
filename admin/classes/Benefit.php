<?php
require_once "Db.php";

    class Benefit extends Db{
        public function add_benefit($ben_id, $ben_leavebonus, $ben_carloan, $ben_staffquarter, $ben_workshoptraining){
        $sql = "INSERT INTO staff_benefit(ben_id, ben_leavebonus, ben_carloan, ben_staffquarter, ben_workshoptraining) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $ben_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $ben_leavebonus, PDO::PARAM_STR);
        $stmt->bindParam(3, $ben_carloan, PDO::PARAM_STR);
        $stmt->bindParam(4, $ben_staffquarter, PDO::PARAM_STR);
        $stmt->bindParam(5, $ben_workshoptraining, PDO::PARAM_STR);
        
            $benefit = $stmt->execute();
            return $benefit;



        }
        public function fetch_benefit(){
            $sql = "SELECT * FROM staff_benefit";
            $stmt= $this->connect()->prepare($sql);
         $stmt->execute();
             $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $response;
        }
        
        public function get_benefit_detail($ben_id){
            $sql = "SELECT * FROM staff_benefit WHERE ben_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(1, $ben_id, PDO::PARAM_INT);
                $stmt->execute();

                $count = $stmt->rowCount();      
                if($count < 1) {          
                    return false;
                }else{
                    //It means d book exist, fetch it with d fetch function()
                    $sal = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $sal;
            }
    }
}
    //  $ben1 = new Benefit();
    // echo $ben1->add_benefit(3, "false", "true", "true", "true", 3);

?>