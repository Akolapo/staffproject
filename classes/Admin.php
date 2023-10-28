<?php
// session_start();
error_reporting(E_ALL);
require_once "Db.php";

class Admin extends Db{

  public function admin_login($admin_email, $admin_password) {
    $sql = "SELECT * FROM admin WHERE admin_email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $admin_email, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        // Check if the provided password matches the hashed password in the database
        if (password_verify($admin_password, $admin['admin_password'])) {
            // Successful login, set session or perform any other required actions
            // For example:
            // $_SESSION['admin_id'] = $admin['admin_id'];
            // Redirect to profile.php
            // header("location: ../profile.php");
            // exit();
            return true; // Return true to indicate successful login
        }
    }

    // Invalid login, return false
    return false;
}


  //login
    public function fetch($admin_email, $password_hashed){
      //check if email is in db
      $sql = "SELECT  `admin_email`, `admin_password` FROM `admin` WHERE admin_id = ?";
     $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(1, $admin_email, PDO::PARAM_STR);
    $stmt->bindParam(2, $password_hashed, PDO::PARAM_STR);

     $response = $stmt->execute();
     if($response){
     return true;
    }else{
       return false;
    }
    // $admin_count = $stmt->rowCount();
    //if $user_count i greater than zero it means the email already exist in the db

    //  if($admin_count < 0){
    //     //if it not in db: return error message
    //    return "Successful";
    //    exit();
    }
      //if it not in db, we want the full details of the user that owns the email
      // $user = $stmt->fetch(PDO::PARAM_STR);
      //print_r($user);
      
      //if it is in db

      //check if password matches using password_verify
    // $pasword_matches = password_verify($admin_password,$admin["admin_password"]);
    //   //if it matches, set session
    //   if($pasword_matches){
    //     // ensure who is trying to login is and admin
    //     if( $user["user_role"]== "admin"){
    //       $_SESSION["user_id"] = $user["user_id"];
    //       $_SESSION["user_role"] = $user["user_role"];
    //       header("location:../profile.php");
    //       exit();
    //     }else{
    //       header("loaction:../login.php");
    //       exit();
    //     }

    //   }
      //else:return error message
    //   return "Either email or password is incorrect";
    //   die();
    // }
    //fetch user details
    // public function fetch_user_details($user_id){
    //   $sql = "SELECT * FROM users WHERE user_id = ?";
    //   $stmt = $this->connect()->prepare($sql);
    //   $stmt->bindParam(1, $user_id, PDO::PARAM_STR);
    //   $stmt->execute();
    //   $user_details = $stmt->fetch(PDO::FETCH_ASSOC);
    //   return $user_details;
    // }
  //update profile

  //updatepassword

  //Uploadprofileimage
  // public function upload_profile_image($user_id, $user_dp){
  //     //echo $user_dp;
  //     //die();
  //     $sql = "UPDATE users SET user_dp = ? WHERE user_id = ?";
  //     $stmt = $this->connect()->prepare($sql);
  //     $stmt->bindParam(1, $user_dp, PDO::PARAM_STR);
  //     $stmt->bindParam(2, $user_id, PDO::PARAM_INT);
  //     $response =$stmt->execute();
  //     if($response){
  //       return true;
  //     }else{
  //       return false;
  //     }
    //  }



  }
  // $admi1 = new Admin();
  // echo $admi1->admin_login("enilorundamoses@24gmail.com", "Akolapo93");

// echo $user1->getAllusers("10","Ayomide Osinubi","ayodeji@gmail.com","password123","I am a bookworm","profile","user");

// $usage->Users("Ayomide Osinubi", "ayodeji@gmail.com", "password123", "I am a bookworm", "profile", "user");
// echo $user1->login("Ibironke@gmail.com", "123456789");
// echo "<pre>";
// print_r ($user1->fetch_user_details(11));
// echo "</pre>";

?>