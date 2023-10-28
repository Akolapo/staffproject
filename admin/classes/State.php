<?php
require_once "Db.php";

    class State extends Db{
        public function add_state($state_id, $state_name){
            $sql = "INSERT INTO state(state_id, state_name) VALUES(?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $state_id, PDO::PARAM_INT);
            $stmt->bindParam(2, $state_name, PDO::PARAM_STR);
            
                $state = $stmt->execute();
                return $state;
        }
        public function fetch_state(){
            $sql = "SELECT * FROM state";
            $stmt= $this->connect()->prepare($sql);
             $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $response;
        }
        
        public function get_state_detail($state_id){
            $sql = "SELECT * FROM state WHERE state_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(1, $state_id, PDO::PARAM_INT);
                $stmt->execute();

                $count = $stmt->rowCount();      //count how many recoreds with the id
                if($count < 1) {                //if count is less than 1, no record with that id
                    return false;
                }else{
                    //It means d book exist, fetch it with d fetch function()
                    $cat = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $cat;
            }
        
    }
}
    // $state1 = new State();
    // echo  $state1->add_state(20, "Gobe");
?>