<?php
session_start();
// include_once "guards/user_guard.php";
require_once("partials/header.php");
require_once "classes/Admin.php";

if(isset($_SESSION["user_id"])){
    $user_id = $_SESSION["user_id"];
    
    $adm1 = new Admin();
    $admins= $admi1->admin_login($admin_email, $admin_password);
    // echo "<pre>";
    // print_r($user);
    // echo "</pre>";
}

?>
<div class="container">
    
    <div class="row">
         <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Welcome <?php echo isset($admins["admin_email"]); ?></h5>
      </div>
      <div class="card-body">
       <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <img src="assets/images/maleicon.png" class="img-fluid rounded-circle">
            </div>
             <div class="col-12 text-center">
            <a href="uploadprofilepicture.php" class="btn btn-primary btn-block btn-sm">
          Change Picture
          </a>
       </div>
            <hr>
            <div>
            <!-- <span><b><?php echo isset($admins["user_fullname"]);?></b></span>  -->
            <span><i>Member Since</i></span> 
        </div>
        </div>

      
       </div>
      </div>
    </div>
  </div>
  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">PROFILE</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <p>You can use the navigation at the top of the page to move around the site and the navigations below to carry out tasks on the platform</p>
       <!-- <p><a href="editprofile.php">Edit My Profile</a></p> -->
        <p><a href="staffsect.php">Staff List</a></p>
         <p><a href="logout.php">Logout</a></p>
         <p><a href="staffpage.php">Staff Page</a></p>
         <p><a href="staffsection.php">Staff Section</a></p>

      </div>
    </div>
  </div>

 
</div>
</div>

 



<?php
require_once("partials/footer.php");
?>