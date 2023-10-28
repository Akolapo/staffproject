
<?php
require_once("partials/header.php");
require_once "../classes/Staff.php";
    if(isset($_GET["id"])){
        $staff_id = $_GET["id"];

        $staff1 = new Staff();
        $staff_detail = $staff1->fetch_all_staffs($staff_id);
        print_r($staff_detail);
    }
?>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1> Fullname:  <?php echo $staff_detail["staff_fullname"]; ?> </h1>
                    <h3>Date of Birth: <?php echo $staff_detail["staff_dob"]; ?></h3>
                    <h3>Contact: <?php echo $staff_detail["staff_phone"]; ?></h3>
                    <h3>Grade Level: <?php echo $staff_detail["staff_gradelevel"]; ?></h3>
                    <p>State of Origin: <?php echo $staff_detail["staff_stateoforigin"]; ?> </p>
                </div>

                <div class="col-md-6">
                    <!-- <h1>Add Summary for the Book</h1> -->
                    

                        <form action="#" method="post">

                            
                            
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a Summary" id="floatingTextarea2" style="height: 100px" name="sum_content"></textarea>
                                <label for="floatingTextarea2">Summary</label>
                            </div>

                           <div class="my-3"> <input type="submit" value="Add Summary" name="summarybtn" class="btn btn-primary"></div>
                        </form>

                </div>



            </div>
        </div>
    </section>






<?php
require_once("partials/footer.php");
?>