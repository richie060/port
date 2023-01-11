<?php


require 'constants.php';


$conn = new mysql(DB_HOST,DB_USER, DB_PASS,DB_NAME);

if ($conn->connect_error) {
	die('Database error:' .$conn->connect_error);
}