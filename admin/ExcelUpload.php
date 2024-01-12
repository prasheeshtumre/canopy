<?php

// Database connection settings
$servername = "localhost";
$username = "qrzoom_canopy";
$password = "m)6F]&_gyUh!";
$dbname = "qrzoom_canopy";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Open CSV file
$file = fopen("data.csv", "r");

// Parse CSV file and insert data into the database
while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
    $sql = "INSERT INTO table_name (col1, col2, col3) VALUES ('".$data[0]."', '".$data[1]."', '".$data[2]."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close CSV file and database connection
fclose($file);
$conn->close();

?>
