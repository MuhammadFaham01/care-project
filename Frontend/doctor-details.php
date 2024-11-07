<?php
include '../backend/db.php';
include 'link.php';
include 'header.php';

?>
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
<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="text-center">
<h1 class="d-inline-block border rounded-pill py-1 px-4 text-center">Doctor Details</h1>
</div>
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="../backend/uploads-images/<?php echo $row['profile_picture']; ?>" alt="Doctor Image" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-title position-relative pt-1">
                    <h1 class="fw-bold text-primary text-uppercase"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h1>
                </div>
                <div class="d-flex flex-column mb-4 wow fadeIn" data-wow-delay="0.6s">
    
    <div class="mb-3">
        <strong class="text-dark pt-1">Specialization:</strong> <?php echo $row['category_name']; ?>
    </div>

  
    <div class="mb-3">
        <strong class="text-dark pt-1">Education:</strong> <?php echo $row['education']; ?>
    </div>
   
    <div class="mb-">
        <strong class="text-dark pt-1">Experience:</strong> <?php echo $row['exprience']; ?>
    </div>
</div>
                <p class="mb-4"><?php echo $row['details']; ?></p>
                <div class="row g-0 mb-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Avalibal time</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php echo $row['availability_tstart'] . '' . $row['availability_tend']?></h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Avalibal week</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php echo $row['availability_week']?></h5>
                    </div>
                </div>
                <a href="appointment.php?id=<?php echo $row['doctor_id']?>" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Book Appointment</a>
            </div>
        </div>
    </div>
</div>

<div class="container wow fadeInUp" data-wow-delay="0.1s">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-lg-5">
            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded wow zoomIn" data-wow-delay="0.9s" style="width: 60px; height: 60px;">
                        <i class="far fa-hospital text-white "></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2 text-primary"><?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                            <strong class="text-dark pt-1">Care Hospital :</strong> 123 Street, New York, USA
                        </div>
                    </div>
            </div>
            <div class="col-lg-5">
            <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded wow zoomIn" data-wow-delay="0.9s"" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2">Call to ask any question</h5>
                            <h4 class="text-primary mb-0">+012 345 6789</h4>
                        </div>
                    </div>
            </div>
    </div>
</div>

<!-- About End -->
<?php
    } else {
        echo "Doctor not found.";
    }
    } else {
     echo "Invalid Doctor ID.";
}
?>
<?php
include 'footer.php' 

?>