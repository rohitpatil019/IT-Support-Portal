<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tech Support Dashboard</title>
</head>

<body>

<h1>TECH SUPPORT DASHBOARD</h1>

<h2>
Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>
</h2>

<p>
You are successfully logged in.
</p>

<hr>

<a href="create_ticket.php">Create Support Ticket</a>
<br><br>

<a href="tickets.php">View My Tickets</a>
<br><br>

<a href="logout.php">Logout</a>

</body>

</html>
