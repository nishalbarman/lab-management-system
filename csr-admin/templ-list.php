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
if (!$_SESSION) { // If season not exist
    header('location: ../auth.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- <link href="./includes/css/headers.css" rel="stylesheet"> -->
    <link href="../includes/css/card_styles.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Admin Panel | HealthKind</title>
    <style>
    .lets-do {
        padding: 0px 20px 0px 20px;
    }

    @media only screen and (max-width: 800px) {
        .lets-do {
            padding: 15px;
        }
    }

    ::selection {
        background-color: black;
        color: whitesmoke;
    }
    </style>
</head>

<body>
    <?php include('../headers/header_admin.php'); ?>

    <main class="main">
        <div class="lets-do">
            <div class="container-fluid">
                <div class="row">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Templates</h1>
                        <?php if ($_SESSION['role'] === 1) { ?>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <!-- <div class="btn-group me-2">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                                                        </div> -->

                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <span class="material-symbols-outlined" style="vertical-align: middle;">
                                    add_circle
                                </span>
                            </button>
                        </div>
                        <?php } ?>
                    </div>

                    <section class="card-area" menu-cards></section>

                    <!-- The card tempalte -->
                    <template data-menu-template>
                        <!-- <div class="card-box-maker" style="width: auto"> -->
                        <div class="card">

                            <div class="card-front" card-count>
                                <div class="card-front__tp card-front__tp--ski" data-card-bg>
                                    <svg width="60" height="60" version="1.0" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 240.000000 211.000000" preserveAspectRatio="xMidYMid meet">

                                        <g transform="translate(0.000000,211.000000) scale(0.100000,-0.100000)"
                                            fill="#000000" stroke="none">
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

                                    <h2 class="card-front__heading" card-title></h2>
                                    <p class="card-front__text-price" card-price></p>
                                </div>

                                <div class="card-front__bt" card-bottom-white>
                                    <p class="card-front__text-view card-front__text-view--ski" card-btn-text></p>
                                </div>
                            </div>
                        </div>

                    </template>
                </div>
            </div>
        </div>
    </main>
    <script src="../includes/js/at_template_srvc.js"></script>
    <script src="../includes/js/count-card-click.js"></script>
</body>

</html>

</html>