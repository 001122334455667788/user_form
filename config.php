<?php
function getConnection()
{
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $link = mysqli_connect($dbhost, $dbuser, $dbpass);

  if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

  echo "Success <br>";

  return $link;
}
