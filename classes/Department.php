<?php
    require_once "Db.php";
    require_once "Staff.php";
    class Department extends Db{
        public function add_dept($dept_id, $dept_name){
            $sql = "INSERT INTO department(dept_id, dept_name) VALUES (?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $dept_id, PDO::PARAM_INT);
            $stmt->bindParam(2, $dept_name, PDO::PARAM_STR);
            $result = $stmt->execute();
            return $result;
        }
        public function fetch_all_staff_by_dept_id(){
            $sql = "SELECT * FROM department";
            $stmt= $this->connect()->prepare($sql);
    
             $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $response;
    
        }
        
        public function get_dept_detail($dept_id){
            $sql = "SELECT * FROM department WHERE dept_id = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->bindParam(1, $dept_id, PDO::PARAM_INT);
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
    // $depart = new Department();
    // $deep = $depart->fetch_all_staff_by_dept_id(2);
    // print_r($deep);
    
    //  $dept1 = new Department();
    // // echo $dept1->add_dept(10, "Estate");
    //  print_r($dept1->fetch_all_depart(3));




?>