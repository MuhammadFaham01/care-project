<?php
session_start();

include 'link.php';
include '../backend/db.php';


if (isset($_POST['submit'])) {
    $inptEmail = $_POST['email'];
    $inptPassword = $_POST['password'];

    // Query the database to get the user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $cons->prepare($sql);
    $stmt->bind_param("s", $inptEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($inptPassword, $row['password'])) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role_id'] = $row['role_id'];

            if ($row['role_id'] == 3) {
                echo "<script>
                        alert('Successfully signed in');
                        location.href='index.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Unauthorized access');
                        location.href='login.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Invalid password');
                    location.href='login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('No user found with this email');
                location.href='login.php';
              </script>";
    }

    $stmt->close();
    $cons->close();
}
?>




<body>
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
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                           
                            <h6 class="mb-4">LogIn</h6>
                        </div>
                        <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">login</button>
                        </form>
                        <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
<?php include 'footer.php'?>