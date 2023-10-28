<?php
session_start();
error_reporting(E_ALL);
include_once "../classes/Staff.php";
include_once "../classes/Salary.php";



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editstaff"])) {
    // Retrieve form data and assign it to variables
    $staff_fullname = $_POST['staff_fullname'];
    $staff_phone = $_POST['numb'];
    $grad_id= $_POST['grad_id']; 
    $state_id = $_POST['state_id']; 
    $staff_email = $_POST['address'];
    $sal_id = $_POST['sal_id']; 
    $dept_id = $_POST['dept_id'];
    $staff_id = $_POST['staff_id'];
    $ben_id = $_POST['ben_id'];

    // Validation for empty fields
    // if (empty($staff_phone) || empty($staff_fullname) || empty($grad_id) || empty($state_id) || empty($staff_email) || empty($sal_id)||empty($dept_id)) {
    //     $_SESSION['edit'] = 'Please fill out all required fields.';
    //     header("location:edit_staff.php"); // Redirect back to the edit page with the staff ID
    //     exit();
    // }

    // Create an instance of your Staff class and update staff information in the database
    $staff1 = new Staff();
    $response = $staff1->update_staffs($staff_fullname,$staff_phone,$staff_email, $grad_id, $sal_id, $state_id, $dept_id, $ben_id, $staff_id);

    if ($response) {
        $_SESSION['edit'] = 'Staff Updated Successfully';
        header("location:../staffpage.php");
        exit();
    } else {
        $_SESSION['edit'] = 'Staff Update Unsuccessful';
        header("location:../edit_staff.php"); // Redirect back to the edit page with the staff ID
        exit();
    }
} else {
    // If not a POST request or form not submitted, redirect to the appropriate page
    header("location: staffpage.php");
}
?>
