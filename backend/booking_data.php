<?php
session_start();

//  Only allow logged-in users to access
if (!isset($_SESSION['email'])) {
  echo "<script>alert('Please login to book a taxi!'); window.location.href='../backend/login.php';</script>";
  exit();
}

//  Database connection
$con = mysqli_connect('localhost', 'root', 'roshansql', 'sign_up');
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

//  Insert booking data
if (isset($_POST['book'])) {
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $pickup = mysqli_real_escape_string($con, $_POST['pickup']);
  $drop = mysqli_real_escape_string($con, $_POST['drop']);
  $datetime = $_POST['datetime'];

  $insert = "INSERT INTO booking_history (username, email, phone, pickup, drop_loc, datetime)
             VALUES ('$username', '$email', '$phone', '$pickup', '$drop', '$datetime')";
  
  if (mysqli_query($con, $insert)) {
    echo "<script>alert('Booking Successful!');</script>";
  } else {
    echo "<script>alert('Error: Could not complete booking.');</script>";
  }
}

//  Fetch user booking history
$email = $_SESSION['email'];
$query = "SELECT * FROM booking_history WHERE email = '$email' ORDER BY booked_at DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Bookings — India Taxi Booking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffbe9;
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #f59e0b;
      color: white;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h2 {
      margin: 0;
    }
    button.logout {
      background: white;
      color: #f59e0b;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }
    .container {
      width: 80%;
      margin: 30px auto;
    }
    h3 {
      color: #333;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: center;
    }
    th {
      background-color: #f59e0b;
      color: white;
    }
    form {
      margin-top: 20px;
      background: #fff3cd;
      padding: 20px;
      border-radius: 10px;
    }
    input, button {
      margin: 8px 0;
      padding: 8px;
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button.book-btn {
      background-color: #f59e0b;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    button.book-btn:hover {
      background-color: #d97706;
    }
  </style>
</head>
<body>

<header>
  <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h2>
  <form action="logout.php" method="post">
    <button class="logout" type="submit">Logout</button>
  </form>
</header>

<!-- <div class="container">
  <h3>Book a New Ride</h3>
  <form action="" method="POST">
    <input type="tel" name="phone" placeholder="Phone Number" required>
    <input type="text" name="pickup" placeholder="Pickup Location" required>
    <input type="text" name="drop" placeholder="Drop Location" required>
    <input type="datetime-local" name="datetime" required>
    <button name="book" class="book-btn">Book Now</button>
  </form> -->

  <h3>Your Booking History</h3>
  <?php if (mysqli_num_rows($result) > 0): ?>
    <table>
      <tr>
        <th>#</th>
        <th>Phone</th>
        <th>Pickup</th>
        <th>Drop</th>
        <th>Date & Time</th>
        <th>Booked At</th>
      </tr>
      <?php
      $i = 1;
      while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo htmlspecialchars($row['phone']); ?></td>
          <td><?php echo htmlspecialchars($row['pickup']); ?></td>
          <td><?php echo htmlspecialchars($row['drop_loc']); ?></td>
          <td><?php echo htmlspecialchars($row['datetime']); ?></td>
          <td><?php echo htmlspecialchars($row['booked_at']); ?></td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p>No bookings yet! Book your first ride above 🚕</p>
  <?php endif; ?>
</div>

</body>
</html>
