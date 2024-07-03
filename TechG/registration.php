<!-- <?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine which form was submitted
    if (isset($_POST['studentName'])) {
        // Student form submitted
        $name = $_POST['studentName'];
        $email = $_POST['studentEmail'];
        $dob = $_POST['studentDOB'];
        $address = $_POST['studentAddress'];
        $mobno = $_POST['studentMobNo'];
        $username = $_POST['studentUsername'];
        $password = $_POST['studentPassword'];

        // Insert data into users2 table (assuming you have columns username and password)
        $sql = "INSERT INTO users2 (name, email, dob, address, mobno, username, password)
                VALUES ('$name', '$email', '$dob', '$address', '$mobno', '$username', '$password')";

    } elseif (isset($_POST['teacherName'])) {
        // Teacher form submitted
        $name = $_POST['teacherName'];
        $email = $_POST['teacherEmail'];
        $dob = $_POST['teacherDOB'];
        $address = $_POST['teacherAddress'];
        $mobno = $_POST['teacherMobNo'];
        $username = $_POST['teacherUsername'];
        $password = $_POST['teacherPassword'];

        // Insert data into teachers table (assuming you have columns username and password)
        $sql = "INSERT INTO teachers (name, email, dob, address, mobno, username, password)
                VALUES ('$name', '$email', '$dob', '$address', '$mobno', '$username', '$password')";
    }

    // Perform SQL query
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
 -->

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registerStudent'])) {
        // Student form submitted
        $name = $_POST['studentName'];
        $email = $_POST['studentEmail'];
        $dob = $_POST['studentDOB'];
        $address = $_POST['studentAddress'];
        $mobno = $_POST['studentMobNo'];
        $username = $_POST['studentUsername'];
        $password = $_POST['studentPassword'];

        // Insert data into users2 table
        $sql = "INSERT INTO users2 (name, email, dob, address, mobno, username, password)
                VALUES ('$name', '$email', '$dob', '$address', '$mobno', '$username', '$password')";
    } elseif (isset($_POST['registerTeacher'])) {
        // Teacher form submitted
        $name = $_POST['teacherName'];
        $email = $_POST['teacherEmail'];
        $dob = $_POST['teacherDOB'];
        $address = $_POST['teacherAddress'];
        $mobno = $_POST['teacherMobNo'];
        $username = $_POST['teacherUsername'];
        $password = $_POST['teacherPassword'];

        // Insert data into teachers table
        $sql = "INSERT INTO teachers (name, email, dob, address, mobno, username, password)
                VALUES ('$name', '$email', '$dob', '$address', '$mobno', '$username', '$password')";
    }

    // Perform SQL query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Registered successfully');
                window.location.href = 'first.html';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "');
              </script>";
    }
}

// Close connection
mysqli_close($conn);
?>
