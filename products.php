
<?php
session_start();
include "dbcon.php";
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>

<?php include 'links.php'; ?>

<div class="card">
    <div class="container mt-4">

        <div class="card-header">
            New Products

            <?php

            if (isset($_POST['save'])) {

                // Get values from the form
                $product_code  = $_POST['product_code'];
                $product_name  = $_POST['product_name'];
                $quantity      = $_POST['quantity'];
                $buying_price  = $_POST['buying_price'];
                $selling_price = $_POST['selling_price'];

                // Prepare SQL statement
                $sql = "INSERT INTO products
                        (product_code, product_name, quantity, buying_price, selling_price)
                        VALUES (?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($dbcon, $sql);

                if ($stmt) {

                    // Bind values to the placeholders
                    mysqli_stmt_bind_param(
                        $stmt,
                        "ssidd",
                        $product_code,
                        $product_name,
                        $quantity,
                        $buying_price,
                        $selling_price
                    );

                    // Execute the statement
                    if (mysqli_stmt_execute($stmt)) {

                        echo "<p class='text-success'>
                                Product saved successfully
                              </p>";

                    } else {

                        echo "<p class='text-danger'>
                                Error: product not saved - "
                                . mysqli_stmt_error($stmt) .
                              "</p>";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);

                } else {

                    echo "<p class='text-danger'>
                            Error preparing statement - "
                            . mysqli_error($dbcon) .
                          "</p>";
                }
            }

            ?>

        </div>

        <div class="card-body">

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input
                        type="text"
                        name="product_name"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Code</label>
                    <input
                        type="text"
                        name="product_code"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input
                        type="number"
                        name="quantity"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Buying Price</label>
                    <input
                        type="number"
                        name="buying_price"
                        class="form-control"
                        step="0.01"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Selling Price (KSH)</label>
                    <input
                        type="number"
                        name="selling_price"
                        class="form-control"
                        step="0.01"
                        required
                    >
                </div>

                <button
                    type="submit"
                    name="save"
                    value="save"
                    class="btn btn-primary"
                >
                    Submit
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>
