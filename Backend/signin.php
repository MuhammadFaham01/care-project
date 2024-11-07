<?php
session_start();

include 'link.php';
include 'db.php'; 

if (isset($_POST['submit'])) {
    $inptEmail = $_POST['email'];
    $inptPassword = $_POST['password'];
    if (!empty($inptEmail) && !empty($inptPassword)) {
        
        
        $stmt = $cons->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $inptEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

           
            if (password_verify($inptPassword, $row['password'])) {
                // Set session variables
                $_SESSION['email'] = $row['email'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['role_id'] = $row['role_id'];

                // Redirect based on role_id
                if ($row['role_id'] == 1) {
                    // Admin role
                    echo "<script>
                            alert('Successfully signed in as Admin');
                            location.href='index.php'; // Admin page
                          </script>";
                } elseif ($row['role_id'] == 2) {
                    // Doctor role
                    echo "<script>
                            alert('Successfully signed in as Doctor');
                            location.href='index2.php'; // Doctor page
                          </script>";
                } else {
                    // Unrecognized role
                    echo "<script>
                            alert('Role not recognized');
                            location.href='signin.php';
                          </script>";
                }
            } else {
                // Invalid password
                echo "<script>
                        alert('Invalid password');
                        location.href='signin.php';
                      </script>";
            }
        } else {
            // No user found with the provided email
            echo "<script>
                    alert('No user found with this email');
                    location.href='signin.php';
                  </script>";
        }

        $stmt->close();
    } else {
        // If fields are empty
        echo "<script>
                alert('Please provide both email and password.');
                location.href='signin.php';
              </script>";
    }
}
?>




<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa-solid fa-user-tie me-2"></i>Sign In</h3>
                            </a>
                          
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
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        </form>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>