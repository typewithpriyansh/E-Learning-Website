<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Determine which button was clicked
    if (isset($_POST['student_login'])) {
        // Student login button clicked
        $table = "users2";
        $redirect_page = "second.html"; // Redirect to student info page
    } elseif (isset($_POST['teacher_login'])) {
        // Teacher login button clicked
        $table = "teachers";
        $redirect_page = "teacher2.html"; // Redirect to teacher info page
    }

    // Validate user credentials
    $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // User found, login successful
        session_start();
        $_SESSION['username'] = $username; // Store username in session for later use if needed
        header("Location: $redirect_page");
        exit();
    } else {
        // User not found or incorrect credentials
        echo "Incorrect username or password";
    }
} else {
    // If accessed directly without POST method
    echo "Access denied";
}

// Close connection
mysqli_close($conn);
?>
