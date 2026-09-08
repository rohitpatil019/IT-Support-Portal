<?php

session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["role"] != "engineer") {
    die("Access denied. Engineer access only.");
}

$sql = "SELECT tickets.*, users.name, users.email
        FROM tickets
        JOIN users ON tickets.user_id = users.id
        ORDER BY tickets.created_at DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

<title>Support Engineer Dashboard</title>

<style>

body {
    font-family: Arial;
    background: #f2f2f2;
}

.container {
    width: 1000px;
    margin: 40px auto;
    padding: 25px;
    background: white;
    border-radius: 10px;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
}

th {
    background: #333;
    color: white;
}

select {
    padding: 6px;
}

button {
    padding: 6px 10px;
}

</style>

</head>

<body>

<div class="container">

<h2>SUPPORT ENGINEER DASHBOARD</h2>

<table>

<tr>
    <th>ID</th>
    <th>User</th>
    <th>Email</th>
    <th>Problem</th>
    <th>Category</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php

while ($ticket = $result->fetch_assoc()) {

?>

<tr>

<td>
#<?php echo $ticket["id"]; ?>
</td>

<td>
<?php echo htmlspecialchars($ticket["name"]); ?>
</td>

<td>
<?php echo htmlspecialchars($ticket["email"]); ?>
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

<form method="POST" action="update_ticket.php">

<input
    type="hidden"
    name="ticket_id"
    value="<?php echo $ticket["id"]; ?>"
>

<select name="status">

<option value="Open"
<?php if ($ticket["status"] == "Open") echo "selected"; ?>>
Open
</option>

<option value="In Progress"
<?php if ($ticket["status"] == "In Progress") echo "selected"; ?>>
In Progress
</option>

<option value="Resolved"
<?php if ($ticket["status"] == "Resolved") echo "selected"; ?>>
Resolved
</option>

<option value="Closed"
<?php if ($ticket["status"] == "Closed") echo "selected"; ?>>
Closed
</option>

</select>

</td>

<td>

<button type="submit">
Update
</button>

</form>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>
