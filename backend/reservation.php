<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Taxi Reservation Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fffbe9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .reservation-card {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      max-width: 450px;
      width: 100%;
    }

    .reservation-card h2 {
      margin-bottom: 20px;
      font-size: 22px;
      font-weight: bold;
      color: #222;
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      font-weight: bold;
      color: #444;
    }

    .form-group input, 
    .form-group select, 
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      outline: none;
      transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #fbbc04;
    }

    .btn {
      display: inline-block;
      width: 48%;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      background-color: #fbbc04;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 10px;
    }

    .btn:hover {
      background-color: #e0a600;
    }

    .btn-back {
      background-color: #555; /* grey for back */
    }

    .btn-back:hover {
      background-color: #333;
    }

    .button-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }
  </style>
</head>
<body>
  <div class="reservation-card">
    <h2>Reserve Your Taxi</h2>
    <form method="post">
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Enter your phone" required>
      </div>

      <div class="form-group">
        <label for="pickup">Pickup Location</label>
        <input type="text" id="pickup" name="pick" placeholder="Enter pickup point" required>
      </div>

      <div class="form-group">
        <label for="drop">Drop Location</label>
        <input type="text" id="drop" name="drop" placeholder="Enter drop point" required>
      </div>

      <div class="form-group">
        <label for="date">Date of Travel</label>
        <input type="date" id="date" name="date" required>
      </div>

      <div class="form-group">
        <label for="time">Pickup Time</label>
        <input type="time" id="time" name="time" required>
      </div>

      <div class="button-group">
        <!-- Back button using history -->
        <button type="button" class="btn btn-back" onclick="history.back()">Back</button>

        <!-- Reserve Now button -->
        <button type="submit" class="btn" name="sb">Reserve Now</button>
      </div>
    </form>
  </div>


  <!-- PHP codestartss here -->
<?php
// Connect to MySQL
$con = mysqli_connect('localhost', 'root', 'roshansql', 'sign_up');

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sb'])) {
  // Get form data safely
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $pick = $_POST['pick'];
  $drop = $_POST['drop'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  // ✅ Use backticks for reserved words like `date`, `time`, `drop`, `pick`
  $query = "INSERT INTO `reservation` (`name`, `phone`, `pick`, `drop`, `date`, `time`)
            VALUES ('$name', '$phone', '$pick', '$drop', '$date', '$time')";

  $run = mysqli_query($con, $query);

  if ($run) {
    echo "<script>alert('Reservation successful!');</script>";
  } else {
    // Show MySQL error message for debugging
    echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
  }
}
?>



</body>
</html>
