<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Set timeout duration (in seconds)
$timeout_duration = 5;

// Check if login_time is set and if session has expired
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Optional: Refresh session timeout on activity
$_SESSION['login_time'] = time();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <p>Hello, you have logged in successfully!</p>
    <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    <a href="logout.php">Logout</a>
</body>
</html>