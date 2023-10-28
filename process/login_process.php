<?php
session_start();
include_once "../classes/Db.php";

class Admin extends Db {
    public function admin_login($admin_email, $admin_password) {
        $sql = "SELECT * FROM admin WHERE admin_email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $admin_email, PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            if (password_verify($admin_password, $admin['admin_password'])) {
                $_SESSION['admin_id'] = $admin['admin_id'];
                header("location:../profile.php");
                exit();
            }
        }

        $_SESSION['login_error'] = "Invalid email or password.";
        header("location:login.php"); // Redirect to the login page with an error message
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admin_email = $_POST["email"];
    $admin_password = $_POST["password"];

    $admin = new Admin();
    $admin->admin_login($admin_email, $admin_password);
}
?>
