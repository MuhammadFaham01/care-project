<?php 
include 'link.php';
include 'header.php';
$sql = "SELECT COUNT(*) AS categories_count FROM categories";
$result = mysqli_query($cons, $sql);
$row = mysqli_fetch_assoc($result);
$categories_count = $row['categories_count'];
$sql = "SELECT role_id, COUNT(*) AS count FROM users WHERE role_id IN (1, 2, 3) GROUP BY role_id";
$result = mysqli_query($cons, $sql);
$role_counts = array();

while ($row = mysqli_fetch_assoc($result)) {
    $role_counts[$row['role_id']] = $row['count'];
}
?>
    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-4">
    <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
            <div class="owl-carousel header-carousel">
       
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid w-100 h-100" src="img/hospital image.jpg" alt="Heart Specialist">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; max-height: 700px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown" style="margin-top:-30px">Heart specialist diagnosing</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn"> cardiovascular & diseases.</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                            <a href="contact.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                
       
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid w-100 h-100" src="img/hospital 4.jpg" alt="Heart Specialist">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px; max-height: 700px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown" style="margin-top:-30px">Brain and </h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Nervous system specialist</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                            <a href="contact.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
          
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid w-100 h-100" src="img/hospital 2.jpg" alt="Heart Specialist">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 930px; max-height: 700px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown" style="margin-top:-30px">Lung specialist</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Treating respiratory disorders.</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" >Free Quote</a>
                            <a href="contact.php" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>


    /* Responsive behavior for small screens (mobile) */
    @media (max-width: 767px) {
        .owl-carousel-item {
            height: 300px; 
            margin-top: -10px;
        }

        .carousel-caption h1 {
            font-size: 2rem;
        }

        .carousel-caption h5 {
            font-size: 1rem; 
        }

        .d-flex.flex-column {
            display: flex;
            flex-direction: column;
        }

        .carousel-caption a {
            width: 45%; 
            text-align: center;
        }

        .carousel-caption .btn {
            margin-bottom: 10px; 
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        .owl-carousel-item {
            height: 500px; 
        }

        .carousel-caption h1 {
            font-size: 3rem;
        }

        .carousel-caption h5 {
            font-size: 1.25rem;
        }
    }
</style>
    <!-- Header End -->
<!-- new -->
<div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Happy Doctor</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up"><?php echo isset($role_counts[2]) ? $role_counts[2] : 0; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-check text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Medical Stuff</h5>
                            <h1 class="mb-0" data-toggle="counter-up"><?php echo $categories_count; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Total Patients</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up"><?php echo isset($role_counts[3]) ? $role_counts[3] : 0; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid rounded w-75 align-self-end" src="img/about-1.jpg" alt="">
                        <img class="img-fluid rounded w-50 bg-white pt-3 pe-3" src="img/about-2.jpg" alt="" style="margin-top: -25%;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">About Us</p>
                    <h1 class="mb-4">Why You Should Trust Us? Get Know About Us!</h1>
                    <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor eos.</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Quality health care</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Only Qualified Doctors</p>
                    <p><i class="far fa-check-circle text-primary me-3"></i>Medical Research Professionals</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.1s" href="about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Services</p>
            <h1>Health Care Solutions</h1>
        </div>
        <div class="row g-4">
            <?php 
            $selectquery = "SELECT * FROM categories";  
            $query = mysqli_query($cons, $selectquery);
            
            if (!$query) {
                echo "Error: " . mysqli_error($cons);
                exit;
            }
            while ($res = mysqli_fetch_assoc($query)) {
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <!-- <i class="fa fa-heartbeat text-primary fs-4"></i> -->
                            <!-- Assuming c_image contains a valid image URL -->
                            <img src="../backend/uploads-images/<?php echo $res['c_image']; ?>" alt="Category Image" style="width: 65px; height: 65px; border-radius: 50%;">
                        </div>
                        <h4 class="mb-3"><?php echo $res['category_name']; ?></h4>
                        <p class="mb-4"><?php echo $res['category_desc']; ?></p>
                        <a class="btn" href="#"><i class="fa fa-plus text-primary me-3"></i></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
    <!-- Service End -->

    <!-- Feature Start -->
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        <p class="d-inline-block border rounded-pill text-light py-1 px-4">Features</p>
                        <h1 class="text-white mb-4">Why Choose Us</h1>
                        <p class="text-white mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo erat amet</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Experience</p>
                                        <h5 class="text-white mb-0">Doctors</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-check text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Quality</p>
                                        <h5 class="text-white mb-0">Services</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-comment-medical text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Positive</p>
                                        <h5 class="text-white mb-0">Consultation</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-headphones text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">24 Hours</p>
                                        <h5 class="text-white mb-0">Support</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="img/feature.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

     <!-- Team Start -->
     <div class="container-xxl py-5">
    <div class="container">
        <!-- Header and Filter Form in a Single Row -->
        <div class="row align-items-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-md-8 text-center text-md-start mb-4 mb-md-0">
                <h1>Our Experienced Doctors</h1>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <!-- Filter Form -->
                <form method="GET" action="" class="d-inline-block">
                    <select name="id" onchange="this.form.submit()" class="form-select form-select-lg">
                        <option value="">All Categories</option>
                        <?php
                        // Fetch categories for the filter dropdown
                        $categoryQuery = "SELECT * FROM categories";
                        $categoryResult = mysqli_query($cons, $categoryQuery);
                        if ($categoryResult) {
                            while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                $selected = (isset($_GET['id']) && $_GET['id'] == $categoryRow['category_id']) ? 'selected' : '';
                                echo "<option value='{$categoryRow['category_id']}' $selected>{$categoryRow['category_name']}</option>";
                            }
                        } else {
                            echo "Error: " . mysqli_error($cons);
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $category = intval($_GET['id']); // Ensure the category ID is an integer
                $whereClause = "WHERE doctors.category_id = $category";
            } else {
                $whereClause = ""; 
            }
            
            $selectquery = "
                SELECT doctors.*, categories.category_name 
                FROM doctors 
                INNER JOIN categories ON doctors.category_id = categories.category_id
                $whereClause";
            $query = mysqli_query($cons, $selectquery);
            if (!$query) {
                echo "Error: " . mysqli_error($cons);
                exit;
            } 
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <a href="doctor-details.php?id=<?php echo $row['doctor_id']; ?>">
                                <img class="img-fluid doctor-image" src="../backend/uploads-images/<?php echo $row['profile_picture']; ?>" alt="Doctor Image">
                            </a>
                            <style>
                                .doctor-image {
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover; /* Ensures the image fills the space while maintaining aspect ratio */
                                }
                            </style>                   
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                            <p class="text-primary"><?php echo $row['category_name']; ?></p>
                            <a href="appointment.php?id=<?php echo $row['doctor_id']?>"><p class="text-primary">Book Appointment</p></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- Team End -->
    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded-pill py-1 px-4">Appointment</p>
                    <h1 class="mb-4">Make An Appointment To Visit Our Doctor</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="bg-light rounded d-flex align-items-center p-5 mb-4">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">+012 345 6789</h5>
                        </div>
                    </div>
                    <div class="bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0">info@example.com</h5>
                        </div>
                    </div>
                </div>
                <?php
include '../backend/db.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Handle form submission
if (isset($_POST['submit'])) {

    // Check if the user is logged in
    if (isset($_SESSION['email'])) {
        // Get the logged-in user's ID from the session
        $userId = $_SESSION['user_id'];
    } else {
        // Redirect to login.php if not logged in
        echo "<script>location.href='login.php';</script>";
        exit();
    }

    // Ensure the user has the correct role
    if ($_SESSION['role_id'] != 3) {
        // Redirect to a different page if role_id is not 3
        echo "<script>location.href='login.php';</script>";
        exit();
    }

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $appoint_date = $_POST['appoint_date'];
    $appoint_time = $_POST['appoint_time'];
    $message = $_POST['message']; 
    $category = $_POST['categoryn']; 
    $doctor_id = $_POST['doctor_id'];

    // Prepare and execute SQL query
    $sql = "INSERT INTO appoints (`name`, `email`, `phone`, `age`, `appoint_date`, `appoint_time`, `message`, `category_n`, `doctor_id`, `user_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($cons, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssssssi', $name, $email, $phone, $age, $appoint_date, $appoint_time, $message, $category, $doctor_id, $userId);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Appointment successfully booked!'); window.location.href ='bookappointment.php';</script>";
    } else {
        echo "<script>alert('Failed to book appointment: " . mysqli_error($cons) . "');</script>";
    }
    
    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($cons);
}
// End output buffering and flush output
ob_end_flush();
?>

