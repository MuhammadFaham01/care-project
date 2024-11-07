<?php

include 'header2.php';
include 'link.php';
include 'db.php';
$id = $_GET['id'];

// Select data from the correct table
$selectQuery = "SELECT * FROM users WHERE user_id = $id";
$showdata = mysqli_query($cons, $selectQuery);
$arraydata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Handle file upload
    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $upload_dir = "uploads-images/";

    if (empty($file_name)) {
        $file_name = $arraydata['profile_picture'];
    } else {
        if (!move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            echo "<script>alert('Failed to upload profile picture');</script>";
            exit;
        }
    }

    // Update the query with correct table and parameters
    $sql = "UPDATE `users` SET `name`=?, `email`=?, `password`=?, `profile_picture`=? WHERE `user_id`=?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($cons, $sql)) {
        // Bind parameters, with 5 placeholders: 4 strings and 1 integer
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $hashed_password, $file_name, $id);

        // Execute the query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Edit successful!'); window.location.href ='profile.php';</script>";
        } else {
            echo "<script>alert('Not Edit');</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Failed to prepare statement');</script>";
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
                    <h6 class="mb-4">Edit profile</h6>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="firstName" value="<?php echo $arraydata['name']; ?>" required>
                        </div>
                       
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $arraydata['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="password" name="password" class="form-control" id="password" value="<?php echo $arraydata['password']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="profileImage" class="form-label">Profile Image</label>
                            <input type="file" name="pimage" class="form-control" id="profileImage">
                            <!-- Show current profile image -->
                            <img src="uploads-images/<?php echo $arraydata['profile_picture']; ?>" alt="Current Profile Image" style="width:100px; height:100px;">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>
</html>
