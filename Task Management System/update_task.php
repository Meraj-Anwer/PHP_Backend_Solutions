<?php
include 'db_connect.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $updated_task = $_POST['task'];

    $sql = "UPDATE tasks SET task='$updated_task' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="update_container">
            <h1 class="update_title">Edit Task</h1>

            <?php
            $sql = "SELECT * FROM tasks WHERE id=$id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>

            <form action="update_task.php?id=<?php echo $id; ?>" method="POST" id="updateTask">
                <input type="text" name="task" value="<?php echo $row['task']; ?>" required>
                <button type="submit">Update Task</button>
            </form>
        </div>
    </main>
</body>

</html>