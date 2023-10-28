<?php
require_once "Db.php";
class Salary extends Db{
    public function add_salary($sal_id, $amount, $date, $staff_id, $grad_id ){
        $sql = "INSERT INTO salary(`sal_id`, `amount`, `date`, `grad_id` `staff_id`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $amount, PDO::PARAM_INT);
        $stmt->bindParam(3, $date, PDO::PARAM_STR);
        $stmt->bindParam(4, $staff_id, PDO::PARAM_STR);
        $stmt->bindParam(5, $grad_id, PDO::PARAM_INT);


        $add = $stmt->execute();
        return $add;
        
    }
    public function delete_salary($sal_id){
        $sql = "DELETE FROM salary WHERE sal_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
        $delete = $stmt->execute();
        return $delete;
    }
    public function add_staff($sal_id){
        $sql = "SELECT * FROM salary WHERE sal_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
        $stmt->execute();
         $stmt->rowCount(); //count how many record has that id 
        //if $count is less than one, it means no record with that id
        // if($count < 1){
        //     return false;
        // }else{
        //     // it means the book exist, so fetch it and return it.
        //     $staf = $stmt->fetch(PDO::FETCH_ASSOC);
        //     return $staf;
         }
         public function update_salary($staff_id, $staff_salary){
            $sql = "UPDATE salary SET amount = ? WHERE staff_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $staff_id, PDO::PARAM_INT);
            $stmt->bindParam(2, $staff_salary, PDO::PARAM_INT);

           
            $updated = $stmt->execute();
            return $updated;
    
        }
        public function fetch_grade(){

            $sql ="SELECT * FROM grade_level";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
            return $result;
    
        }
        public function fetch_salary_by_grad_id($grad_id){
            $sql = "SELECT * FROM salary WHERE grad_id = ?";
            $stmt= $this->connect()->prepare($sql);
            $stmt->bindParam(1, $grad_id, PDO::PARAM_INT);
             $stmt->execute();
            $response = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $response;
        }
        public function fetch_salaries(){

            $sql = "SELECT * FROM salary";
            $stmt= $this->connect()->prepare($sql);
            // $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
             $stmt->execute();
             $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $response;
        }
        public function fetch_salary($sal_id){

            $sql = "SELECT * FROM salary WHERE sal_id = ?";
            $stmt= $this->connect()->prepare($sql);
            $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
                        
             $stmt->execute();
             $count = $stmt->rowCount();
             if($count < 1){
                return false;
             }else{
                $response = $stmt->fetch(PDO::FETCH_ASSOC);

                return $response;
             }
            
            
        }
        public function get_salary_detail($sal_id){
            $sql = "SELECT * FROM salary WHERE sal_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
                $stmt->execute();

                $count = $stmt->rowCount();      //count how many recoreds with the id
                if($count < 1) {                //if count is less than 1, no record with that id
                    return false;
                }else{
                    //It means d book exist, fetch it with d fetch function()
                    $sal = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $sal;
            }
        
    }
        
    }
    // $sally1 = new Salary();
    // $sally1->add_salary(17,'46900',);
    // // $fetch = new Salary();
    // // $xyz = $fetch->fetch_salary_by_grad_id(2);
    // echo "<pre>";
    // print_r($xyz);
    // echo "</pre>";
    // $grade = new Salary();
    // $grade1 = $grade->fetch_grade();
    // echo "<pre>";
    // print_r($grade1);
    // echo "</pre>";
// $sally1 = new Salary();
// echo $sally1->add_salary(17, 17, "4500000", 1993-6-4);
// echo $sally1->delete_salary(17);
?>