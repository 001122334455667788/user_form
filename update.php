<?php
require_once "config.php";

ob_start(); // Start output buffering

$dbname = "form";
$conn = getConnection();

mysqli_select_db($conn, $dbname);
$id = $_GET['updateid'];
$sql = "SELECT * FROM users WHERE user_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['user_name'];
$email = $row['user_email'];
$gender = $row['gender'];
$recieve_emails = $row['recieve_emails'];


// Handle form submission
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $recieve_emails = isset($_POST['agree']) ? 1 : 0;

    $sql = "UPDATE users SET user_name = '$name', user_email = '$email', gender = '$gender', recieve_emails = '$recieve_emails' WHERE user_id = $id";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: process.php"); // Redirect to a success page
        exit(); // Terminate script execution
    } else {
        echo "Error updating record.";
    }
}

ob_end_flush(); // End and flush output buffering
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>User Update Form</h2>
    <p style="font-weight: lighter; color: gray;">Update user information</p>
    <form method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name" value = "<?php echo $name;?>" required >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email"  value = "<?php echo $email;?>" required >
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label><br>
            <label><input type="radio" name="gender" value="female" <?php echo isset($gender) && $gender == 'female' ? 'checked' : ''; ?>> Female</label>
            <label><input type="radio" name="gender" value="male" <?php echo isset($gender) && $gender == 'male' ? 'checked' : ''; ?>> Male</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="agree" id="recieve_emails" value="1"<?php echo $recieve_emails == 1 ? 'checked' : ''; ?>> I agree to receive emails</label>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>
