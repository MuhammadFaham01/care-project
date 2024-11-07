<?php

include 'header.php';
include 'link.php';
include 'db.php';

// Initialize variables
$search_query = '';
$search_results = [];

// Check if the search form is submitted
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = mysqli_real_escape_string($cons, $_GET['search']);
    
    // SQL query to search for doctors
    $selectquery = "SELECT * FROM doctors WHERE first_name LIKE '%$search_query%' OR last_name LIKE '%$search_query%'";
    $search_results = mysqli_query($cons, $selectquery);
} else {
    // If no search query, select all doctors
    $selectquery = "SELECT * FROM doctors";
    $search_results = mysqli_query($cons, $selectquery);
}
?>
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
            <!-- <h4 class="mb-4">View Doctor</h4> -->
            <!-- Search Form -->

        
            <form action="" method="GET">
                <div class="row align-items-center">
                <div class="col-12 col-md-7 mb-3 mb-md-0">
                    <h4 class="mb-4 mb-md-0">View doctor</h4>
                    </div>
                    <div class="col-8 col-md-4 mb-3">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Enter doctor name" value="<?php echo htmlspecialchars($search_query); ?>">
                    </div>
                    <div class="col-4 col-md-1 mb-3">
                        <button type="submit" class="btn btn-primary w-100">Sarch</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">F Name</th>
                            <th scope="col">L Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date Birth</th>
                            <th scope="col">Hire Date</th>
                            <th scope="col">Availability Start</th>
                            <th scope="col">Availability End</th>
                            <th scope="col">Availability Week</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Education</th>
                            <th scope="col">Details</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Category ID</th>
                            <th scope="col">City ID</th>
                            <th scope="col">user ID</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($search_results && mysqli_num_rows($search_results) > 0) {
                            while ($res = mysqli_fetch_array($search_results)) {
                        ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($res['doctor_id']); ?></td>
                                    <td><?php echo htmlspecialchars($res['first_name']); ?></td>
                                    <td><?php echo htmlspecialchars($res['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($res['email']); ?></td>
                                    <td><?php echo htmlspecialchars($res['phone_number']); ?></td>
                                    <td><?php echo htmlspecialchars($res['address']); ?></td>
                                    <td><?php echo htmlspecialchars($res['date_of_birth']); ?></td>
                                    <td><?php echo htmlspecialchars($res['hire_date']); ?></td>
                                    <td><?php echo htmlspecialchars($res['availability_tstart']); ?></td>
                                    <td><?php echo htmlspecialchars($res['availability_tend']); ?></td>
                                    <td><?php echo htmlspecialchars($res['availability_week']); ?></td>
                                    <td><?php echo htmlspecialchars($res['exprience']); ?></td>
                                    <td><?php echo htmlspecialchars($res['education']); ?></td>
                                    <td><?php echo htmlspecialchars($res['details']); ?></td>
                                    <td><img class="rounded-circle" src="uploads-images/<?php echo htmlspecialchars($res['profile_picture']); ?>" alt="" style="width: 60px; height: 60px;"></td>
                                    <td><?php echo htmlspecialchars($res['category_id']); ?></td>
                                    <td><?php echo htmlspecialchars($res['city_id']); ?></td>
                                    <td><?php echo htmlspecialchars($res['user_id']); ?></td>
                                    <td>
                                        <a href="edit-doctor.php?id=<?php echo $res['doctor_id']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Update">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="delete-doctor.php?ids=<?php echo $res['doctor_id']; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='18'>No results found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
                
                    <?php
                    include 'footer.php';

                    ?>
