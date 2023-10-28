<?php
error_reporting(E_ALL);
require_once "classes/Staff.php";

if ($_GET) {
    if (isset($_GET["id"])) {
        $staff_id = $_GET["id"];

        $staff1 = new Staff();
        $deleted = $staff1->delete_staff($staff_id);

        if ($deleted) {
            header("location:staffpage.php");
            exit();
        } else {
            echo "Delete process not successful";
        }
    }
}
?>

