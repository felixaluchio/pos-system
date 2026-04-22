
<?
session_start();
if(!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin'){
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
</head>
<body>
  <?php include 'links.php'; ?>
  <div class="container">
    <div class="card bg-primary">
    New user
    <?php
        if(isset($_POST['save'])){
          $username = htmlspecialchars($_POST['username'],ENT_QUOTES);
          $fullname = htmlspecialchars($_POST['fullname'],ENT_QUOTES);
          $usertype =htmlspecialchars ($_POST['usertype'],ENT_QUOTES);
          $password =htmlspecialchars ($_POST['password'],ENT_QUOTES);
          $sql = "INSERT INTO users (username, fullname, usertype, password) VALUES('$username','$fullname','$usertype','$password')";
          $new_user= mysqli_query($dbcon, $sql);
          if($new_user){
            echo "<p class = 'text-success'>user saved</p>";
          }
          else{
            echo "<p class = 'text-danger'>Error, user not saved";
          }
        }
        
      ?>
      <div class="card-body">
     <form method = "post">
          <div class = "mb-3">
            <label >username</label>
            <input type = "text" name = "username"  class="form-control">
          </div>
           <div class = "mb-3">
            <label >fullname</label>
            <input type = "text" name = "fullname" class="form-control">
          </div>
         <div class = "mb-3">
          <label>Usertype</label>
          <select name="usertype" class = "form-control">
            <option value="admin">Admin</option>
            <option value="user">user</option>
          </select>
          </div>
</div>
          <div class = "mb-3">
            <label >password</label>
            <input type = "password" name = "password" class="form-control">
          </div>
          <button type = "submit" name = "save" value ="save" class = "btn btn-primary">Submit</button>
        </form>
      </div>
  
</body>
</html>