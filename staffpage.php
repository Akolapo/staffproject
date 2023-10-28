<?php
session_start();
require_once "partials/header.php";
require_once "classes/Salary.php";
require_once "classes/Staff.php";
include_once "classes/Grade.php";
include_once "classes/State.php";
include_once "classes/Department.php";
include_once "classes/Benefit.php";




    $staff = new Staff();

$staffs = $staff->fetch_all_staffs();



?>

<div class="col-md-12 container-fluid mt-5">
    <div class="row">

        <div class="col-md-1 mb-4">
          <div class="card mb-4">
            

          </div>
        </div>
  

  <div class="col-md-12 mb-4">
    <div class="card mb-4">
      
      <div class="card-header py-3">
        <h5 class="mb-0">Staff List</h5>
      </div>
      <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["added"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["added"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["added"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
      </div>
      <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["edit"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["edit"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["edit"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
      </div>
      <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["deleted"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["deleted"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["deleted"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
      </div>
      <div>
      <a type="submit" class="btn btn-success" href="addstaff.php">Add New Staff</a>
        </div>
        <div>
            
        <div class="card-body">
             <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:20px;"><i class="fa-solid fa-arrow-right-arrow-left"></i> 
             << Go Back</a></p>
            </div>
            </div>
    <div class="table-responsive">
    <table class="table table-striped table-dark ">

            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>  
                <th scope="col">DOB</th>
                <th scope="col">Phone Number</th>
                <th scope="col">State</th>
                <th scope="col">State Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email Address</th>
                <th scope="col">Salary ID</th>
                <th scope="col">Salary</th>
                <th scope="col">Department ID</th>
                <th scope="col">Department</th>
                <th scope="col">Benefit ID</th>
                 <th scope="col">Actions</th>
                 

              </tr>
            </thead>

            <tbody>
              
              <?php foreach($staffs as $member) { 
                $id = $member["state_id"];
                $state = new State();
                $result = $state->get_state_detail($id);

                $id = $member["sal_id"];
                $salary = new Salary();
                $response = $salary->get_salary_detail($id);

                $id = $member["dept_id"];
                $depart= new Department();
                $answer = $depart->get_dept_detail($id);

                $id = $member["ben_id"];
                $benefit= new Benefit();
                $feedback = $benefit->get_benefit_detail($id);
                ?>
              <tr>
                  <td><?php  echo $member['staff_id']; ?></td>    
                  <td><?php  echo $member['staff_fullname']; ?></td>
                  <td><?php  echo $member['staff_dob']; ?></td>
                  <td><?php  echo $member['staff_phone']; ?></td>
                  <td><?php  echo $member['state_id']; ?></td>
                  <td><?php  echo $result['state_name']; ?></td>
                  <td><?php  echo $member['staff_gender']; ?></td>
                  <td><?php  echo $member['staff_email']; ?></td>    
                  <td><?php  echo $member['sal_id']; ?></td>    
                  <td><?php  echo $response['amount']; ?></td>    
                  <td><?php  echo $member['dept_id']; ?></td> 
                  <td><?php  echo $answer['dept_name']; ?></td> 
                  <td><?php  echo $member['ben_id']; ?></td> 


                  <td style="display:flex !important;">
                    
                  <a href="delete_staff.php?id=<?php echo $member["staff_id"]?>" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>Delete</a>
                    &nbsp;&nbsp;

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fa fa-list'></i>
                      View Details
                    </button>
                    &nbsp;&nbsp;

                    <a href="edit_staff.php?id=<?php echo $member["staff_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
                </td>
                </tr>
            <?php
                }
              ?>

            </tbody>
          </table>

      </div>
    </div>
  </div>
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>



<!-- Modal start-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">View Staff Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <h3 style="">Full Name: <?php  echo $member['staff_fullname']; ?></h3>
            <h3>Date of Birth:<?php  echo $member['staff_dob']; ?></h3>
                  <h3>Phone Number: <?php  echo $member['staff_phone']; ?></h3>
                  <h3>State of Origin: <?php  echo $result['state_name']; ?></h3>
                  <h3>Gender: <?php  echo $member['staff_gender']; ?></h3>
                  <h3>Email Address: <?php  echo $member['staff_email']; ?></h3>    
                  <h3>Salary: <?php  echo $response['amount']; ?></h3>    
                  <h3>Department: <?php  echo $answer['dept_name']; ?></h3> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal end-->