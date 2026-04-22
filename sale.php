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

</head>
<body>
  <?php include 'links.php'; ?>
  <div class="container">
    div class="card">
      <div class="card-header bg-success text-white">
        Make a Sale
      </div>
      <div class="card-body">
        if (isset($_POST['sell'])){
          $product_Id = htmlspecialchars($_POST['product_Id'],ENT_QUOTES);
          $quatity_sold = htmlspecialchars($_POST['quatity_sold'],ENT_QUOTES);
          $sql = "INSERT INTO sales (product_Id, quatity_sold) VALUES('$product_Id','$quatity_sold')";
          $new_product= mysqli_query($dbcon, $sql);
          f(mysqli_num_rows($new_product) > 0){
            $product = mysqli_fetch_assoc($new_product);
            $current_qty = $product['quantity'];
            $selling_price = $product['selling_price'];
            $product_name = $product['product_name'];
            if($quantity_sold <= $current_qty){
              $total_price = $quantity_sold * $selling_price;
              $new_qty = $current_qty - $quantity_sold;
              $update_qty = mysqli_query($dbcon, "UPDATE products SET quantity = '$new_qty' WHERE id = '$product_id'");
              $sale_date = date('Y-m-d H:i:s');
              $username = $_SESSION['username'];
              $insert_sale = mysqli_query($dbcon, "INSERT INTO sales (product_id, product_name, quantity, total_price, sale_date, sold_by) 
                                                   VALUES ('$product_id', '$product_name', '$quantity_sold', '$total_price', '$sale_date', '$username')");
              if($update_qty && $insert_sale){
                echo "<p class='text-success'>Sale successful! Total: KSH " . number_format($total_price, 2) . "</p>";
              } else {
                echo "<p class='text-danger'>Error recording sale: " . mysqli_error($dbcon) . "</p>";
              }
            } else {
              echo "<p class='text-danger'>Insufficient stock. Available: $current_qty</p>";
            }
          } else {
            echo "<p class='text-danger'>Product not found</p>";
          }
        }
        ?>
        
        <form method="post">
          <div class="mb-3">
            <label>Select Product</label>
            <select name="product_id" class="form-control" required>
              <option value="">-- Choose Product --</option>
              <?php
              $products = mysqli_query($dbcon, "SELECT id, product_name, quantity, selling_price FROM products WHERE quantity > 0");
              while($row = mysqli_fetch_assoc($products)){
                echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['product_name']) . " (Stock: " . $row['quantity'] . ", Price: KSH " . $row['selling_price'] . ")</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
          </div>
          <button type="submit" name="sell" class="btn btn-success">Sell</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
  
