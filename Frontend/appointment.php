<?php
include '../backend/db.php';
include 'link.php';
include 'header.php';

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['email']);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if ($isLoggedIn) {
    // Get the logged-in user's ID from the session
    $userId = $_SESSION['user_id'];
    
   $stmt = $cons->prepare("SELECT * FROM users WHERE user_id = ?");
   $stmt->bind_param("i", $user_id);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows == 1) {
       $user = $result->fetch_assoc();
       
       $_SESSION['name'] = $user['name'];
       $_SESSION['email'] = $user['email'];
    
 
   }

} else {
    // Redirect to signin.php if not logged in
    echo "<script>location.href='login.php';</script>";
    exit();
} if ($user['role_id'] != 3) {
    // Redirect to a different page if role_id is not 1
    echo "<script>location.href='login.php';</script>";
    exit();
}


?>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $appoint_date = $_POST['appoint_date'];
    $appoint_time = $_POST['appoint_time'];
    $message = $_POST['message']; // Ensure this matches the form name
    $category = $_POST['categoryn']; // Ensure this matches the form name
    $doctor_id = $_POST['doctor_id'];
   
    // SQL query with corrected syntax
    $sql = "INSERT INTO appoints (`name`, `email`, `phone`, `age`,`appoint_date`, `appoint_time`, `message`,`category_n`,`doctor_id`,`user_id`) 
            VALUES ('$name', '$email', '$phone', '$age','$appoint_date','$appoint_time','$message','$category','$doctor_id','$userId')";

    if (mysqli_query($cons, $sql)) {
        echo "<script>alert('Appointment successfully booked!'); window.location.href ='bookappointment.php';</script>";
    } else {
        echo "<script>alert('Failed to book appointment: " . mysqli_error($cons) . "');</script>";
    }
    // Close the database connection
    mysqli_close($cons);
    ob_end_flush();
}
?>
   
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Appointment</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Appointment</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


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
if (isset($_GET['id'])) {
    $doctor = intval($_GET['id']); 
   
    $selectquery = "
        SELECT doctors.*, categories.category_name 
        FROM doctors 
        INNER JOIN categories ON doctors.category_id = categories.category_id
        WHERE doctors.doctor_id = $doctor";
        
    $query = mysqli_query($cons, $selectquery);
    
    if ($row = mysqli_fetch_assoc($query)) { 
?>
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="bg-light rounded h-100 d-flex align-items-center p-5">

        <form action="" method="post">
            <div class="row gy-3 gx-4">
                <div class="col-xl-6">
                    <input type="text" name="name" value="<?php echo htmlspecialchars($_SESSION['name']); ?>" class="form-control py-3" placeholder="Name" required>
                </div>
                <div class="col-xl-6">
                    <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" class="form-control py-3" placeholder="Email" required>
                </div>
                <div class="col-xl-6">
                    <input type="tel" name="phone" class="form-control py-3" placeholder="Phone" required>
                </div>
                <div class="col-xl-6">
                    <input type="text" name="age" class="form-control py-3" placeholder="Age" required>
                </div>
                <div class="col-xl-6">
                    <input type="date" name="appoint_date" class="form-control py-3" required>
                </div>
                <div class="col-xl-6">
                    <input type="time" name="appoint_time" class="form-control py-3" required>
                </div>
                <div class="col-xl-6">
                    <!-- Category dropdown, showing the doctor's category -->
                    <select name="categoryn" class="form-select py-3" aria-label="Default select example" required>
                       <?php  echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";?>
                    </select>
                </div>
                <div class="col-xl-6">
                    <!-- Doctor dropdown, showing the selected doctor's name -->
                    <select name="doctor_id" class="form-select py-3 bg-white" aria-label="Default select example" required>
                   <?php echo "<option value='" . $row['doctor_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";?>

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
<?php
    }
}
?>

            </div>
        </div>
    </div>
    <!-- Appointment End -->
        

    <?php 
    include 'footer.php';
    ?>