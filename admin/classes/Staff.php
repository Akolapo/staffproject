<?php
error_reporting(E_ALL);
include_once "Db.php";
include_once "Salary.php";

class Staff extends Db{
    public function add_staffs( $staff_fullname, $staff_dob, $staff_phone, $staff_gender, $staff_email, $grad_id, $sal_id, $state_id,  $dept_id, $ben_id ){
        
            $sql = "INSERT INTO staff_profile(staff_fullname, staff_dob, staff_phone, staff_gender, staff_email, grad_id, sal_id, state_id,  dept_id, ben_id ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $staff_fullname, PDO::PARAM_STR);
            $stmt->bindParam(2, $staff_dob, PDO::PARAM_STR);
            $stmt->bindParam(3, $staff_phone, PDO::PARAM_STR);
            $stmt->bindParam(4, $staff_gender, PDO::PARAM_STR);
            $stmt->bindParam(5, $staff_email, PDO::PARAM_STR);
            $stmt->bindParam(6, $grad_id, PDO::PARAM_INT);
            $stmt->bindParam(7, $sal_id, PDO::PARAM_INT);
            $stmt->bindParam(8, $state_id, PDO::PARAM_INT);
            $stmt->bindParam(9, $dept_id, PDO::PARAM_INT);
            $stmt->bindParam(10, $ben_id, PDO::PARAM_INT);

            
            
            $response =$stmt->execute();
            
            if($response){
                return true;
            }else{
                return false;
            }
           
    }
    public function update_staffs($staff_fullname,$staff_phone,$staff_email, $grad_id, $sal_id, $state_id, $dept_id, $ben_id,$staff_id,){
        $sql = "UPDATE staff_profile SET staff_fullname = ?, staff_phone = ?,staff_email = ?, grad_id =?, sal_id = ?, state_id = ?, dept_id = ?, ben_id = ? WHERE staff_id = ?";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindParam(1, $staff_fullname, PDO::PARAM_STR);
        $stmt->bindParam(2, $staff_phone, PDO::PARAM_STR);
        $stmt->bindParam(3, $staff_email, PDO::PARAM_STR);
        $stmt->bindParam(4, $grad_id, PDO::PARAM_INT);
        $stmt->bindParam(5, $sal_id, PDO::PARAM_INT);
        $stmt->bindParam(6, $state_id, PDO::PARAM_INT);
        $stmt->bindParam(7, $dept_id, PDO::PARAM_INT);
        $stmt->bindParam(8, $ben_id, PDO::PARAM_INT);
        $stmt->bindParam(9, $staff_id, PDO::PARAM_INT);



       $res = $stmt->execute();
       if($res){
        return true;
       }else{
        return false;
       }


    }
    public function fetch_staff_details($staff_id){
        $sql = "SELECT * FROM staff_profile WHERE staff_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $staff_id, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->rowCount();


        if($count < 1){
            return false;
        }else{
            $res= $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
            
        }

    }
    
    
    //fetch all staff for admin
    public function fetch_all_staffs(){
        $sql = "SELECT * FROM staff_profile";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $sta1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $sta1;

    }



    public function getStaffList(){
        
        try {
            // Create a new database connection
            $db = new Db();
            $connect = $db->connect();

            // SQL query to select staff members with their corresponding salary information
            $sql = "SELECT sp.*, amount
            FROM staff_profile AS sp
            LEFT JOIN staff_sal AS ss ON sp.staff_id = ss.staff_id
            LEFT JOIN salary AS s ON ss.sal_id = s.sal_id";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            $staffList = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $staffList; // Return the staff data as an array
        } catch (PDOException $e) {
            // Handle any database errors here
            echo 'Database Error: ' . $e->getMessage();
        }
    }    
    
    //book detail method
    // public function add_staff($sal_id){
    //     $sql = "SELECT * FROM salary WHERE sal_id = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     $stmt->bindParam(1, $sal_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $count = $stmt->rowCount(); //count how many record has that id 
    //     //if $count is less than one, it means no record with that id
    //     if($count < 1){
    //         return false;
    //     }else{
    //         // it means the book exist, so fetch it and return it.
    //         $staf = $stmt->fetch(PDO::FETCH_ASSOC);
    //         return $staf;
    //     }
        
        
    // }


    public function update_staff($staff_gradelevel, $staff_phone, $staff_email, $staff_stateoforigin, $staff_id, $staff_salary){
        try {
            $sql = "UPDATE staff_profile AS sp
                     JOIN salary AS s ON sp.staff_id = s.staff_id
                    SET sp.staff_gradelevel = ?, sp.staff_phone = ?, sp.staff_email = ?, sp.staff_stateoforigin = ?, s.amount = ?
                    WHERE sp.staff_id = ?";
                    
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $staff_gradelevel, PDO::PARAM_STR);
            $stmt->bindParam(2, $staff_phone, PDO::PARAM_STR);
            $stmt->bindParam(3, $staff_email, PDO::PARAM_STR);
            $stmt->bindParam(4, $staff_stateoforigin, PDO::PARAM_STR);
            $stmt->bindParam(5, $staff_id, PDO::PARAM_INT);
            $stmt->bindParam(6, $staff_salary, PDO::PARAM_INT);
    
            $response = $stmt->execute();
    
            return $response;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
    
        public function delete_staff($staff_id){
            $sql = "DELETE FROM staff_profile WHERE  staff_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(1, $staff_id, PDO::PARAM_INT);
            
            $deleted = $stmt->execute();
            return $deleted;
        }

}
// $staff1 = new Staff();
// $staff1->add_staffs();
// $book = new Book();
// echo $book->add_book("Hello from Uganda", 1, "Sam Psalms", "ps", "hello", 2020, "hello.png");
// $book = new Book();
// $booklist = $book->fetch_all_books();
// print_r($booklist);
// $book = new Book();
// print_r($book->get_book_details(2));
// if(!$book){
//     echo "This book is not available";
// }
// $book = new Book();
// echo $book->update_book("From Benin with Love", "Habeebat Binta", "Harlem pub", "A lady travels to benin and returns with a husband", 1965, 1);
//    $staff1 = new Staff();
// // echo $book->delete_book(1);
//  echo $staff1->add_staffs("Osinowo Olamide", "1995-03-09","08052318211","G.L 09", "Oyo","Female", "olamide@gmail.com");
//  $staff1 = new Staff();
//   print_r($staff1->fetch_all_staffs(2));

?>