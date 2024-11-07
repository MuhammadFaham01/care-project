    <?php
    session_start();
    ?>
    </head>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <?php
include '../backend/db.php';

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

if ($isLoggedIn) {
    // Get the logged-in user's ID from the session
    $userId = $_SESSION['user_id'];
    // Query to select profile_picture and role_id for the logged-in user
    $selectquery = "SELECT profile_picture, role_id FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($cons, $selectquery);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Check if the user has the role_id 3
        $hasAccess = ($user['role_id'] == 3);
        mysqli_stmt_close($stmt);
    } else {
        // Handle query error
        $hasAccess = false;
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
                    
                </div>
            </div>
            <a href="contact.php" class="nav-item nav-link">Contact</a>

            <?php if ($isLoggedIn && $hasAccess): ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle profile-pic" src="../backend/uploads-images/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0 custom-dropdown">
                    <a href="patient-dashbord.php" class="dropdown-item">View Appointment</a>    
                    <a href="logout.php" class="dropdown-item">Logout</a>
                        
                    </div>
                </div>
                <style>
                    .profile-pic {
                        border: 1px solid blue;
                        width: 40px;
                        height: 40px;
                        object-fit: cover;
                        margin-left: 8px;
                    }
                    .custom-dropdown {
                        padding: 5px;
                    }
                    .dropdown-menu-end {
                        right: 0;
                        left: auto;
                    }
                </style>
            <?php else: ?>
                <a href="login.php" class="nav-item nav-link">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<script>
    document.querySelector('.navbar-toggler').addEventListener('click', function () {
        let togglerIcon = this.querySelector('.navbar-toggler-icon');
        if (togglerIcon.classList.contains('open')) {
            togglerIcon.classList.remove('open');
            togglerIcon.innerHTML = '<span class="navbar-toggler-icon"></span>'; // Default icon
        } else {
            togglerIcon.classList.add('open');
            togglerIcon.innerHTML = '&times;'; // Custom close icon
        }
    });
</script>