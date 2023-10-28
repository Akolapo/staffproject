<?php
session_start();
error_reporting(E_ALL);
require_once("partials/header.php");
include_once "classes/Staff.php";
include_once "classes/Salary.php";
include_once "classes/State.php";
include_once "classes/Grade.php";
include_once "classes/Department.php";
include_once "classes/Benefit.php";




if(isset($_GET["id"])){
    $staff_id = $_GET["id"];
    if(!is_numeric($staff_id)) {
        header("location:staffpage.php");
        exit();
    }

    $staff1 = new Staff();
    $sta1 = $staff1->fetch_staff_details($staff_id);
     //print_r($sta1);
    //  exit();
        

    if (!$sta1) {
        header("location:staffpage.php");
        exit();
    }
    
    $sal = new Salary();
    $salaries =$sal->fetch_salaries();
    $state = new State();
    $states= $state->fetch_state();
    $grad = new Grade();
    $grades= $grad->fetch_grade();

    $dept = new Department();
    $depart = $dept->fetch_all_staff_by_dept_id(); 
    
    $benefit = new Benefit();
$ben = $benefit->fetch_benefit();
}

// Rest of your HTML and form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <meta name="description" content="Your page description">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="assets/css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" crossorigin="anonymous">
</head>
<body>




<!-- Site body begins here -->
<div class="container">
    <form method="post" action="process/editstaff_process.php">
        <input type="text" name="staff_fullname" value="<?php echo $sta1['staff_fullname']; ?>">
        <input type="hidden" name="staff_id" value="<?php echo $sta1['staff_id']; ?>">

        <div class="col">
                <label for="numb">Phone Number</label>
                <input type="text" id="numb" name="numb" class="form-control" value="<?php echo $sta1['staff_phone'] ?>">
            </div>
        <div class="row mb-4">
            <div class="col">
                <label for="grads_id">Grade Level</label>
                <select name="grad_id" id="grads_id" class="form-control">
                    <?php foreach ($grades as $grade) { ?>
                        
                        <option value="<?php echo $grade['grad_id']; ?>"><?php echo $grade['grad_level']; ?></option>
                    <?php } ?>
                </select>
            </div>
            

        </div>
        <div class="col">
                <label for="state_id">State</label>
                <select name="state_id" id="state_id" class="form-control">
                    <?php foreach ($states as $sot) { ?>
                        
                        <option value="<?php echo $sot['state_id']; ?>"><?php echo $sot['state_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

        <div class="row mb-4">
            <div class="col">
                <label for="address">Staff Email</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo $sta1['staff_email']; ?>">
            </div>
            
            
            
            <div class="col">
                <label for="sals_id">Salary</label>
                <select name="sal_id" id="sal_id" class="form-control">
                    <?php foreach ($salaries as $pay) { ?>
                        
                        <option value="<?php echo $pay['sal_id']; ?>">
                        <?php echo $pay['amount']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col">
        <label for="dept_id">Department</label>
        <select id="dept_id" name="dept_id" class="form-control">
        
         <?php foreach ($depart as $depts) { ?>
        <option value="<?php echo $depts["dept_id"]; ?>"><?php echo $depts["dept_name"]; ?></option>
        <?php } ?>
        </select>

            </div>
            <label for="ben_id">Benefit</label>
<select id="ben_id" name="ben_id" class="form-control">
    <option value=""></option>
    <?php foreach ($ben as $bens) { ?>
        <option value="<?php echo $bens["ben_id"]; ?>" <?php if (isset($_POST["ben_id"]) && $_POST["ben_id"] == $bens["ben_id"]) echo 'selected'; ?>><?php echo $bens["ben_id"]; ?></option>
    <?php } ?>
</select>

        </div>

        <div class="form-outline mb-4">
            <button type="submit" class="btn btn-primary btn-lg" name="editstaff">Update Staff Info</button>
        </div>
    </form>
    <!-- Rest of your HTML code -->
</div>
</body>
</html>

<footer class="bg-primary py-3">
    <p class="text-center text-white">&copy; 2023 ALL RIGHTS RESERVED</p>
</footer>

<script src="../assets/scripts/pooper.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/scripts/script.js" crossorigin="anonymous"></script>
</body>
</html>

<?php
require_once("partials/footer.php");
?>