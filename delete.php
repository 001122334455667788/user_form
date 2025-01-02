<?php
require_once "config.php";

$dbname = "form"; // Replace with the desired database name
$conn = getConnection();

mysqli_select_db($conn, $dbname);

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    // Prepare the SQL query to avoid SQL injection
    $sql = "DELETE FROM users WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    // Check if the delete operation was successful
    if ($result) {
        header('location:process.php');
    } else {
        die(mysqli_errno($conn));
    }
}
?>

