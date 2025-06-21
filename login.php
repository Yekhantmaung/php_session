<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = ''; // Default no error

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check credentials
    if ($username === "Username" && $password === "user123") {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "အကောင့်ဝင်ရောက်မှုမအောင်မြင်ပါ။ ထပ်မံကြိုးစားပါ။";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form</title>
  <style>
    body {
      background-color: #ccc;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }

    form {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    input {
      display: block;
      margin: 10px 0;
      padding: 10px;
      width: 250px;
    }

    button {
      padding: 10px;
      width: 100%;
      background-color: #0066cc;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .error {
      color: red;
      margin-top: 10px;
    }

    h1 {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

  <h1>Login Session Form</h1>

  <form method="POST">
    <input type="text" name="username" placeholder="Enter your name" required />
    <input type="password" name="password" placeholder="Enter password" required />
    <button type="submit" name="login">Login</button>
  </form>

  <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>

</body>
</html>