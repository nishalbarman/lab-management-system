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
    <link href="../includes/css/insert_card.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
    .lets-do {
        padding: 0px 50px 0px 50px;
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

    <?php include '../headers/header_admin.php'; ?>
    <div class="lets-do">
        <div class="form-style-3">
            <form>
                <fieldset>
                    <legend>Personal</legend>
                    <label for="field1"><span>Name <span class="required">*</span></span><input type="text"
                            class="input-field" name="field1" value="" /></label>
                    <label for="field2"><span>Email <span class="required">*</span></span><input type="email"
                            class="input-field" name="field2" value="" /></label>
                    <label for="field3"><span>Phone <span class="required">*</span></span><input type="text"
                            class="input-field" name="field3" value="" /></label>
                    <label for="field4"><span>Subject</span><select name="field4" class="select-field">
                            <option value="Appointment">Appointment</option>
                            <option value="Interview">Interview</option>
                            <option value="Regarding a post">Regarding a post</option>
                        </select></label>
                </fieldset>
                <fieldset>
                    <legend>Message</legend>
                    <label for="field6"><span>Message <span class="required">*</span></span><textarea name="field6"
                            class="textarea-field"></textarea></label>
                    <label><span> </span><input type="submit" value="Submit" /></label>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>