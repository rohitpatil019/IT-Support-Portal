<?php

session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM tickets
        WHERE user_id = ?
        ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>

<head>

<title>My Support Tickets</title>

<style>

body {
    font-family: Arial;
    background: #f2f2f2;
}

.container {
    width: 850px;
    margin: 50px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 10px gray;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: left;
}

th {
    background: #333;
    color: white;
}

a {
    text-decoration: none;
}

.button {
    padding: 7px 12px;
    background: #333;
    color: white;
    border-radius: 4px;
}

</style>

</head>

<body>

<div class="container">

<h2>MY SUPPORT TICKETS</h2>

<table>

<tr>
    <th>Ticket</th>
    <th>Problem</th>
    <th>Category</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php

if ($result->num_rows > 0) {

    while ($ticket = $result->fetch_assoc()) {

?>

<tr>

<td>
#<?php echo $ticket["id"]; ?>
</td>

<td>
<?php echo htmlspecialchars($ticket["title"]); ?>
</td>

<td>
<?php echo htmlspecialchars($ticket["category"]); ?>
</td>

<td>
<?php echo htmlspecialchars($ticket["priority"]); ?>
</td>

<td>
<?php echo htmlspecialchars($ticket["status"]); ?>
</td>

<td>

<a
    class="button"
    href="view_ticket.php?id=<?php echo $ticket["id"]; ?>"
>
View Details
</a>

</td>

</tr>

<?php

    }

} else {

?>

<tr>

<td colspan="6" style="text-align:center;">
No support tickets found.
</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="create_ticket.php">Create New Ticket</a>

<br><br>

<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>

</html>
