<?php
include "dbcon.php";

$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
$password = $_POST['password'];
$user_query = mysqli_query($dbcon, "SELECT * FROM users WHERE username = '$username'");

if (mysqli_num_rows($user_query) > 0) {
  $row = mysqli_fetch_assoc($user_query);
  // Verify hashed password
  if (password_verify($password, $row['password'])) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['usertype'] = $row['usertype'];
    header("Location: index.php");
    exit ();
  } 
    echo '<p class="text-danger">Invalid username or password</p>';
  
} 