<?php
$con = mysqli_connect('localhost', 'root', 'roshansql', 'sign_up');
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['sb'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  // Check if passwords match
  if ($password != $cpassword) {
    echo "<script>alert('Passwords do not match!');</script>";
  } else {

    // ✅ Check if user already exists by email
    $check_query = "SELECT * FROM `sign` WHERE email = '$email'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
      // User already exists
      echo "<script>alert('User with this email already exists!');</script>";
    } else {
      // Insert new user
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `sign` (`name`, `address`, `contact`, `email`, `password`)
                VALUES ('$name', '$address', '$contact', '$email','$new_password')";

      $run = mysqli_query($con, $query);

      if ($run) {
        echo "<script>alert('Signup successful!'); window.location.href='../backend/login.php';</script>";
     // or index.php
         exit();
      } else {
        echo "<script>alert('Database error: " . mysqli_error($con) . "');</script>";
      }
    }
  }
}
?>
