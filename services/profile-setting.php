<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!$_SESSION) {
    header('location: ../auth.php');
    exit;
}

if ($_SESSION["role"] !== 1 && $_SESSION["role"] !== 0) {
    echo "<script>alert('Action not allowed');</script>";
    exit;
}

// include '../headers/header_admin.php';
include '../core/base.php';
include '../includes/config/connect.php';

// if (isset($_POST['maintenance'])) {
//     $value = $_POST['sel'];
//     $sql1 = "UPDATE `maintenance` SET `maintenance`= '" . $value . "' WHERE 1=1";
//     if ($conn->query($sql1)) {
//         echo "<script>
// alert('Success');
// </script>";
//     } else {
//         echo "<script>
// alert('Failed');
// </script>";
//     }
// }

$sqls = "select `maintenance` from `maintenance`";
$resultss = $conn->query($sqls);
if ($resultss->num_rows > 0) {
    // output data of each row
    while ($rows = $resultss->fetch_assoc()) {
        $m = $rows["maintenance"];
    }
}

if (isset($_POST['submit'])) {

    $error = array();

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $sql = "UPDATE `auth` SET `name`=? WHERE `email`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $_SESSION['email']);
        $stmt->execute();

        if ($stmt->error) {
            $error[] = "Error in updating of name";
        } else {
            $_SESSION['name'] = $name;
        }
    }

    if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && $_POST['oldpassword'] !== "" && $_POST['newpassword'] !== "") {
        $newpassword = $_POST['newpassword'];
        $oldpassword = $_POST['oldpassword'];

        $sql = "SELECT * FROM `auth` WHERE `email`=? AND `password`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $_SESSION['email'], $oldpassword);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        if ($count > 0) {
            $sql = "UPDATE `auth` SET `password`=? WHERE `email`=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $newpassword, $_SESSION['email']);
            $stmt->execute();

            if ($stmt->error) {
                $error[] = "Error in updating of password";
            }
        } else {
            $error[] = "Old Password Was Invalid.";
        }
    }

    // if (isset($_POST['email'])) {
    //     $email = $_POST['email'];
    //     $sql1 = $sql . "`email`=?";
    //     $bind_p = "s";
    //     $stmt = $conn->prepare($sql1);
    //     $stmt->bind_param($bind_p, $email);
    //     $stmt->execute();
    //     if ($stmt->get_warnings()) {
    //         $error = "Error in updating of email";
    //     }
    // }

    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
        $sql = "UPDATE `auth` SET `phone`=? WHERE `email`=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $phone, $_SESSION['email']);
        $stmt->execute();
        if ($stmt->error) {
            $error[] = "Error in updating of name";
        } else {
            $_SESSION['phone'] = $phone;
        }
    }

    if (($_POST['image-got'] == 1)) {
        if ($_SESSION['role'] === 1) {
            $pic = "superior_" . time() . "_" . $_FILES['pic']['name'];
        } else if ($_SESSION['role'] === 0) {
            $pic = "technician_" . time() . "_" . $_FILES['pic']['name'];
        } else if ($_SESSION['role'] === 2) {
            $pic = "client_" . time() . "_" . $_FILES['pic']['name'];
        }
        $destination = "../uploads/profile_pic/";
        $temp_name = $_FILES['pic']['tmp_name'];
        $old_pic = $_SESSION['profile'];

        if (move_uploaded_file($temp_name, $destination . $pic)) {

            $sql = "UPDATE `auth` SET `image`=? WHERE `email`=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $pic, $_SESSION['email']);
            $stmt->execute();
            if ($stmt->error) {
                $error[] = "Error in updating of photo";
            } else {
                $_SESSION['profile'] = $pic;
                unlink($destination . $old_pic);
            }
        }

        if (!$error) {
            echo "<script>alert('Settings Updated!');</script>";
        } else {
            echo "<script>alert('Settings Update Failed!');</script>";
        }
    }

}

$conn->close();
?>

<html>

<head>
    <title>HealthKind Setting - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/server_setting.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <?php include '../headers/header_admin.php'; ?>
    <style>
    #search-input {
        display: none;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    </style>
</head>

