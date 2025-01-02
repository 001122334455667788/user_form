<?php
//create table in form database
require_once "config.php"; 

$dbname = "form"; // Replace with the desired database name

$conn = getConnection(); 
mysqli_select_db( $conn,$dbname );
$sql = 'CREATE TABLE users( 
    user_id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(20) NOT NULL,
    user_email VARCHAR(100) NOT NULL,
    gender enum ("male", "female"),
    recieve_emails boolean not null,
    primary key ( user_id ) 
)';
$retval = mysqli_query( $conn,$sql );

if(! $retval ) {
die('Could not create table: ' . mysqli_connect_error($retval));
}

echo "<br>Database Table  created successfully\n";
mysqli_close($conn);
?>