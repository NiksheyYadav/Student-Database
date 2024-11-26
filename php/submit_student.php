<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once 'db_connect.php';

// Collect form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$batch = $_POST['batch'];
$course = $_POST['course'];

// Prepared statement to insert data
$stmt = $conn->prepare("INSERT INTO students (first_name, last_name, email, dob, batch, course) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $first_name, $last_name, $email, $dob, $batch, $course);

if ($stmt->execute()) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redirect to recent.php
header("Location: recent.php");
exit();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
} else {
    echo "Invalid request method.";
}
?>
