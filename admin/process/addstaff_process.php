<?php
session_start();
error_reporting(E_ALL);
require_once("../classes/Staff.php");

if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["addbtn"])){
    // Retrieve form data and assign it to variables
    //$staff_id = $_GET['id'];
    $staff_fullname = $_POST["fullname"];
    $staff_dob = $_POST["dob"];
    $staff_phone = $_POST["phone"];
    $grad_id = $_POST["grad_id"];
    $staff_gender = $_POST["gender"];
    $staff_email = $_POST["email"];
    $state_id = $_POST["state_id"];
    $dept_id = $_POST["dept_id"];
    $sal_id = $_POST["sal_id"];
    $ben_id = $_POST["ben_id"];

    // Validation for empty fields
    if(empty($staff_fullname) || empty($staff_dob) || empty($staff_phone) || empty($grad_id) || empty($staff_gender) || empty($staff_email) || empty($state_id) || empty($dept_id)||empty($sal_id) || empty($ben_id)){
        // Redirect to an error page or provide an error message
        header("location:addstaff.php");
        exit();
    }

    // Create an instance of your Staff class and insert data into the database
    $staff1 = new Staff();
    $response = $staff1->add_staffs($staff_fullname,$staff_dob,$staff_phone,$staff_gender, $staff_email, $grad_id, $sal_id, $state_id,$dept_id, $ben_id);

    if ($response) {
        // Redirect to a success page or provide a success message
        $_SESSION['added'] = "Staff added Successfully";
        header("location:../staffpage.php");
        exit();
    }else{
        $_SESSION['added'] = "Unable to add Staff";
        header("location:addstaff.php");
        exit();
    }
}

// If not a POST request or form not submitted, redirect to the form page
header("location:addstaff.php");
