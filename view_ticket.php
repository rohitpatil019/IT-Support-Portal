<?php

session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET["id"])) {
    die("Invalid ticket.");
}

$ticket_id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM tickets
        WHERE id = ? AND user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $ticket_id, $user_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows != 1) {
    die("Ticket not found.");
}

$ticket = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

<title>Ticket Details</title>

<style>

body {
    font-family: Arial;
    background: #f2f2f2;
}

.container {
    width: 500px;
    margin: 60px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}

h2 {
    text-align: center;
}

.info {
    margin: 15px 0;
}

.label {
    font-weight: bold;
}

</style>

</head>

<body>

<div class="container">

<h2>SUPPORT TICKET DETAILS</h2>

<div class="info">
<span class="label">Ticket ID:</span>
#<?php echo $ticket["id"]; ?>
</div>

<div class="info">
<span class="label">Problem:</span>
<?php echo htmlspecialchars($ticket["title"]); ?>
</div>

<div class="info">
<span class="label">Description:</span>
<br>
<?php echo nl2br(htmlspecialchars($ticket["description"])); ?>
</div>

<div class="info">
<span class="label">Category:</span>
<?php echo htmlspecialchars($ticket["category"]); ?>
</div>

<div class="info">
<span class="label">Priority:</span>
<?php echo htmlspecialchars($ticket["priority"]); ?>
</div>

<div class="info">
<span class="label">Status:</span>
<?php echo htmlspecialchars($ticket["status"]); ?>
</div>

<div class="info">
<span class="label">Created:</span>
<?php echo $ticket["created_at"]; ?>
</div>

<hr>

<a href="tickets.php">← Back to My Tickets</a>

</div>

</body>

</html>
