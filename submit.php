<?php
// Database connection (replace with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "subham";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate a random key
$randomKey = bin2hex(random_bytes(16));

// Process form data
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email, random_key) VALUES ('$name', '$email', '$randomKey')";

if ($conn->query($sql) === TRUE) {
    echo "Form submitted successfully. Your key is: $randomKey";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
