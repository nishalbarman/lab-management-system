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
        padding: 0px 50px 0px 50px;
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
                <h1 class="h2">Card SQL Records</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar" class="align-text-bottom"></span>
                        This week
                    </button> -->

                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <span class="material-symbols-outlined" style="vertical-align: middle;">
                            add_circle
                        </span>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <caption class="text-center">&copy; HealthKind LAB</caption>
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">#</th>
                            <th style="text-align: center;" scope="col">NAME</th>
                            <th style="text-align: center;" scope="col">PRICE</th>
                            <th style="text-align: center;" scope="col">TOP COLOR</th>
                            <th style="text-align: center;" scope="col">BOTTOM COLOR</th>
                            <th style="text-align: center;" scope="col">BUTTON NAME</th>
                            <th style="text-align: center;" scope="col">NEW CARD</th>
                            <th style="text-align: center;" scope="col">KEYWORDS</th>
                            <th style="text-align: center;" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include('../includes/config/connect.php');
                        $sql = "select * from cards;";
                        // $sql = "SELECT * FROM ( SELECT * FROM reports ORDER BY id DESC LIMIT 10 )Var1 ORDER BY id ASC;";
                        $result = $conn->query($sql);
                        $data = $result->fetch_all(MYSQLI_ASSOC);

                        foreach ($data as $rp_dtl): ?>
                        <tr id="<?php echo $rp_dtl['id']; ?>">

                            <td style=" text-align:center; vertical-align: middle;">
                                <?php echo $rp_dtl['id']; ?>
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                <input type="text"
                                    onchange="cardUpdate(this, 'cardname', '<?php echo $rp_dtl['id']; ?>')"
                                    style="background-color: transparent; border: none; /*outline: none;*/ text-align: center; width:170px;"
                                    value="<?php echo $rp_dtl['cardname']; ?>" />
                            </td>
                            <td style="text-align:center; vertical-align: middle;">
                                <input type="text" onchange="cardUpdate(this, 'price', '<?php echo $rp_dtl['id']; ?>')"
                                    style="background-color: transparent; border: none; /*outline: none;*/ text-align: center; width:100px;"
                                    value="<?php echo $rp_dtl['price']; ?>" />

                            </td>
                            <td style="text-align:center; width: 12%; vertical-align: middle;">
                                <input type="color"
                                    onchange="cardUpdate(this, 'color_f', '<?php echo $rp_dtl['id']; ?>')"
                                    value="<?php echo $rp_dtl['color_f']; ?>" />
                            </td>

                            <td style="text-align:center;width: 15%; vertical-align: middle;">
                                <?php // echo floor($rp_dtl['size'] / 1000) . ' KB'; ?>
                                <input type="color"
                                    onchange="cardUpdate(this, 'color_s', '<?php echo $rp_dtl['id']; ?>')"
                                    value="<?php echo $rp_dtl['color_s']; ?>" />
                            </td>

                            <td style="text-align:center; width: 15%; vertical-align: middle;">
                                <input type="text"
                                    onchange="cardUpdate(this, 'btn_name', '<?php echo $rp_dtl['id']; ?>')"
                                    style="background-color: transparent; border: none; /*outline: none;*/ text-align: center;  width:100px;"
                                    value="<?php echo $rp_dtl['btn_name']; ?>" />

                            </td>

                            <td style="text-align:center; width: 10%; vertical-align: middle;">
                                <?php if ($rp_dtl['new'] == 0) {
                                        echo "False";
                                    } else {
                                        echo "True";
                                    }
                                    ?>
                            </td>
                            <td style="text-align:left; vertical-align: middle;">
                                <!-- <input type="text"
                                                                                                                                                                                                                                                                                                                                                                                                                                    onchange="cardUpdate(this, 'keywords', '<?php echo $rp_dtl['id']; ?>')"
                                                                                                                                                                                                                                                                                                                                                                                                                                    style="background-color: transparent; border: none; outline: none; text-align: left;"
                                                                                                                                                                                                                                                                                                                                                                                                                                    value="" /> -->
                                <?php echo $rp_dtl['keywords']; ?>
                            </td>

                            <td style="text-align:center; vertical-align: middle;">
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn  btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <span class="material-symbols-outlined">
                                            drive_file_rename_outline
                                        </span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#deleteConfirm"
                                                onclick="queryRun('<?php echo $rp_dtl['id'] ?>','true', 'cards')"><img
                                                    style="width: 25px; height: 25px; margin-right: 5px"
                                                    src="../assets/table_dropdowns/remove.png" />
                                                Delete</a>
                                        </li>
                                        <!-- <li><a class="dropdown-item"
                                                                href="changeFile.php?file=<?php //echo $rp_dtl['file_name']; ?>"><img
                                                                    style="width: 24px; height: 24px; margin-right: 5px"
                                                                    src="../assets/table_dropdowns/update.png" />
                                                                Replace with Local</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="<?php // echo 'preview.php?file=' . base64_encode($rp_dtl['file_name']); ?>">Preview</a>
                                                        </li> -->
                                    </ul>
                                </div>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Delete Confirm Modal -->
        <?php include '../modals/confirm-dlt-modal.php'; ?>

    </div>

    <script>
    function cardUpdate(target, column, id) {
        let value = target.value;
        let reset = 'false';
        console.log(value);
        let sql = "UPDATE `cards` SET `" + column + "`='" + value + "' WHERE id=" + id;
        console.log(sql);
        const formData = new FormData();
        formData.append("query", sql);
        formData.append("reset", reset);

        let options = {
            method: "POST",
            body: formData,
            // headers: {
            //     "Content-type": "multipart/form-data"
            // }
        };

        fetch('../core/api/query-run.php', options).then(res => res.json()).then(data => {
            console.log(data);
            if (data.success === "true") {
                alert("Column Updated Successfully.");
            }
        });
    }
    </script>

</body>

</html>