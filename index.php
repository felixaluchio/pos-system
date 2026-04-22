<?php
session_start();
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <?php include 'links.php'; ?>
  <div class="container">
    <div class ="container mt-4">
      <div = "alert alert-success">
        Welcome back, <strong><?php echo htmlspecialchars($_SESSION['fullname']); ?></strong>
    </div>
  </div>
  </div>
</body>
</html>