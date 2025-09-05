<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Study Planner</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 class="title">Student Study Planner</h1>

  <div class="card">
    <form action="add_task.php" method="POST" class="form">
      <label>Subject</label>
      <input type="text" name="subject" placeholder="e.g. Mathematics" required>

      <label>Task</label>
      <textarea name="task" placeholder="Describe the study task..." required></textarea>

      <label>Due Date</label>
      <input type="date" name="due_date" required>

      <button type="submit" class="btn">Add To Planner</button>
    </form>
  </div>

  <div class="list">
    <h2>Your Tasks</h2>
    <table>
      <thead>
        <tr>
          <th>Subject</th>
          <th>Task</th>
          <th>Due Date</th>
          <th>Added</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $res = $conn->query("SELECT * FROM tasks ORDER BY due_date ASC, id DESC");
          while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
            $id = (int)$row['id'];
            echo "<tr>
                    <td>".htmlspecialchars($row['subject'])."</td>
                    <td>".nl2br(htmlspecialchars($row['task']))."</td>
                    <td>".htmlspecialchars($row['due_date'])."</td>
                    <td>".htmlspecialchars($row['created_at'])."</td>
                    <td><a class='del' href='delete_task.php?id=$id' onclick=\"return confirm('Delete this task?');\">Delete</a></td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
