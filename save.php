<?php
$servername = "localhost";
$uname = "root";  
$email = "";      
$dbname = "lalb_db";

$conn = new mysqli($servername, $uname, $email, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$gender = $_POST['gender'];

$sql = "INSERT INTO students (name, email, course, gender) VALUES ('$name', '$email', '$course', '$gender')";

if ($conn->query($sql) === TRUE) {
  echo "<h3>Registration Successful!</h3>";
  echo "<a href='admin.php'>View Registered Students</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
