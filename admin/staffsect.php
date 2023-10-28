<?php
error_reporting(E_ALL);
include_once "classes/Staff.php";
include_once "classes/State.php";


$staff1 = new Staff();
$staffData = $staff1->fetch_all_staffs(); // fetch staff data

$state = new State();
  $states =  $state->fetch_state();

?>

<!DOCTYPE html>
<html lang="en">
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

<head>
   
</head>

<body>
    <header>
        <h3>Our Staff</h3>
    </header>

    <section class="staff-members">
        <h4>Staff Members</h4>
        <a href="staffpage.php">Go Back</a>
        <div class="container">
            <!-- creating the staff page in different sections using table tag -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                         
                    </tr>
                </thead>
                <tbody>
                
                
                    <?php foreach ($staffData as $sta) { ?>
                    
                          <tr>
                          
                                <td><?php echo $sta['staff_fullname']; ?></td>
                                <td><?php echo $sta['staff_phone']; ?></td>
                                <td><?php echo $sta['staff_email']; ?></td>
                               
                            </tr>
                        <?php } ?>
                        
                    
                </tbody>
            </table>
        </div>
    </section>

    
</body>

</html>