<body onload="checkMan()">

    <div class="form-outer">
        <div class='signup-container'>
            <div class='left-container'>
                <!-- <h1>
                    <svg width="60" height="60" version="1.0" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 240.000000 211.000000" preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,211.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M1515 1733 c-140 -30 -211 -49 -265 -70 l-64 -26 -91 31 c-174 59
-363 78 -476 46 -167 -47 -228 -226 -138 -409 l34 -70 172 -3 172 -2 30 -37
30 -36 15 37 c9 21 25 68 36 106 11 38 28 76 36 85 19 18 68 20 82 3 5 -7 24
-58 41 -113 18 -55 34 -107 37 -115 4 -9 15 8 29 45 12 33 40 108 63 166 52
137 67 166 93 174 42 14 66 -13 104 -114 20 -53 46 -122 58 -153 l22 -58 160
0 161 0 26 54 c15 30 34 89 43 131 14 70 14 83 0 137 -25 99 -68 146 -162 177
-59 20 -188 27 -248 14z" />
                            <path d="M1330 1263 c-19 -49 -54 -140 -80 -203 l-46 -115 -44 0 -44 0 -37
119 c-20 65 -38 115 -41 110 -3 -5 -13 -36 -23 -69 -21 -75 -29 -85 -70 -85
-28 0 -42 10 -88 60 l-54 60 -278 -2 c-250 -3 -279 -5 -289 -20 -23 -37 5 -43
204 -46 l189 -4 73 -69 c102 -99 303 -232 460 -306 l47 -22 68 37 c129 72 272
174 371 267 l98 93 177 4 c186 3 213 10 191 46 -10 15 -42 17 -326 22 -237 4
-319 8 -331 18 -8 7 -30 53 -48 102 -19 50 -36 90 -40 90 -3 0 -21 -39 -39
-87z" />
                            <path d="M805 1180 c-7 -12 2 -30 16 -30 5 0 9 9 9 20 0 21 -15 27 -25 10z" />
                            <path d="M1131 473 c-5 -10 -5 -36 -1 -58 7 -39 8 -39 9 -7 0 17 6 32 12 32 8
0 8 4 0 13 -8 10 -7 17 1 25 9 9 9 12 0 12 -6 0 -15 -8 -21 -17z" />
                            <path d="M790 461 c-13 -26 -13 -54 2 -69 15 -15 58 -16 58 -1 0 5 -4 8 -9 5
-17 -11 -41 6 -41 29 0 26 24 50 40 40 5 -3 10 -1 10 4 0 19 -49 12 -60 -8z" />
                            <path d="M880 450 c-12 -8 -11 -10 8 -10 12 0 22 -4 22 -10 0 -5 -9 -10 -20
-10 -13 0 -20 -7 -20 -20 0 -16 7 -20 30 -20 26 0 30 4 30 28 0 25 -15 52 -29
52 -4 0 -13 -5 -21 -10z m30 -50 c0 -5 -4 -10 -9 -10 -6 0 -13 5 -16 10 -3 6
1 10 9 10 9 0 16 -4 16 -10z" />
                            <path d="M968 452 c-13 -2 -18 -13 -18 -38 0 -19 5 -34 10 -34 6 0 10 13 10
29 0 16 6 31 13 34 17 6 5 14 -15 9z" />
                            <path d="M1020 446 c-6 -8 -10 -25 -8 -38 2 -18 10 -23 33 -25 25 -2 26 -1 7
5 -13 4 -23 10 -23 15 1 4 1 14 1 22 0 8 5 15 11 15 6 0 9 -7 5 -15 -3 -8 -1
-15 5 -15 16 0 23 31 8 41 -19 12 -25 11 -39 -5z" />
                            <path d="M1185 444 c-28 -29 1 -75 39 -61 21 8 22 63 0 71 -21 8 -20 8 -39
-10z m40 -29 c0 -28 -29 -25 -33 3 -3 19 0 23 15 20 10 -2 18 -12 18 -23z" />
                            <path d="M1278 453 c-13 -3 -18 -14 -18 -39 0 -19 5 -34 10 -34 6 0 10 11 10
25 0 13 7 28 16 33 19 11 7 20 -18 15z" />
                            <path d="M1446 447 c-11 -8 -17 -23 -14 -38 2 -19 9 -24 33 -24 24 0 31 5 33
