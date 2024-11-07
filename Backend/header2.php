<?php
session_start();


include 'db.php'; 

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


   $stmt = $cons->prepare("SELECT * FROM users WHERE user_id = ?");
   $stmt->bind_param("i", $user_id);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows == 1) {
       $user = $result->fetch_assoc();
       
       $_SESSION['profile_picture'] = $user['profile_picture'];
       $_SESSION['name'] = $user['name'];
       $_SESSION['email'] = $user['email'];
       $_SESSION['password'] = $user['password'];
 
   } else {
      
       $_SESSION['profile_picture'] = 'default-profile.png'; 
      
   }

    $stmt = $cons->prepare("SELECT doctor_id FROM doctors WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $doctor = $result->fetch_assoc();
        $doctor_id = $doctor['doctor_id'];

        
        $stmt = $cons->prepare("SELECT *
                                FROM doctors d 
                                JOIN categories c ON d.category_id = c.category_id 
                                WHERE d.doctor_id = ?");
        $stmt->bind_param("i", $doctor_id);
        $stmt->execute();
        $doctor_details = $stmt->get_result();

        if ($doctor_details->num_rows == 1) {
            
            $doctor_info = $doctor_details->fetch_assoc();
            $doctor_id = $doctor_info['doctor_id'];
            $first_name = $doctor_info['first_name'];
            $last_name = $doctor_info['last_name'];
            $address = $doctor_info['address'];
            $phone_number = $doctor_info['phone_number'];
            $category_name = $doctor_info['category_name'];
          
          
        } else {
          
            $profile_image = 'default-profile.png'; 
            $first_name = 'Unknown';
            $last_name = 'Doctor';
        }
    } else {
        
        header("Location: signin.php");
        exit();
    }

    $stmt->close();
} else {
   
    header("Location: signin.php");
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
                        <img class="rounded-circle" src="uploads-images/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Profile Image" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h5 class="mb-0"><?php echo htmlspecialchars($_SESSION['name']);?></h5>

                    </div>
                    </div>
                       
                <div class="navbar-nav w-100">
                <a href="index2.php" class="nav-item nav-link active"><i class="fa-solid fa-user-doctor"></i>Doctor Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-bell"></i> Appointment</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="appoientment2.php" class="dropdown-item">view appoientment</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown text-dark">
                    <a href="" class="nav-item nav-link active"><i class="fa-solid fa-user-tie me-2 text-dark"></i>status</a><br>

                    </div>
                    <div class="nav-item dropdown">
                    <a href="add-contact.php" class="nav-item nav-link active"><i class="fa-solid fa-user-tie me-2 text-dark"></i>Contact</a>

                    </div>
                        </div>

            </nav>
        </div>
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index2.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
             
                <div class="navbar-nav align-items-center ms-auto">
                  
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle" src="uploads-images/<?php echo htmlspecialchars($_SESSION['profile_picture']); ?>" alt="Profile Image" style="width: 40px; height: 40px;">
                       

                        <!-- <h6 class="mb-0"></h6> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="profile.php" class="dropdown-item">My Profile</a>
                            <!-- <a href="#" class="dropdown-item">Settings</a> -->
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
