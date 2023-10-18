<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$mobilenumber = $_POST['mobilenumber']; 
$state = $_POST['state'];
$city = $_POST['city'];
$message = $_POST['message'];

// Insert the form data into the database
$sql = "INSERT INTO users (name, email, mobilenumber, state, city, message) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $mobilenumber, $state, $city, $message);

if ($stmt->execute()) {
    // Data was successfully inserted into the database
    echo "Your message has been sent and saved to the database. Thank you!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
