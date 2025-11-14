<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lalb_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$gender = $_POST['gender'];


$sql = "INSERT INTO students (name, email, course, gender)
        VALUES ('$name', '$email', '$course', '$gender')";

if ($conn->query($sql) === TRUE) {
  echo "New student registered successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
