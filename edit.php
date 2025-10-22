<?php
require('db.php');

$id = $GET['id'];

//FETCH existing student data
$stmt = $conn->prepare("SELECT * FROM students WHERE id = :id");
$stmt->execute([':id' => $id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Student</title>
</head>

<body>
    <h2>Edit Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= $student['name']; ?>" required> <br> <br>
        Email: <input type="email" name="email" value="<?= $student['email']; ?>" required> <br> <br>
        Course: <input type="text" name="course" value="<?= $student['course']; ?>" required> <br> <br>
        <input type="submit" name="update" value="Update">
    </form>
    <br>
    <a href="index.php">Back to List</a>

    <?php
    if (isset($_POST['update'])) {
        $sql = "UPDATE students SET name=:name, email=:email, course=:course WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':name' => $_POST['name'],
            ':email' => $_POST['email'],
            ':course' => $_POST['course'],
            ':id' => $id
        ]);
        echo "✅ Student updated successfully";
    }
    ?>

</body>

</html>