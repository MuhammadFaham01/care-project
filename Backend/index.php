<?php

include 'db.php';
include 'header.php';
include 'link.php'; 
$sql = "SELECT COUNT(*) AS categories_count FROM categories";
$result = mysqli_query($cons, $sql);
$row = mysqli_fetch_assoc($result);
$categories_count = $row['categories_count'];
// SQL query to count total appointments
$sql = "SELECT COUNT(*) AS appoints_count FROM appoints";
$result = mysqli_query($cons, $sql);
$row = mysqli_fetch_assoc($result);
$appoints_count = $row['appoints_count'];
$sql = "SELECT role_id, COUNT(*) AS count FROM users WHERE role_id IN (1, 2, 3) GROUP BY role_id";
$result = mysqli_query($cons, $sql);

$role_counts = array();

// Fetch the results and store them in the array
while ($row = mysqli_fetch_assoc($result)) {
    $role_counts[$row['role_id']] = $row['count'];
}
?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                          
                    <div class="d-flex align-items-center">
                    <i class="fa-solid fa-user-tie me-2"></i> <!-- Add margin-right to space out the icon -->
                    <div class="ms-3">
                        <span class="mb-1"> <?php echo isset($role_counts[1]) ? $role_counts[1] : 0; ?></span>
                        <p class="mb-2 text-left">Total Admin</p>
                        <!-- <h6 class="mb-0">$1234</h6> -->
                    </div>
                </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                           
                        <div class="d-flex align-items-center">
                        <i class="fa-solid fa-user-doctor"></i><!-- Add margin-right to space out the icon -->
                    <div class="ms-3">
                        <span><?php echo isset($role_counts[2]) ? $role_counts[2] : 0; ?></span>
                        <p class="mb-2">Total Doctors</p>
                        <!-- <h6 class="mb-0">$1234</h6> -->
                    </div>
                </div>
                            
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                           
                        <div class="d-flex align-items-center">
                        <i class="fa-sharp-duotone fa-solid fa-bed"></i><!-- Add margin-right to space out the icon -->
                    <div class="ms-3">
                        <span><?php echo isset($role_counts[3]) ? $role_counts[3] : 0; ?></span>
                        <p class="mb-2">Total patient</p>
                        <!-- <h6 class="mb-0">$1234</h6> -->
                    </div>
                </div>
                        </div>
                    </div>
                   
                </div>
            </div>


            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            
                        <div class="d-flex align-items-center">
                        <i class="fa-solid fa-flag"></i><!-- Add margin-right to space out the icon -->
                    <div class="ms-3">
                        <span><?php echo $categories_count; ?></span>
                        <p class="mb-2">Total categories</p>
                        <!-- <h6 class="mb-0">$1234</h6> -->
                    </div>
                        </div>
                        </div>
                    </div>  
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <div class="d-flex align-items-center">
                        <i class="fa-solid fa-bell"></i><!-- Add margin-right to space out the icon -->
                    <div class="ms-3">
                        <span><?php echo $appoints_count; ?></span>
                        <p class="mb-2">Total Appoientment</p>
                        <!-- <h6 class="mb-0">$1234</h6> -->
                    </div>
                </div> 
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                          
                        <div class="d-flex align-items-center">
                        <i class="fa-sharp fa-solid fa-money-check-dollar"></i><!-- Add margin-right to space out the icon -->
                    <div class="ms-3">
                        <span>0</span>
                        <p class="mb-2">Total income</p>
                        <!-- <h6 class="mb-0">$1234</h6> -->
                    </div>
                </div>                          
                </div>
            </div>
        </div>
    </div>
      <!-- Back to Top -->
      <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
            <!-- Sale & Revenue End -->        
    <?php
    include 'footer.php';    
    ?>
      


   
