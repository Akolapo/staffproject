<?php
require_once "Db.php";

    class Promotion extends Db{
        public function add_staff_promotion($prom_id, $previous_post, $present_post, $date){
            $sql = "INSERT INTO staff_promotion(prom_id, previous_post, present_post, date) VALUES(?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $prom_id, PDO::PARAM_INT);
            $stmt->bindParam(2, $previous_post, PDO::PARAM_STR);
            $stmt->bindParam(3, $present_post, PDO::PARAM_STR);
            $stmt->bindParam(4, $date, PDO::PARAM_STR);
             $promote= $stmt->execute();
                return $promote;


        }
        public function delete_promotion($prom_id){
            $sql = "DELETE FROM staff_promotion WHERE prom_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $prom_id, PDO::PARAM_INT);
            
                $deleted= $stmt->execute();
                return $deleted;

        }
    }
$prom1 = new Promotion();
// echo $prom1->add_staff_promotion(5, "GL, 13", "GL 14", "2022-15-05");
echo $prom1->delete_promotion(2);


?>