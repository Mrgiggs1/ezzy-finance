<?php
define('DB_SERVER','localhost');
define('DB_USER','ezzyfytj_lms');
define('DB_PASS' ,'ezzyfinance');
define('DB_NAME', 'ezzyfytj_lms_db');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

