<?php
include 'db.php';
session_start(); 


$isLoggedIn = isset($_SESSION['user_id']);

if ($isLoggedIn) {
   
    $userId = $_SESSION['user_id'];

 
    $selectquery = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($cons, $selectquery);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

   
    $user = mysqli_fetch_assoc($result);

   
    if ($user['role_id'] != 1) {
      
        echo "<script>location.href='signin.php';</script>";
        exit();
    }
} else {
  
    echo "<script>location.href='signin.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                     
                        <img class="rounded-circle" src="uploads-images/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                      
                        <h6 class="mb-0"><?php echo htmlspecialchars($user['name']); ?></h6>
                        <p>Admin</p>
                    </div>
                    </div>
                      
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa-solid fa-user-tie me-2"></i>Admin Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-ruler-vertical"></i> role</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-role.php" class="dropdown-item">Add role</a>
                            <a href="view-role.php" class="dropdown-item">View role</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-users"></i> Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-users.php" class="dropdown-item">Add users</a>
                            <a href="view-user.php" class="dropdown-item">View users</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-flag"></i> Cites</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-city.php" class="dropdown-item">Add Cites</a>
                            <a href="view-city.php" class="dropdown-item">View Cites</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-duotone fa-solid fa-layer-group"></i> Category</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-category.php" class="dropdown-item">Add Category</a>
                            <a href="view-category.php" class="dropdown-item">View Category</a>    
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user-doctor"></i> Doctor</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="add-doctur.php" class="dropdown-item">Add new Doctor</a>
                            <a href="view-doctor.php" class="dropdown-item">View Doctor</a>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="appointment.php" class="nav-link dropdown-toggle"><i class="fa-solid fa-bell"></i> Appointment</a>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-user-tie me-2"></i>Contact</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="contact.php" class="dropdown-item">View Contact</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i> Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.php" class="dropdown-item">Sign In</a>
                            <!-- <a href="signup.php" class="dropdown-item">Sign Up</a> -->
                            <a href="404.php" class="dropdown-item">404 Error</a>
                          
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                            </a>
                            <hr class="dropdown-divider">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle" src="uploads-images/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" style="width: 40px; height: 40px;">
                 
                        <!-- <h6 class="mb-0"></h6> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="admin-profile.php" class="dropdown-item">My Profile</a>
                            <!-- <a href="#" class="dropdown-item">Settings</a> -->
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->