<?php

include 'header2.php';
include 'link.php';

?>
   <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="h-100 bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                        <i class="fa-solid fa-bell text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Total</p>
                            <h5 class="mb-0"><?php // Query to count the total number of appointments for this doctor
                $countQuery = "SELECT COUNT(*) as total_appointments FROM appoints WHERE doctor_id = ?";
                $stmt = $cons->prepare($countQuery);
                $stmt->bind_param("i", $doctor_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $countRow = $result->fetch_assoc();
                $totalAppointments = $countRow['total_appointments']; // Get the total count

                // Display the total number of appointments
                echo "<h5> Appointments: $totalAppointments</h5>"; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="h-100 bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-phone-alt text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Call Us Now</p>
                            <h5 class="mb-0">+<?php echo htmlspecialchars($phone_number); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="h-100 bg-light rounded d-flex align-items-center p-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-white" style="width: 55px; height: 55px;">
                            <i class="fa fa-envelope-open text-primary"></i>
                        </div>
                        <div class="ms-4">
                            <p class="mb-2">Mail Us Now</p>
                            <h5 class="mb-0"><?php echo htmlspecialchars($_SESSION['email']); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    