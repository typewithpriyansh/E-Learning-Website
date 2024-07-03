<?php

$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "project2"; // Your MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo("<h1>all ok</h1>");
}

// Get values from the form
$full_name = $_POST['name'];
$standard = $_POST['standard'];
$username = $_POST['create-username'];
$password = $_POST['create-password'];

// Escape user inputs for security
$full_name = mysqli_real_escape_string($conn, $full_name);
$standard = mysqli_real_escape_string($conn, $standard);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);



// Insert data into MySQL table
$sql = "INSERT INTO users (full_name, standard, username, password) VALUES ('$full_name', '$standard', '$username', '$password')";

if (mysqli_query($conn, $sql)) {
   
    header("Location: first.html");
    exit();


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
