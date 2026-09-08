<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $priority = $_POST["priority"];

    // Automatically find an engineer
    $engineer_query = "SELECT id FROM users
                       WHERE role = 'engineer'
                       ORDER BY id ASC
                       LIMIT 1";

    $engineer_result = $conn->query($engineer_query);

    if ($engineer_result->num_rows == 0) {
        die("No support engineer is available.");
    }

    $engineer = $engineer_result->fetch_assoc();
    $assigned_to = $engineer["id"];

    // Create ticket and automatically assign engineer
    $sql = "INSERT INTO tickets
            (user_id, title, description, category, priority, status, assigned_to)
            VALUES (?, ?, ?, ?, ?, 'Open', ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "issssi",
        $user_id,
        $title,
        $description,
        $category,
        $priority,
        $assigned_to
    );

    if ($stmt->execute()) {
        header("Location: tickets.php");
        exit();
    } else {
        echo "Error creating ticket: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Support Ticket</title>
</head>
<body>

<h1>Create Support Ticket</h1>

<form method="POST">

    <label>Problem Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Category:</label><br>
    <select name="category" required>
        <option value="">Select Category</option>
        <option>Network</option>
        <option>Hardware</option>
        <option>Software</option>
        <option>Internet</option>
        <option>Printer</option>
        <option>Email</option>
        <option>Account/Login</option>
        <option>Operating System</option>
        <option>Other</option>
    </select><br><br>

    <label>Priority:</label><br>
    <select name="priority" required>
        <option value="">Select Priority</option>
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
    </select><br><br>

    <button type="submit">Create Ticket</button>

</form>

</body>
</html>
