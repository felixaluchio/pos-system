<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>
<body>
  <?php include 'links.php'; ?>
  <div class = "container mt-5">
    <div class="card">
      <div class="card-header">
        <h3>Login</h3>
      </div>
      <div class = "card-body">
        <?php
        if(isset($_POST['login'])){
          $username =htmlspecialchars($_POST['username'],ENT_QUOTES);
          $password =$_POST['password'];
          $user_query = mysqli_query($dbcon, "SELECT * FROM users WHERE username = '$username'");
          
          if(mysqli_num_rows($user_query) > 0){
            $row = mysqli_fetch_assoc($user_query);
            // Verify hashed password
            if(password_verify($password, $row['password'])){
              $_SESSION['username'] = $row['username'];
              $_SESSION['fullname'] = $row['fullname'];
              $_SESSION['usertype'] = $row['usertype'];
              header("Location: index.php");
              exit;
            }
         else {
              echo '<p class="text-danger">Invalid username or password</p>';
            }
          } else {
            echo '<p class="text-danger">Invalid username or password</p>';
          }
        }
        ?>

   <form  action = "login.php" method = "post">
      <div class = "mb-3">
            <label >username</label>
            <input type = "text" name = "username"  class="form-control">
          </div>
           <div class = "mb-3">
            <label >password</label>
            <input type = "password" name = "password" class="form-control">
          </div>
          <div class = "mb-3 d-grid">
          <input type ="submit" name ="login"  class ="btn btn-primary" value ="login">
    
          </div>
</form>
      </div>
    </div>
  </div>
</body>
</html>
  

