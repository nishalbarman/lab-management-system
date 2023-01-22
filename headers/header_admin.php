<?php // include("../core/base.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="../includes/css/headers.css" rel="stylesheet">
    <link href="../includes/css/insert_card.css" rel="stylesheet">
    <style>
    .hide {
        display: none;
    }
    </style>
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
    </style>
    <script>
    let BASE_URL;
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
        BASE_URL = "http://localhost/hk_new";
    } else {
        BASE_URL = "http://65.0.101.158";
    }
    </script>
    <title></title>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title></title>
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z">
            </path>
        </symbol>
    </svg>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <image class="bi me-2" width="45" height="45" role="img" aria-label="HealthKind"
                        src="<?php echo $BASE_URL; ?>/assets/logo/hk.png" />
                    <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg> -->
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ">
                    <li><a href="<?php if ($_SESSION['role'] === 1) {
                        echo $BASE_URL . '/csr-admin/dashboard.php';
                    } else if ($_SESSION['role'] === 0) {
                        echo $BASE_URL . '/technician/dashboard.php';
                    } ?>" class="nav-link px-2 link-dark">Dashboard</a></li>
                    <li><a href="<?php if ($_SESSION['role'] === 1) {
                        echo $BASE_URL . '/csr-admin/templ-list.php';
                    } else if ($_SESSION['role'] === 0) {
                        echo $BASE_URL . '/technician/templ-list.php';
                    } ?>" class=" nav-link px-2 link-dark">Templates</a></li>

                    <?php if ($_SESSION['role'] === 1) { ?>
                    <li><a href="<?php echo $BASE_URL; ?>/templates/decl-temp/tmp_declare.php"
                            class="nav-link px-2 link-dark">Generate-New-Template</a></li>

                    <?php } ?>

                    <?php if ($_SESSION['role'] === 0) { ?>
                    <li><a href="<?php echo $BASE_URL; ?>/technician/report-list.php"
                            class="nav-link px-2 link-dark">Report List</a></li>

                    <?php } ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: red;">
                            Others
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($_SESSION['role'] === 1) { ?>
                            <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>/csr-admin/report-list.php"
                                    class="nav-link px-2 link-dark">Report List</a></li>

                            <?php } ?>

                            <!-- <?php if ($_SESSION['role'] === 1) { ?>
                                                                                                                    <li><a class="dropdown-item" href="#" class="nav-link px-2 link-dark" data-bs-toggle="modal"
                                                                                                                            data-bs-target="#exampleModal">Insert iCard</a></li>

                            <?php } ?> -->

                            <?php if ($_SESSION['role'] === 1) { ?>
                            <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>/csr-admin/card-record-list.php"
                                    class="nav-link px-2 link-dark">Card List (DB)</a></li>
                            <?php } ?>

                            <?php if ($_SESSION['role'] === 1) { ?>
                            <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>/csr-admin/users-record-list.php"
                                    class="nav-link px-2 link-dark">User List (DB)</a></li>
                            <?php } ?>

                            <?php if ($_SESSION['role'] === 1) { ?>
                            <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>/csr-admin/views-record-list.php"
                                    class="nav-link px-2 link-dark">Views List (DB)</a></li>
                            <?php } ?>

                            <?php if ($_SESSION['role'] === 1 || $_SESSION['role'] === 0) { ?>
                            <li><a class="dropdown-item" href="" class="nav-link px-2 link-dark" data-bs-toggle="modal"
                                    data-bs-target="#upload-report-manually">Custom Upload</a></li>
                            <?php } ?>

                            <li><a class="dropdown-item" href="#">Report Retrieve (TXN)</a></li>
                            <!-- <li><a class="dropdown-item" href="#"></a></li> -->
                            <li><a class="dropdown-item" href="#">QR Creation</a></li>
                            <li><a class="dropdown-item" href="#">Download</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Contact Admin</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="#" class="nav-link px-2 link-dark">Others</a></li> -->
                    <!-- <li><a href="#" class="nav-link px-2 link-dark">Settings</a></li> -->
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input id="search-input" type="search" class="form-control" placeholder="Search..."
                        aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img id="profile-pic"
                            src="<?php echo $BASE_URL . '/uploads/profile_pic/' . $_SESSION['profile']; ?>" alt="mdo"
                            width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <!-- <li><a class="dropdown-item" href="#">New project...</a></li> -->
                        <li><a class="dropdown-item" href="../services/profile-setting.php">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Server Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo $BASE_URL; ?>/logout.php">Sign
                                out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>


    <!-- Modals start here -->

    <!-- Card insert modal -->
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modals/card-insert-modal.php'); ?>

    <!-- Add User Modal -->
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modals/reg-modal.php'); ?>

    <!-- Manual Upload Modal -->
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modals/custom-upload-modal.php'); ?>

    <!-- PDF Preview Modal -->
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modals/pdf-preview-modal.php'); ?>

    <!-- New Or Update Template Modal -->
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modals/report-template-modal.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>