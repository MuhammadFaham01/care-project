<?php  

include 'link.php';
include 'header.php';
?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

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
// Handle form submission
if (isset($_POST['submit'])) {

    $isLoggedIn = isset($_SESSION['email']);
    if ($isLoggedIn) {
        // Get the logged-in user's ID from the session
        $userId = $_SESSION['user_id'];
    
    } else {
        // Redirect to signin.php if not logged in
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
    $sql = "INSERT INTO appoints (`name`, `email`, `phone`, `age`, `appoint_date`, `appoint_time`, `message`, `category_n`, `doctor_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($cons, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssi', $name, $email, $phone, $age, $appoint_date, $appoint_time, $message, $category, $doctor_id);
    
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
                        <select name="categoryn" class="form-select py-3 border-primary " aria-label="Default select example" required>
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
    <?php
    include 'footer.php';
    ?>