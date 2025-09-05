<?php
include 'db.php';
if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :id");
  $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
  $stmt->execute();
}
header("Location: index.php");
exit;
