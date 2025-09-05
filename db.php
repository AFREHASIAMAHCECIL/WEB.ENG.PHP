<?php
// DB file will live inside your project folder
$db_file = __DIR__ . "/study_planner.db";

$conn = new SQLite3($db_file);

// Create table the first time the app runs
$conn->exec("CREATE TABLE IF NOT EXISTS tasks (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  subject TEXT NOT NULL,
  task TEXT NOT NULL,
  due_date TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");
?>
