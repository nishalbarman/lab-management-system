<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $data = array("success" => "false", "msg" => "Have to logged in");
    print_r(json_encode($data));
} else {
    if ($_SESSION['role'] !== 1) {
        $data = array("success" => "false", "msg" => "Unauthorized Access");
        print_r(json_encode($data));
    } else {
        include('../../includes/config/connect.php');
        $error = array();
        $sqlquery = $_POST['query'];
        $reset = $_POST['reset'];

        $stmt = $conn->prepare($sqlquery);
        $stmt->execute();
        if ($stmt->error) {
            $error[] = "Error in executing command.";
        }

        if ($reset === 'true') {
            $selectquery = "SELECT id FROM cards ORDER BY id DESC LIMIT 1";
            $result = $conn->query($selectquery);
            $row = $result->fetch_assoc();
            $maxid = $row['id'];
            $maxid = (int) $maxid;
            $sql = "ALTER TABLE `cards` AUTO_INCREMENT=$maxid";
            $stmt->prepare($sql);
            $stmt->execute();
        }

        if ($stmt->error) {
            $error[] = "Error in executing command.";
        }

        if (!$error) {
            $data = array("success" => "true", "msg" => "Query Submited");
            print_r(json_encode($data));
        } else {
            $data = array("success" => "false", "msg" => "SQL error");
            print_r(json_encode($data));
        }

    }
}