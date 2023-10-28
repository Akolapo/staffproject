<?php
error_reporting(E_ALL);
include_once "classes/Staff.php";
include_once "classes/Salary.php";
include_once "classes/Department.php";
include_once "classes/State.php";
include_once "classes/Grade.php";
include_once "classes/Benefit.php";




$dept = new Department();
$depart = $dept->fetch_all_staff_by_dept_id(); 

$state = new State();
$states = $state->fetch_state();

$sals = new Salary();
$salaries =$sals->fetch_salaries();

$grad = new Grade();
$grades= $grad->fetch_grade();

$benefit = new Benefit();
$ben = $benefit->fetch_benefit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Add New Staff</title>
</head>
<body>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="cat">Click to Add New Staff</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Staff Here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="process/addstaff_process.php" method="post" class="form-control">
         <div>

        <div class="py-5">
            <!-- <div>
                <input type="hidden" name="staff_id">
            </div> -->
            <div>
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" class="form-control" />
            </div>

            <div>
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id=""  class="form-control">
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="number" name="phone"  class="form-control">
            </div>
            <div class="col">
                <label for="grads_id">Grade Level</label>
                <select name="grad_id" id="grads_id" class="form-control">
                    <?php foreach ($grades as $grade) { ?>
                        <option value="#"></option>
                        <option value="<?php echo $grade['grad_id']; ?>"><?php echo $grade['grad_level']; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="col">
                <label for="sals_id">Salary</label>
                <select name="sal_id" id="sals_id" class="form-control">
                    <?php foreach ($salaries as $pay) { ?>
                        <option value="#"></option>
                        <option value="<?php echo $pay['sal_id']; ?>"><?php echo $pay['amount']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label for="gender">Gender</label>
                <input type="text" name="gender" class="form-control">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email"  class="form-control">
            </div>
            <label for="state_id">  State</label>
    <select id="state_id" name="state_id" class="form-control">
    <option value=""></option>
    <?php foreach ($states as $state) { ?>
        <option value="<?php echo $state["state_id"]; ?>" <?php if (isset($_POST["state_id"]) && $_POST["state_id"] == $state["state_id"]) echo 'selected'; ?>><?php echo $state["state_name"]; ?></option>
    <?php } ?>
</select>

<label for="dept_id">Department</label>
<select id="dept_id" name="dept_id" class="form-control">
    <option value=""></option>
    <?php foreach ($depart as $depts) { ?>
        <option value="<?php echo $depts["dept_id"]; ?>" <?php if (isset($_POST["dept_id"]) && $_POST["dept_id"] == $depts["dept_id"]) echo 'selected'; ?>><?php echo $depts["dept_name"]; ?></option>
    <?php } ?>
</select>
<label for="ben_id">Benefit</label>
<select id="ben_id" name="ben_id" class="form-control">
    <option value=""></option>
    <?php foreach ($ben as $bens) { ?>
        <option value="<?php echo $bens["ben_id"]; ?>" <?php if (isset($_POST["ben_id"]) && $_POST["ben_id"] == $bens["ben_id"]) echo 'selected'; ?>><?php echo $bens["ben_id"]; ?></option>
    <?php } ?>
</select>


            <div>
                <input type="submit" name="addbtn" value="Add" class="btn btn-success">
            </div>
            <br/>
            <a href="staffpage.php" class="btn btn-dark"><<< </a>
        </div>
         </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="assets/script/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
