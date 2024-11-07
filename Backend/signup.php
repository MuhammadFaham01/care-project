<?php

use function PHPSTORM_META\type;

// include 'navebar.php';
include 'link.php';
include 'db.php';
?>

<?php
if (isset( $_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
  
    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $file_type = $_FILES['pimage']['type'];
    $file_size = $_FILES['pimage']['size'];

    $role_id = 1;

    $upload_dir = "uploads-images/";

   
    if (!empty($file_name)) {
      
        if (move_uploaded_file($file_tmp , $upload_dir . $file_name)) {
    
            $sql = "INSERT INTO `users`( `name`, `email`,`password`, `profile_picture`,`role_id`) 
            VALUES ('$name','$email','$hashedPassword','$file_name','$role_id')";

            if (mysqli_query($cons, $sql))
            {
                echo "<script>alert('signup successfully!'); window.location.href ='signin.php';</script>";
            } 
            else 
            {
                ?>

                <script>alert("No signup ");</script>
                <?php
            }
            mysqli_close($cons);
        }
         
    }
}
?>




<body>
<body>
    <div class="container-fluid bg-white">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h6 class="mb-4">Signup</h6>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="pimage" class="form-label">Profile Image</label>
                            <input type="file" name="pimage" class="form-control" id="pimage" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
                        <a href="signin.php" class="btn btn-link">Signin</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>


    <!-- Back to Top -->



    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
