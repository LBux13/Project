<?php
$servername = "localhost";
$uname = "root";
$email = "";
$dbname = "lalb_db";

$conn = new mysqli($servername, $uname, $email, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM students WHERE id=$id");
}

$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin - Student List</title>
  <style>
    table { width: 80%; margin: 30px auto; border-collapse: collapse; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    th { background: #eee; }
    a { text-decoration: none; color: red; }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Registered Students</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Gender</th><th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['course']; ?></td>
        <td><?= $row['gender']; ?></td>
        <td><a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Delete this student?');">Delete</a></td>
      </tr>
    <?php } ?>
  </table>

  <div style="text-align:center;">
    <a href="index.html">Back to Registration</a>
  </div>
</body>
</html>

<?php $conn->close(); ?>
