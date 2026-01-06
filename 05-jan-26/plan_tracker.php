<?php
// File to store tasks
$filename = __DIR__ . '/tasks.json';

// Load tasks
$tasks = file_exists($filename) ? json_decode(file_get_contents($filename), true) : [];

// Handle new task submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && trim($_POST['task']) !== '') {
        $tasks[] = [
            'task' => trim($_POST['task']),
            'done' => false,
            'created_at' => date('Y-m-d H:i:s')
        ];
        file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Mark task done
if (isset($_GET['done'])) {
    $index = (int)$_GET['done'];
    if (isset($tasks[$index])) {
        $tasks[$index]['done'] = true;
        file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Delete task
if (isset($_GET['delete'])) {
    $index = (int)$_GET['delete'];
    if (isset($tasks[$index])) {
        array_splice($tasks, $index, 1);
        file_put_contents($filename, json_encode($tasks, JSON_PRETTY_PRINT));
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Plan Tracker</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f0f4f8; color:#333; padding:20px; }
        h1 { color:#0d6efd; }
        form input[type="text"] { padding:8px; width:300px; border-radius:5px; border:1px solid #ccc; }
        form button { padding:8px 15px; border:none; background:#0d6efd; color:white; border-radius:5px; cursor:pointer; }
        ul { list-style:none; padding:0; }
        li { background:white; margin-bottom:10px; padding:10px; border-radius:6px; display:flex; justify-content:space-between; align-items:center; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
        li.done { text-decoration: line-through; color: #777; }
        a { margin-left:10px; text-decoration:none; color:#0d6efd; font-weight:bold; }
        a:hover { text-decoration:underline; }
    </style>
</head>
<body>

<h1>📋 Plan Tracker</h1>

<form method="post">
    <input type="text" name="task" placeholder="Enter your plan/task" required>
    <button type="submit">Add</button>
</form>

<h2>Today's Plans</h2>
<ul>
    <?php foreach ($tasks as $i => $t): ?>
        <li class="<?= $t['done'] ? 'done' : '' ?>">
            <span><?= htmlspecialchars($t['task']) ?> (<?= date('M d H:i', strtotime($t['created_at'])) ?>)</span>
            <span>
                <?php if (!$t['done']): ?>
                    <a href="?done=<?= $i ?>">✅ Done</a>
                <?php endif; ?>
                <a href="?delete=<?= $i ?>">🗑️ Delete</a>
            </span>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
