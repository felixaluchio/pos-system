```php
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link
        href="bootstrap-5.3.8-dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap JavaScript -->
    <script src="bootstrap-5.3.8-dist/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include 'links.php'; ?>

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px;">

            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>

            <div class="card-body">

                <form action="login.php" method="POST">

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control"
                            required
                        >
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            required
                        >
                    </div>

                    <!-- Login Button -->
                    <div class="d-grid">
                        <input
                            type="submit"
                            name="login"
                            class="btn btn-primary"
                            value="Login"
                        >
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>
```




