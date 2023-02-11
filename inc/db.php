<?php
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "entretien";

// Create connection
$db = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>