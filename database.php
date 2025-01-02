<?php
//create database called form
require_once "config.php";

$dbname = "form"; // Replace with the desired database name

$conn = getConnection();

$sql = "CREATE DATABASE " . $dbname;

$retval = mysqli_query($conn, $sql);

if (! $retval) {
  die('Could not create database: ' . mysqli_error($conn));
} else {
  echo "Database '$dbname' created successfully!";
}

mysqli_close($conn);
