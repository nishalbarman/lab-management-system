<?php

session_start();
include("../../core/base.php");

if (isset($_SESSION['loggedin'])) { // If season not exist
    if ($_SESSION['role'] === 0) { // If technician
        header("location: ../../index.php");
        exit;
    } else if ($_SESSION['role'] === 2) { // If normal user
        header("location: ../../index.php");
        exit;
    }
}

include('../../includes/config/connect.php');

if (isset($_POST['submit'])) {

    $sql = "INSERT INTO `auth` (`name`,`email`,`phone`,`password`,`role`, `image`) VALUES(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $name, $email, $phone, $password, $role, $pic);

    $name = ucwords(strtolower($_POST['name']));
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $pic = time() . "_" . $_FILES['image']['name'];

    $destination = "../../uploads/profile_pic/" . $pic;

    $check = getimagesize($_FILES['image']['tmp_name']);

    if ($check !== false) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $stmt->execute();
            $stmt->close();
            echo "<script>
                alert('User addition Successfull.');
                window.location = '../users-record-list.php';
            </script>";
            exit;

        } else {

            echo "<script>
                alert('User addition Failed, Profile Upload Failed');
                window.location = '../users-record-list.php';
            </script>";
            // Call an modal
        }
    } else {
        echo "<script>
                alert('Please select a valid image file.');
                window.location = '../users-record-list.php';
            </script>";
        // Call an modal
    }
}

?>