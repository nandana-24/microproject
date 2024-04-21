<?php
// Database connection details
$databasePath = "library_new.db";

// Create connection
$conn = new SQLite3 ($databasePath);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->lastErrorMsg());
}
?>