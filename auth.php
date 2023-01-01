<?php

session_start();
include("core/base.php");

if (isset($_SESSION['loggedin'])) { // If season not exist
    if ($_SESSION['role'] === 0) { // If technician
        header("location: ./technician/dashboard.php");
        exit;
    } else if ($_SESSION['role'] === 1) { // If admin
        header("location: ./csr-admin/dashboard.php");
        exit;
    } else if ($_SESSION['role'] === 2) { // If normal user
        header("location: ./client/dashboard.php");
        exit;
    }
}

include('includes/config/connect.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $role = (int) $role;

    $sql = "SELECT * FROM `auth` WHERE `email`=? AND `password`=? AND `role`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $email, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();
    // $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION = array();
        session_destroy();

        session_start();
        while ($row = $result->fetch_assoc()) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['profile'] = $row['image'];
            $_SESSION['loggedin'] = true;
        }

        if ((int) $_SESSION['role'] === 0) { // If technician
            header("location: ./technician/dashboard.php");
            exit;
        } else if ((int) $_SESSION['role'] === 1) { // If admin
            header("location: ./csr-admin/dashboard.php");
            exit;
        } else if ((int) $_SESSION['role'] === 2) { // If normal user
            header("location: ./client/dashboard.php");
            exit;
        }

    } else {
        echo "<script>
        alert('Log In Failed.');
    </script>";
        // Call Modal here
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login To Your Account</title>
    <meta name="description" content="Login Page for Health Kind Reports">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="./includes/css/auth.css" rel="stylesheet">

</head>

<body>

    <div class="main">
        <form class="registration" action="" method="post" enctype="multipart/form-data">
            <h1>👋 Welcome!</h1>

            <label class="pure-material-textfield-outlined">
                <input type="text" class="form-control" aria-label="Email Id" aria-describedby="inputGroup-sizing-lg"
                    placeholder="example@email.com" name="email">

            </label>

            <label class="pure-material-textfield-outlined">
                <input type="password" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-lg" id="inputPassword" placeholder="Password" name="password">
            </label>

            <div class=" input-group mb-3">
                <label class=" input-group-text" for="inputGroupSelect01">Role
                </label>
                <select class="form-select" id="inputGroupSelect01" name="role">
                    <option selected>Choose...</option>
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                    <option value="0">Technician</option>
                </select>
            </div>



            <!-- <label class="pure-material-checkbox">
            <input type="checkbox" required>
            <span>I agree to the <a href="https://codepen.io/collection/nZKBZe/" target="_blank"
                    title="Actually not a Terms of Service">Terms of Service</a></span>
        </label> -->

            <input id="button" type="submit" style="width: 70%" class="btn btn-outline-success btn-lg" name="submit"
                value="Log In">

            <div class="done">
                <h1>👌 Authenticating!</h1>
                <a class="pure-material-button-text" href="javascript:window.location.reload(true)">Try Again</a>
            </div>
            <div class="progress">
                <progress class="pure-material-progress-circular" />
            </div>
        </form>

        <div class="left-footer">
            Health Kind Lab<br />
            <a href="#" target="_top">Twitter</a> &nbsp; | &nbsp;
            <a href="#" target="_top">LinkedIn</a> &nbsp; | &nbsp;
            <a href="#" target="_top">CodePen</a>
        </div>
        <div class="right-footer">
            Check out<br />
            <a href="./reg.php">SignUp Instead</a>
        </div>
    </div>

    <script src="./includes/js/auth.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>