<!-- Your HTML and form code here -->
<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
    <div class="bg-light rounded h-100 d-flex align-items-center p-5">
    <form action="" method="post">
    <div class="row gy-3 gx-4">
        <div class="col-12 col-md-6">
            <input type="text" name="name" class="form-control py-3" placeholder="Name" required>
        </div>
        <div class="col-12 col-md-6">
            <input type="email" name="email" class="form-control py-3" placeholder="Email" required>
        </div>
        <div class="col-12 col-md-6">
            <input type="tel" name="phone" class="form-control py-3" placeholder="Phone" required>
        </div>
        <div class="col-12 col-md-6">
            <input type="text" name="age" class="form-control py-3" placeholder="Age" required>
        </div>
        <div class="col-12 col-md-6">
            <input type="date" name="appoint_date" class="form-control py-3" required>
        </div>
        <div class="col-12 col-md-6">
            <input type="time" name="appoint_time" class="form-control py-3" required>
        </div>
        <div class="col-12 col-md-6">
            <select name="categoryn" id="categoryn" class="form-select py-3 border-primary" aria-label="Default select example" required>
                <option value="">Select Category</option>
                <?php
                $selectQuery = "SELECT category_id, category_name FROM categories";
                $query = mysqli_query($cons, $selectQuery);
                if ($query && mysqli_num_rows($query) > 0) {
                    while ($category = mysqli_fetch_assoc($query)) {
                        echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No category available</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-12 col-md-6">
        <select name="doctor_id" class="form-select py-3 border-primary " aria-label="Default select example" required>
                            <?php
                            $selectQuery = "SELECT doctor_id, first_name, last_name FROM doctors";
                            $query = mysqli_query($cons, $selectQuery);
                            if ($query && mysqli_num_rows($query) > 0) {
                                while ($doctor = mysqli_fetch_assoc($query)) {
                                    echo "<option value='" . $doctor['doctor_id'] . "'>" . $doctor['first_name'] . " " . $doctor['last_name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No doctor available</option>";
                            }
                            ?>
                        </select>
                    </div>
        <div class="col-12">
            <textarea class="form-control border-primary bg-transparent" name="message" cols="30" rows="5" placeholder="Write Comments"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary text-white w-100 py-3 px-5">SUBMIT NOW</button>
        </div>
    </div>
</form>
        </div>
    </div>
 </div>
    </div>
      </div>
        </div>
          </div>
    <!-- Appointment End -->

    <!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Testimonial</p>
            <h1>What Say Our Patients!</h1>
        </div>

        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php
            $selectquery = "SELECT name, profile_picture FROM users WHERE role_id = 3";
            $query = mysqli_query($cons, $selectquery);

            if (!$query) {
                echo "Error: " . mysqli_error($cons);
                exit;
            }

            while ($res = mysqli_fetch_assoc($query)) {
            ?>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="../backend/uploads-images/<?php echo htmlspecialchars($res['profile_picture']); ?>" alt="Profile Picture" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>Satisfying customers involves consistently meeting or exceeding their expectations through high-quality products and excellent service. Effective communication and prompt resolution of issues further enhance customer satisfaction.</p>
                        <h5 class="mb-1"><?php echo htmlspecialchars($res['name']); ?></h5>
                        <span class="fst-italic">Profession</span>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
  <?php   
  include 'footer.php';
  ?>

<!-- <style>
    .owl-carousel-text {
    padding: 10px;
    background: rgba(0, 0, 0, 0.6); /* Add semi-transparent background for readability */
    border-radius: 10px;
}

@media (max-width: 768px) {
    .owl-carousel-text h1 {
        font-size: 1.1rem; /* Reduce font size on smaller screens */
    }
}

@media (min-width: 992px) {
    .owl-carousel-text h1 {
        font-size: 3rem; /* Larger font size for larger screens */
    }
}

</style> -->
                