23 3 22 -13 52 -27 52 -4 0 -15 -6 -25 -13z m34 -32 c0 -16 -6 -25 -15 -25 -9
0 -15 9 -15 25 0 16 6 25 15 25 9 0 15 -9 15 -25z" />
                            <path d="M1365 411 c7 -22 11 -42 8 -45 -4 -3 -2 -6 4 -6 6 0 18 20 26 45 9
25 12 45 7 45 -5 0 -12 -10 -16 -22 l-7 -23 -10 23 c-17 38 -27 24 -12 -17z" />
                            <path d="M1522 418 c3 -28 7 -33 31 -34 25 -1 27 2 26 35 -1 35 -2 35 -8 7 -9
-41 -31 -46 -31 -7 0 17 -5 31 -11 31 -6 0 -9 -14 -7 -32z" />
                        </g>
                    </svg>
                    <span style="color: white;">HEALTHKIND LAB</span>
                </h1> -->
                <div class='puppy'>
                    <!-- <img src='../assets/logo/logo-nobg.png' style="width: ; height: ;"> -->
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="100%" height="80px"
                        viewBox="0 0 530.000000 96.000000" preserveAspectRatio="xMidYMid meet"
                        style="padding: 0px 20px 0px 10px">

                        <g transform="translate(0.000000,96.000000) scale(0.100000,-0.100000)" fill="#000000"
                            stroke="none">
                            <path d="M385 867 c-53 -25 -70 -53 -70 -116 0 -31 7 -69 15 -86 14 -28 18
-29 95 -33 51 -2 85 -8 94 -17 13 -12 17 -7 33 37 10 29 22 56 27 61 19 19 40
-3 56 -60 l17 -58 33 89 c19 49 39 94 45 100 18 18 42 -6 61 -61 32 -94 31
-93 114 -93 l73 0 17 51 c23 70 15 123 -25 163 -30 30 -33 31 -118 30 -64 -1
-101 -6 -139 -22 l-52 -21 -57 19 c-78 27 -180 35 -219 17z" />
                            <path d="M711 594 c-18 -49 -39 -95 -46 -103 -22 -23 -42 -5 -56 49 l-13 51
-18 -35 c-10 -20 -23 -36 -30 -36 -6 0 -25 16 -44 35 l-33 35 -116 -1 c-119 0
-145 -4 -145 -20 0 -5 41 -9 90 -9 l90 0 57 -54 c32 -30 93 -76 136 -102 l78
-47 43 20 c44 22 178 126 208 162 16 18 29 21 100 21 46 -1 889 0 1873 1 985
0 1870 0 1968 0 l177 -1 0 -35 c0 -19 3 -35 6 -35 4 0 42 19 85 42 l78 42 -77
43 c-42 23 -80 43 -84 43 -5 0 -8 -18 -8 -40 l0 -40 -1898 0 c-1044 0 -2000 3
-2124 7 l-226 6 -18 45 -19 46 -34 -90z" />
                            <path d="M1190 325 l0 -155 45 0 45 0 0 65 0 65 55 0 55 0 0 -65 0 -65 45 0
45 0 0 155 0 155 -45 0 -45 0 0 -50 0 -50 -55 0 -55 0 0 50 0 50 -45 0 -45 0
0 -155z" />
                            <path d="M2120 325 l0 -155 40 0 40 0 0 155 0 155 -40 0 -40 0 0 -155z" />
                            <path d="M2318 459 c-26 -13 -38 -26 -38 -40 0 -12 -8 -23 -20 -26 -13 -3 -20
-14 -20 -29 0 -17 6 -24 20 -24 18 0 20 -7 20 -69 0 -85 12 -101 76 -101 42 0
44 1 44 29 0 24 -3 28 -20 24 -18 -5 -20 0 -20 56 0 54 2 61 20 61 15 0 20 7
20 25 0 18 -5 25 -19 25 -16 0 -20 8 -23 44 l-3 44 -37 -19z" />
                            <path d="M2450 325 l0 -155 40 0 40 0 0 73 c0 75 9 97 41 97 23 0 29 -20 29
