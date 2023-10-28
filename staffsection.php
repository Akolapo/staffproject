<?php
error_reporting(E_ALL);
include_once "classes/Staff.php";
include_once "classes/Department.php";

$staff = new Staff();

$staffs = $staff->fetch_all_staffs();








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Page</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <header>
        <h1>Welcome to Our Staff Section Page</h1>
    </header>

    

    <section id="about">
    

 
        <h2>About Our Staff</h2>
        

            <?php foreach($staffs as $member) { 
                // $id = $member["state_id"];
                // $state = new State();
                // $result = $state->get_state_detail($id);

                $id = $member["sal_id"];
                $salary = new Salary();
                $response = $salary->get_salary_detail($id);

                $id = $member["dept_id"];
                $depart= new Department();
                $answer = $depart->get_dept_detail($id);

                // $id = $member["ben_id"];
                // $benefit= new Benefit();
                // $feedback = $benefit->get_benefit_detail($id);
                ?>

        <div class="col">
            <img src="assets/images/maleicon.png" alt="Staff 1">
            <h3>Name:<?php echo $member['staff_fullname'];?></h3>
            <p>Department: <?php echo $answer['dept_name']; ?></p>
            <p>Email: <?php echo $member['staff_email']; ?></p>

            <?php } ?>
        </div>
<!-- <div class="staff-member">
            <img src="staff2.jpg" alt="Staff 2">
            <h3>Jane Smith</h3>
            <p>Position: Team Lead</p>
        </div>
        <!-- Add more staff members here -->
    </section>        

    <!-- <section id="services">
        <h2>Our Services</h2>
        <ul>
            <li>Service 1: Description of service 1</li>
            <li>Service 2: Description of service 2</li>
            <li>Service 3: Description of service 3</li>
        </ul>
    </section> -->

    <!-- <section id="contact">
        <h2>Contact Us</h2>
        <p>Have questions or inquiries? Contact us.</p>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4"></textarea>
            <button type="submit">Submit</button> -->
        </form>
    </section>

    <!-- <footer>
        <p>&copy; 2023 Your Company Name</p>
    </footer> -->
</body>
</html>
