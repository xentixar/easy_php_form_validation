<?php
require_once './../autoload.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Data Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5 py-5" style="max-width: 500px; margin:auto">
        <div class="form">
            <h3>Validation Form</h3>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $request_data = array_merge($_POST, $_GET, $_FILES);

                $validation = new Validation($request_data);
                $validated = $validation->validate([
                    'name' => 'required|max:100',
                    'email' => 'required|email|max:100|exists:users,email',
                    'password' => 'required|min:8|max:25',
                    'role' => 'required|in:admin,user'
                ]);

                if ($validated) {
                    // Validated
                    // Do other stuffs
                }
            }
            ?>
            <form action="#" method="post">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <small class="text-danger"><?= isset($_SESSION['error']['name']) ? $_SESSION['error']['name'] : '' ?></small>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email">
                    <small class="text-danger"><?= isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '' ?></small>
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" id="password">
                    <small class="text-danger"><?= isset($_SESSION['error']['password']) ? $_SESSION['error']['password'] : '' ?></small>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save Data</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>


<?php unset($_SESSION['error'])  ?>