-101 l0 -69 40 0 40 0 0 95 c0 82 -3 98 -20 115 -24 24 -77 26 -108 4 -22 -15
-22 -15 -22 40 l0 56 -40 0 -40 0 0 -155z" />
                            <path d="M2740 325 l0 -155 40 0 c39 0 40 1 40 34 0 33 21 63 38 52 5 -3 17
-23 27 -46 17 -38 20 -40 62 -40 l45 0 -28 48 c-66 112 -64 96 -19 142 l39 40
-44 0 c-40 0 -49 -4 -82 -42 l-37 -43 -1 83 0 82 -40 0 -40 0 0 -155z" />
                            <path d="M3030 455 c0 -22 4 -25 40 -25 36 0 40 3 40 25 0 23 -4 25 -40 25
-36 0 -40 -2 -40 -25z" />
                            <path d="M3600 430 c0 -47 -1 -50 -19 -40 -88 47 -167 -50 -126 -156 24 -64
76 -83 130 -48 23 15 25 15 25 0 0 -12 9 -16 35 -16 l35 0 0 155 0 155 -40 0
-40 0 0 -50z m-12 -102 c17 -17 15 -83 -4 -99 -34 -28 -75 33 -55 84 11 29 38
36 59 15z" />
                            <path d="M3890 325 l0 -155 120 0 120 0 0 40 0 40 -75 0 -75 0 0 115 0 115
-45 0 -45 0 0 -155z" />
                            <path d="M4470 325 l0 -155 35 0 c24 0 35 5 35 15 0 19 14 19 30 0 21 -25 68
-18 101 14 26 26 29 37 29 89 0 49 -4 64 -25 87 -22 22 -32 26 -63 23 -20 -3
-45 -8 -54 -12 -16 -7 -18 -2 -18 43 l0 51 -35 0 -35 0 0 -155z m151 -12 c12
-31 0 -72 -25 -87 -14 -9 -21 -6 -37 13 -23 28 -24 49 -3 79 21 30 52 28 65
-5z" />
                            <path d="M4248 400 c-68 -13 -92 -53 -37 -65 22 -5 36 -2 49 10 22 20 70 13
70 -10 0 -13 -55 -35 -88 -35 -7 0 -26 -7 -42 -15 -24 -13 -30 -22 -30 -50 0
-59 68 -84 134 -50 35 18 36 18 36 0 0 -10 11 -15 35 -15 l35 0 0 80 c0 93
-17 137 -55 145 -54 11 -71 12 -107 5z m72 -166 c-7 -7 -26 -14 -42 -14 -44 0
-35 39 12 55 32 11 35 10 38 -7 2 -11 -2 -26 -8 -34z" />
                            <path d="M1571 374 c-53 -44 -54 -123 -1 -175 24 -25 36 -29 82 -29 54 0 118
28 118 51 0 12 -72 8 -102 -5 -17 -8 -58 24 -58 44 0 6 35 10 85 10 84 0 85 0
85 25 0 34 -25 82 -49 95 -11 5 -44 10 -75 10 -44 0 -60 -5 -85 -26z m113 -30
c30 -29 20 -44 -29 -44 -49 0 -53 5 -29 38 18 26 37 28 58 6z" />
                            <path d="M1850 380 c-27 -27 -25 -37 10 -45 20 -4 37 -1 52 9 29 20 57 20 65
1 8 -21 5 -23 -72 -44 -71 -20 -85 -31 -85 -68 0 -54 88 -85 136 -48 25 19 34
19 34 0 0 -10 11 -15 35 -15 l35 0 0 90 c0 83 -2 93 -25 115 -21 22 -33 25
-95 25 -57 0 -74 -4 -90 -20z m120 -146 c-7 -7 -26 -14 -42 -14 -44 0 -35 39
12 55 32 11 35 10 38 -7 2 -11 -2 -26 -8 -34z" />
                            <path d="M3035 391 c-3 -2 -5 -53 -5 -113 l0 -108 40 0 40 0 0 109 0 109 -35
4 c-20 2 -38 2 -40 -1z" />
                            <path d="M3170 285 l0 -115 40 0 39 0 3 76 c2 59 7 79 20 87 32 21 48 -8 48
