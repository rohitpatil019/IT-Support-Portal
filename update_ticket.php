<?php

session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ticket_id = $_POST["ticket_id"];
    $status = $_POST["status"];

    $sql = "UPDATE tickets
            SET status = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "si",
        $status,
        $ticket_id
    );

    $stmt->execute();
}

header("Location: admin.php");
exit();

?>y

