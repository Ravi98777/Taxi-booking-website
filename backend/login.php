<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — India Taxi Booking</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: rgba(0, 0, 0, 0.7);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: linear-gradient(145deg, #f5c241, #fff8e1);
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.4);
      width: 320px;
      text-align: center;
      animation: fadeIn 0.5s ease;
      position: relative;
    }

    .login-box h2 {
      color: #333;
      margin-bottom: 20px;
    }

    .login-box input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    .login-box button {
      width: 100%;
      background-color: #f59e0b;
      color: white;
      font-weight: bold;
      padding: 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-box button:hover {
      background-color: #d97706;
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 24px;
      color: #333;
      cursor: pointer;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    a.back-home {
      display: inline-block;
      margin-top: 15px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }

    a.back-home:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <span class="close-btn" onclick="window.history.back()">&times;</span>
    <h2>Login</h2>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Enter Username" required>
      <input type="text" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Enter Password" required>
      <button type="submit" name="login">Login</button>
    </form>
    <a href="../frontend/index.php" class="back-home">← Back to Home</a>
  </div>

<?php
session_start();

$con = mysqli_connect('localhost', 'root', 'roshansql', 'sign_up');
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = $_POST['password'];

  $query = "SELECT * FROM `sign` WHERE email = '$email'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $row['name'];
      $_SESSION['email'] = $row['email'];

      echo "<script>
        alert('Login successful!');
        window.location.href='../frontend/index.php';
      </script>";
    } else {
      echo "<script>alert('Incorrect password!');</script>";
    }
  } else {
    echo "<script>alert('No user found with that email!');</script>";
  }
}
?>
</body>
</html>


 