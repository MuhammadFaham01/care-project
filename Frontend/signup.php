<?php



include 'link.php';
include '../backend/db.php';
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

    $role_id = 3;

    $upload_dir = "../backend/uploads-images/";

   
    if (!empty($file_name)) {
    
        if (move_uploaded_file($file_tmp , $upload_dir . $file_name)) {
    
            $sql = "INSERT INTO `users`( `name`, `email`,`password`, `profile_picture`,`role_id`) 
            VALUES ('$name','$email','$hashedPassword','$file_name','$role_id')";

            if (mysqli_query($cons, $sql))
            {
                echo "<script>alert('signup successfully!'); window.location.href ='login.php';</script>";
            } 
            else 
            {
                ?>
                <script>alert(" not signup ");</script>
                <?php
            }
            mysqli_close($cons);
        }  
    }
}
?>

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0 text-primary">CEAR</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="service.php" class="nav-item nav-link">Service</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    <a href="feature.php" class="dropdown-item">Feature</a>
                    <a href="team.php" class="dropdown-item">Our Doctor</a>
                    <a href="appointment.php" class="dropdown-item">Appointment</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                    <a href="404.php" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
        </div>
        </div>
        </nav>


<div class="container-fluid">
            <div class="row  align-items-center justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <h6 class="mb-4">signup</h6>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required minlength="3">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="pass" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="pimage" class="form-label">Profile Image</label>
                            <input type="file" name="pimage" class="form-control" id="pimage" required accept="image/*">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
                        <a href="login.php" class="btn btn-link">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Back to Top -->

    <!-- JavaScript Libraries -->
   
    <script>
function validateForm() {
    // Validate Name
    const name = document.getElementById('name').value;
    if (name.length < 3) {
        alert("Name must be at least 3 characters long.");
        return false;
    }

    // Validate Email
    const email = document.getElementById('email').value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validate Password
    const password = document.getElementById('pass').value;
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    // Validate Profile Image
    const pimage = document.getElementById('pimage').files[0];
    if (!pimage) {
        alert("Please upload a profile image.");
        return false;
    }

    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(pimage.name)) {
        alert("Only image files with .jpeg, .jpg, .png, .gif extensions are allowed.");
        return false;
    }

    return true;
}
</script>

<?php include 'footer.php'?>
    