-89 l0 -74 40 0 40 0 0 86 c0 81 -10 120 -34 136 -21 15 -74 8 -100 -13 l-26
-20 0 20 c0 17 -6 21 -35 21 l-35 0 0 -115z" />
                            <path d="M1003 123 c26 -2 67 -2 90 0 23 2 2 3 -48 3 -49 0 -68 -1 -42 -3z" />
                            <path d="M1823 123 c372 -2 982 -2 1355 0 372 1 67 2 -678 2 -745 0 -1050 -1
-677 -2z" />
                            <path d="M4073 123 c119 -2 315 -2 435 0 119 1 21 2 -218 2 -239 0 -337 -1
-217 -2z" />
                        </g>
                    </svg>

                </div>
            </div>
            <div class='right-container'>
                <form action="" method="post" enctype="multipart/form-data">
                    <header>
                        <h1>Yay, Boii ! Change some setting, it don't really hearts!</h1>
                        <div class='set'>
                            <div class='pets-name'>
                                <label for='pets-name'>Name</label>
                                <input id='pets-name' placeholder="Your name" type='text'
                                    value="<?php echo $_SESSION['name']; ?>" name="name">
                            </div>
                            <div class='pets-photo'>

                                <span style="font-size: 40px" class="material-symbols-outlined">
                                    cloud_upload
                                </span>

                                <label id="pic_label" for='image'>&nbsp;Update Profile</label>
                                <input id="image" class="inputfile" type="file" name="pic"
                                    onchange="document.getElementById('pic_label').innerHTML = '&nbsp;File Accessed';document.getElementById('image-got').value = '1';" />
                                <input id="image-got" type="hidden" value="0" name="image-got" />
                            </div>
                        </div>
                        <div class='set'>
                            <div class='pets-breed'>
                                <label for='pets-breed'>Email</label>
                                <input id='pets-breed' placeholder="email@me.com" type='email'
                                    value="<?php echo $_SESSION['email']; ?>" disabled readonly>
                            </div>
                            <div class='pets-birthday'>
                                <label for='pets-birthday'>Phone</label>
                                <input id='pets-birthday' name="phone" placeholder='+910000000000' type='number'
                                    value="<?php echo $_SESSION['phone']; ?>">
                            </div>
                        </div>
                        <div class='set'>
                            <div class='pets-gender'>
                                <label for='pet-gender-female'>Gender</label>
                                <div class='radio-container'>
                                    <input checked='' id='pet-gender-female' name='gender' type='radio' value='female'>
                                    <label for='pet-gender-female'>Female</label>
                                    <input id='pet-gender-male' name='gender' type='radio' value='male'>
                                    <label for='pet-gender-male'>Male</label>
                                </div>
                            </div>
                            <div class='pets-spayed-neutered'>
                                <label for='pet-spayed'>Maintenance</label>
                                <div class='radio-container'>
                                    <input checked='' id='pet-spayed' name='maintenance' type='radio' value='true'>
                                    <label for='pet-spayed'>True</label>
                                    <input id='pet-neutered' name='maintenance' type='radio' value='false'>
                                    <label for='pet-neutered'>False</label>
                                </div>
                            </div>
                        </div>

                        <div class='set'>
                            <div class='pets-breed'>
                                <label for='pets-breed'>Old Password</label>
                                <input id='pets-breed' placeholder="Pass" type='password' value="" name="oldpassword">
                            </div>
                            <div class='pets-birthday'>
                                <label for='pets-birthday'>New Password</label>
                                <input id='pets-birthday' placeholder="Pass" type='text' value="" name="newpassword">
                            </div>
                        </div>
                        <div class='pets-weight'>
                            <label style="margin-top: 10px;">Status :
                                <?php if ($m == true) {
                                    echo "In Maintenance";
                                } else {
                                    echo "Not In Maintenance";
                                }
                                ;
                                ?></label>
                        </div>
                    </header>
                    <footer>
                        <div class='set'>
                            <!-- <button id='back'>Back</button> -->
                            <input type="submit" name="submit" id='submit' class="server-btn" value="Update">
                        </div>
                    </footer>
                </form>
            </div>
        </div>
    </div>
    <script src=" js/server_setting.js"></script>

</body>

</html>