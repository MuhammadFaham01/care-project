<?php

include 'header.php';
include 'link.php';
include 'db.php';


$id = $_GET ['id'];


$selectQuery = " select * from users where user_id = $id";

$showdata = mysqli_query($cons,$selectQuery);
$arraydata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {

    $id = $_GET['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);

    // Get the selected role_id from the form
    $role_id = $_POST['role'];

    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];

    $upload_dir = "uploads-images/";

    if (!empty($file_name)) {

        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {

            // Corrected SQL query
            $sql = "UPDATE `users` SET `name`=?, `email`=?, `password`=?, `profile_picture`=?, `role_id`=? WHERE `user_id`=?";

            // Prepare the SQL statement
            if ($stmt = mysqli_prepare($cons, $sql)) {
                // Bind parameters to the statement
                mysqli_stmt_bind_param($stmt, "sssssi", $name, $email, $hashedPassword, $file_name, $role_id, $id);

                // Execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Edit successfully!'); window.location.href ='admin-profile.php';</script>";
                } else {
                    echo "<script>alert('User not edited');</script>";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Failed to prepare statement');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload profile picture');</script>";
        }
    } else {
        echo "<script>alert('No profile picture uploaded');</script>";
    }

    // Close the database connection
    mysqli_close($cons);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content here -->
</head>
<body>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit users</h6>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="productName" value="<?php echo $arraydata ['name']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="productPrice" aria-describedby="priceHelp" value="<?php echo $arraydata ['email']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="productPrice" aria-describedby="priceHelp" value="<?php echo $arraydata ['password']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Profile Image</label>
                            <input type="file" name="pimage" class="form-control" id="productImage" value="<?php echo $arraydata ['profile_picture']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Select Role</label>
                            <select name="role" class="form-control" id="role" required>
                                <?php
                                $roleQuery = "SELECT role_id, role_type FROM roles";
                                $roleResult = mysqli_query($cons, $roleQuery);

                                if ($roleResult && mysqli_num_rows($roleResult) > 0) {
                                    while ($role = mysqli_fetch_assoc($roleResult)) {
                                        echo "<option value='" . $role['role_id'] . "'>" . $role['role_type'] . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No roles available</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit users</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>
</html>
