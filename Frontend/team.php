<?php 
include 'link.php';
include 'header.php';
?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Doctors</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Doctors</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Team Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
            <h1>Our Experienced Doctors</h1>
        </div>
        <div class="row g-4">
        <?php
        if (isset($_GET['id'])) {
            $category = $_GET['id'];
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
                        <img class="img-fluid" src="../backend/uploads-images/<?php echo $row['profile_picture']; ?>" alt="Doctor Image">
                    </div>
                    <div class="team-text bg-light text-center p-4">
                        <h5>Dr. <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></h5>
                        <p class="text-primary"><?php echo $row['category_name']; ?></p>
                        <p class="text-primary">Book Appoientment</p>
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
<?php 
include 'footer.php';
?>