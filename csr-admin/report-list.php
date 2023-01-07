<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION = array();
    session_destroy();
    header("location: ../logout.php");
} else {
    if ($_SESSION['role'] !== 1) {
        $_SESSION = array();
        session_destroy();
        header("location: ../logout.php");
    }
}
include("../core/base.php");
$is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');

if ($is_page_refreshed) {
    $_GET['id'] = '';
    $_GET['lid'] = '';
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Nishal Barman">
    <?php if ($_SESSION['role'] === 1) { ?>
    <title>HealthKind LAB | Admin Portal</title>
    <?php } else if ($_SESSION['role'] === 0) { ?>
    <title>HealthKind LAB | Technician Portal</title>
    <?php } else { ?>
    <title>HealthKind LAB | Client Portal</title>
    <?php } ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="../includes/css/card_styles.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
    html {
        scroll-behavior: smooth;
    }

    .row {
        padding: 0px 20px 0px 20px;
    }

    @media only screen and (max-width: 800px) {
        .row {
            padding: 0px 15px 0px 15px;
        }
    }

    .card:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: 0.3s;
        height: 15.2rem;
        width: 13.1rem;
        cursor: pointer;
    }

    ::selection {
        background-color: black;
        color: whitesmoke;
    }
    </style>

    <script>
    function init() {

        setUser();
        scrollId();

        function setUser() {
            let email = '<?php echo $_SESSION['email']; ?>';
            window.localStorage.setItem("email", email);
        }

        function scrollId() {
            let id = '<?php if (!isset($_GET['id']) || $_GET['id'] === '') {
                    echo '';
                } else {
                    echo $_GET['id'];
                } ?> ';
            let lastId = '<?php if (!isset($_GET['lid']) || $_GET['lid'] === '') {
                echo '';
            } else {
                echo $_GET['lid'];
            } ?> ';

            if (lastId != '') {
                for (let count = id; count <= lastId; count++) {
                    console.log("count:" + count);
                    try {
                        // document.getElementById(count).style.backgroundColor = 'lightyellow';
                        document.getElementById(count).innerHTML = '';
                    } catch (Exception) {
                        count++
                    }
                }

            }
            // const scrollMe = document.getElementById('click_me');
            // scrollMe.click();
        }
    }
    </script>
</head>

<body onload="init()">

    <?php include '../headers/header_admin.php'; ?>

    <a id="click_me" href="#<?php if (!isset($_GET['id'])) {
        echo '';
    } else {
        echo $_GET['id'];
    } ?>" style="display: none"></a>

    <div class="container-fluid">
        <div class="row">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Patient Reports</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                            data-bs-target="#upload-report-manually"><span class="material-symbols-outlined"
                                style="vertical-align: middle;">
                                add_circle
                            </span></button>
                        <button id="print-btn" type="button" class="btn btn-sm btn-outline-secondary">Export
                            PDF</button>
                    </div>
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button> -->
                </div>
            </div>
            <div class="table-responsive" id="table" table>
                <table id="tbl-repo" class="table table-striped table-sm">
                    <caption class="text-center">&copy; HealthKind LAB</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">#</th>
                            <th style="text-align: center;" scope="col">NAME</th>
                            <th style="text-align: center;" scope="col">AGE</th>
                            <?php if ($_SESSION['role'] === 1) { ?>
                            <th style="text-align: center;" scope="col">TECHNICIAN</th>
                            <?php } ?>
                            <th style="text-align: center;" scope="col">DOWNLOADS</th>
                            <th style="text-align: center;" scope="col">CREATED</th>
                            <th class="hide-part" style="text-align: center;" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include('../includes/config/connect.php');
                        $sql = "select * from reports;";
                        // $sql = "SELECT * FROM ( SELECT * FROM reports ORDER BY id DESC LIMIT 10 )Var1 ORDER BY id ASC;";
                        $result = $conn->query($sql);
                        $data = $result->fetch_all(MYSQLI_ASSOC);
                        $data = array_reverse($data);
                        foreach ($data as $rp_dtl): ?>
                        <tr id="<?php echo $rp_dtl['id']; ?>">

                            <td style="text-align:center; vertical-align: middle;">
                                <?php echo $rp_dtl['id']; ?>
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                <?php echo ucwords(strtolower(str_replace("_", " ", $rp_dtl['patient_name']))); ?>
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                <?php echo $rp_dtl['patient_age']; ?>
                            </td>
                            <?php if ($_SESSION['role'] === 1) { ?>
                            <td style="text-align:center; vertical-align: middle;">
                                <?php echo $rp_dtl['created_by']; ?>
                            </td>
                            <?php } ?>

                            <td style="text-align:center; vertical-align: middle;">
                                <?php // echo floor($rp_dtl['size'] / 1000) . ' KB'; ?>
                                <?php echo $rp_dtl['downloads'] . ' Times'; ?>
                            </td>

                            <td style="text-align:left; vertical-align: middle;">
                                <?php if ($rp_dtl['creation_date'] === null) {
                                        echo "00/00/0000 00:00:00 N/A";
                                    } else {
                                        echo $rp_dtl['creation_date'];
                                    }
                                    ?>
                            </td>

                            <td class="hide-part" style="text-align:center; vertical-align: middle;">
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn  btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="material-symbols-outlined">
                                            drive_file_rename_outline
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="reports.php?serial=<?php echo $rp_dtl['id'] ?>"><img
                                                    style="width: 27px; height: 27px; margin-right: 5px"
                                                    src="../assets/table_dropdowns/download.png" />
                                                Download</a></li>
                                        <li><a class="dropdown-item"
                                                href="delete.php?serial=<?php echo $rp_dtl['id'] ?>&file=<?php echo $rp_dtl['file_name']; ?>"><img
                                                    style="width: 25px; height: 25px; margin-right: 5px"
                                                    src="../assets/table_dropdowns/remove.png" />
                                                Delete</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="changeFile.php?file=<?php echo $rp_dtl['file_name']; ?>"><img
                                                    style="width: 24px; height: 24px; margin-right: 5px"
                                                    src="../assets/table_dropdowns/update.png" />
                                                Replace with Local</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="<?php echo 'preview.php?file=' . base64_encode($rp_dtl['file_name']); ?>">Preview</a>
                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot></tfoot>
                    <tr>
                        <td colspan="7" class="text-center">.........</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="../includes/js/print_function.js"></script>

</body>

</html>