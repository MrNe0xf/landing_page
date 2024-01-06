<?php
// Get form data
$name = $_POST['name'] ?? '';
$dob = $_POST['dob'] ?? '';
$address = $_POST['address'] ?? '';
$borrowedBook = $_POST['borrowedBook'] ?? '';

// Database connection parameters
$servername = '';
$username = '';
$password = '';
$dbname = '';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare SQL query to insert user data into the database
$stmt = $conn->prepare('INSERT INTO Lecteurs (nom_lecteur,date_naissance,adress,livre_emprunte) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $name, $dob, $address, $borrowedBook);

// Execute the query
if ($stmt->execute()) {
    echo 'New record created successfully';
} else {
    echo 'Error: ' . $conn->error;
}

$stmt->close();
$conn->close();
?>
