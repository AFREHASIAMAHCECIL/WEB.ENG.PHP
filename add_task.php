<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $subject  = trim($_POST['subject'] ?? '');
  $task     = trim($_POST['task'] ?? '');
  $due_date = trim($_POST['due_date'] ?? '');

  if ($subject !== '' && $task !== '' && $due_date !== '') {
    $stmt = $conn->prepare("INSERT INTO tasks (subject, task, due_date) VALUES (:s, :t, :d)");
    $stmt->bindValue(':s', $subject, SQLITE3_TEXT);
    $stmt->bindValue(':t', $task, SQLITE3_TEXT);
    $stmt->bindValue(':d', $due_date, SQLITE3_TEXT);
    $stmt->execute();
  }
}

header("Location: index.php");
exit;
