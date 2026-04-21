<?session_start();
if(!isset($_SESSION['username']) && $_SESSION['usertype'] != 'admin'){
  header("Location: login.php");
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
  <div class="container mt-4">
    <div class="card_header">
     New products
      <?php
        if(isset($_POST['save'])){
          $product_code = htmlspecialchars($_POST['product_code'],ENT_QUOTES);
          $product_name = sha1($_POST['product_name']);
          $quantity =htmlspecialchars ($_POST['quantity'],ENT_QUOTES);
          $buying_price =htmlspecialchars ($_POST['buying_price'],ENT_QUOTES);
          $selling_price = htmlspecialchars($_POST['selling_price'],ENT_QUOTES);
          $new_product= mysqli_query($dbcon, "INSERT INTO products (product_code, product_name, quantity, buying_price, selling_price) VALUES('$product_code','$product_name','$quantity','$buying_price','$selling_price')");
          if($new_product){
            echo "product saved";
          }
          else{
            echo "Error, product not saved";
          }
        }
        
      ?>



      </div>
      <div class="card-body">
        <form method = "post">
          <div class = "mb-3">
            <label >product name</label>
            <input type = "text" name = "product_name" class = "form-control" id = "name">
          </div>
           <div class = "mb-3">
            <label for = "price" class = "form-label">product code</label>
            <input type = "text" name = "product_code" class = "form-control" id = "price">
          </div>

          <div class = "mb-3">
            <label for = "description" class = "form-label">quantity</label>
            <input type = "number" name = "quantity" class = "form-control" >
          </div>
           <div class = "mb-3">
            <label for = "description" class = "form-label">buying price</label>
            <input type = "number" name = " buying_price" class = "form-control" >
          </div>
           <div class = "mb-3">
            <label for = "description" class = "form-label">selling price(KSH)</label>
            <input type = "number" name = "selling_price" class = "form-control" >
          </div>
          <button type = "submit" name = "save" value ="save" class = "btn btn-primary">Submit</button>
        </form>
      </div>
</body>
</html>