<?php
require_once "config.php"; 

$dbname = "form"; // Replace with the desired database name
$conn = getConnection();

mysqli_select_db($conn, $dbname);

// Handle form submission
if (isset($_POST['submit'])) {
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$recieve_emails = isset($_POST['agree']) ? 1 : 0;

// Prepare SQL statement
$sql = "INSERT INTO users (user_name, user_email, gender, recieve_emails) VALUES ('$name', '$email', '$gender', '$recieve_emails')";
$result = mysqli_query($conn,$sql);

// Execute query
if ($result) {
header('location: process.php');
} else {
die(mysqli_error($conn));
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form and Data Display</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-4">
<h2 class="text-center">User Details</h2>
<a href="index.php"><button type="button" class="btn btn-primary btn-color btn-bg-color btn-sm col-xs-1" style="margin-bottom: 10px;" >Add User</button></a>

<table class="table table-striped table-bordered">
<thead >
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Mail Status</th>
        <th>Action</th>
    </tr>
</thead >
<tbody>
<?php 
    // Fetch data for displaying in the table
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    if ($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $id=$row['user_id'];
            $name=$row['user_name'];
            $email=$row['user_email'];
            $gender=$row['gender'];
            $recieve_emails = $row['recieve_emails'] ? 'Yes' : 'No';
            echo '<tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$gender.'</td>
                <td>'.$recieve_emails.'</td>
                <td>
                <a href="select.php?selectid='.$id.'" class="text-info"><i class="fa-solid fa-eye"></i></a>
                <a href="update.php?updateid='.$id.'" class="text-warning"><i class="fa-solid fa-pen"></i></a>
                <a href="delete.php?deleteid='.$id.'" class="text-danger""><i class="fa-solid fa-trash-can"></i></a>
                </td>
                    </tr>';
    }
}
?>
</body>
</html>
