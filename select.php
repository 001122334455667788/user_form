<?php
require_once "config.php"; 

$dbname = "form"; // Replace with the desired database name
$conn = getConnection();

mysqli_select_db($conn, $dbname);

if (isset($_GET['selectid'])) {
    $id = $_GET['selectid']; // Correctly get the user ID from the query parameter

    // Prepare the SQL query to avoid SQL injection
    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No user ID provided.";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>View User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>View Record</h2>
    <?php if ($row): ?>
        <p><p class="select">Name:</p><?php echo htmlspecialchars($row['user_name']); ?></p>
        <p><p class="select">Email:</p><?php echo htmlspecialchars($row['user_email']); ?></p>
        <p><p class="select">Gender: </p><?php echo htmlspecialchars($row['gender']); ?></p>
        <p><br><?php echo htmlspecialchars($row['recieve_emails'] ? 'You Will Recieve Email From Us' : 'You Will Not Recieve Any Emails'); ?></p>
        <a href="process.php">
            <button style="background:lightblue;">Back</button>
        </a>
    <?php else: ?>
        <p>No user found with the provided ID.</p>
    <?php endif; ?>
</body>
</html>

