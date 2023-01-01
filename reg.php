<?php
// Initialize the season
session_start();
include("core/base.php");

if (isset($_SESSION['logged']) && $_SESSION('logged') !== null) { // If season not exist
    if ($_SESSION['role'] === 0) { // If technician
        header("location: ./technician/dashboard.php");
        exit;
    } else if ($_SESSION['role'] === 1) { // If admin
        header("location: ./csr-admin/dashboard.php");
        exit;
    } else if ($_SESSION['role'] === 2) { // If normal user
        header("location: ./client/index.php");
        exit;
    }
}

include('includes/config/connect.php');

if (isset($_POST['submit'])) {

    $sql = "INSERT INTO `auth` (`name`,`email`,`phone`,`password`,`role`, `image`) VALUES(?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $name, $email, $phone, $password, $role, $pic);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $pic = time() . "_" . $_FILES['image']['name'];

    $destination = "uploads/profile_pic/" . $pic;
    ;

    $check = getimagesize($_FILES['image']['tmp_name']);

    if ($check !== false) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            $stmt->execute();
            $stmt->close();
            echo "<script>
                alert('Registration Successfull, You May Login Now.');
                window.location = './auth.php';
            </script>";
            exit;

        } else {

            echo "<script>
                alert('Registration Failed, Please try again.');
            </script>";
            // Call an modal
        }
    } else {
        echo "<script>
                alert('Registration Failed, Please try again.');
            </script>";
        // Call an modal
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./includes/css/auth.css" rel="stylesheet">
</head>

<body>


    <div class="main">

        <form action="" class="registration" method="post" enctype="multipart/form-data">
            <h1>Register</h1>

            <label class="pure-material-textfield-outlined">
                <input type="text" class="form-control" aria-label="Full name" aria-describedby="inputGroup-sizing-lg"
                    placeholder="Name" name="name">
            </label>

            <label class="pure-material-textfield-outlined">
                <input type="text" class="form-control" aria-label="Email Id" aria-describedby="inputGroup-sizing-lg"
                    placeholder="example@email.com" name="email">

            </label>


            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">+91</span>
                <input type="number" class="form-control" placeholder="Phone" aria-label="Phone Number"
                    aria-describedby="basic-addon1" name="phone">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Profile Picture</label>
                <input name="image" class="form-control" type="file" id="formFile" accept="image/*">
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Role
                </label>
                <select name="role" class="form-select" id="inputGroupSelect01">
                    <option selected>Choose...</option>
                    <option value="2">User</option>
                    <option value="1">Admin</option>
                    <option value="0">Technician</option>
                </select>
            </div>

            <label class="pure-material-textfield-outlined">
                <input type="password" class="form-control" aria-label="Password"
                    aria-describedby="inputGroup-sizing-lg" id="inputPassword" placeholder="Password" name="password">
            </label>

            <label class="pure-material-textfield-outlined">
                <input type="password" class="form-control" aria-label="Password"
                    aria-describedby="inputGroup-sizing-lg" id="inputPassword" placeholder="Confirm Password"
                    name="cpassword">
            </label>

            <label class="pure-material-checkbox">
                <input type="checkbox" required>
                <span>I agree to the <a href="<?php $BASE_URL; ?>" target="_blank"
                        title="Actually not a Terms of Service">Terms of Service</a></span>
            </label>

            <input id="button" name="submit" type="submit" style="width: 70%" class="btn btn-outline-success btn-lg"
                value="SignUp">

            <div class="done">
                <h1>👌 Registering!</h1>
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
            <a href="./auth.php">LogIn Instead</a>
        </div>
    </div>

    <script src="./includes/js/auth.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>