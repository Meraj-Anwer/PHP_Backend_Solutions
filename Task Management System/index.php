<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Mnangement System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <div class="container">
            <h1 id="title">Task Management System</h1>
            <!-- Add Task Form -->
            <form action="add_task.php" method="POST" id="enterTask">
                <input type="text" name="task" placeholder="Enter a new task" required>
                <button type="submit">Add Task</button>
            </form>

            <!-- Display Tasks -->
            <ol>
                <?php
                $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li id='task-" . $row['id'] . "'>
                    <span>" . $row['task'] . "</span>
                    <div class='task-actions'>
                        <a href='update_task.php?id=" . $row['id'] . "' class='edit-btn'>Edit</a>
                        <a href='delete_task.php?id=" . $row['id'] . "' class='delete-btn'>Delete</a>
                    </div>
                </li>";
                    }
                } else {
                    echo "<li>No tasks found.</li>";
                }
                ?>
            </ol>

        </div>
    </main>
</body>

</html>