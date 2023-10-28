<?php
error_reporting(E_ALL);

// require_once "Staff.php";
// require_once "Salary.php";

// // Check if the staff_id is set in the query string
// if (isset($_GET["id"])) {
//     $staff_id = $_GET["id"];
//     $sal_id  = $_GET["id"];
//     // Create an instance of the Staff class
//     $staff1 = new Staff();

//     // Retrieve the staff details
//     $staffDetails = $staff1->fetch_all_staffs($staff_id);

//     if (!$staffDetails) {
//         // Redirect to staffpage.php if staff not found
//         header("location:staffpage.php");
//         exit();
//     }

//     // Retrieve the salary for the given staff_id
//     $salaries = new Salary();
//     $salary =  $salaries->fetch_salary($sal_id);

//     if (!$salary) {
//         header("location:staffpage.php");
//         exit();
//     }

//     // Extract staff details for displaying in HTML
//     $staffFullname = isset($staffDetails[0]["staff_fullname"]) ? $staffDetails[0]["staff_fullname"] : "";
//     $staffEmail = isset($staffDetails[0]["staff_email"]) ? $staffDetails[0]["staff_email"] : "";
//     $staffstateoforigin = isset($staffDetails[0]["state_id"]) ? $staffDetails[0]["state_id"] : "";
//     $staffphone = isset($staffDetails[0]["staff_phone"]) ? $staffDetails[0]["staff_phone"] : "";
//     $amount = isset($salary[0]["sal_id"]) ? $salary[0]["sal_id"] : "";
// }



// ?>

// <!DOCTYPE html>
// <html lang="en">
// <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

// <head>
// </head>
// <body>
//     <div>
<!-- //         <h3>Fullname: <?php echo $staffFullname; ?></h3>
//         <h3>Email: <?php echo $staffEmail; ?></h3>
//         <h3>State of Origin: <?php echo $staffstateoforigin; ?></h3>
//         <h3>Department: <?php echo $staffphone; ?></h3>
//         <h3>Salary:<?php echo $amount; ?></h3> -->
//     </div>
//     <a href="staffpage.php" class="btn btn-success">Go Back</a>
</body>
</html>
