<?php
include 'header2.php';
include 'link.php';
include 'db.php';

?>
<div class="container mt-4">
    <div class="bg-light rounded p-4">

    <form method="GET" action="">
    <div class="row align-items-center">
        <div class="col-12 col-md-7 mb-3 mb-md-0">
            <h4 class="mb-4 mb-md-0">View Appointment</h4>
        </div>
        <div class="col-8 col-md-4 mb-3">
            <input type="text" id="search" name="search" class="form-control" placeholder="Enter user Email">
        </div>
        <div class="col-4 col-md-1 mb-3">
            <button type="submit" class="btn btn-primary w-100">Sarch</button>
        </div>
    </div>
    </form>

        <?php
        // Check if the user is logged in
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id']; // Get the user_id from session

            // Fetch doctor_id from the doctors table where user_id matches
            $stmt = $cons->prepare("SELECT * FROM doctors WHERE user_id = ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $doctor = $result->fetch_assoc();
                $doctor_id = $doctor['doctor_id'];

                
                $countQuery = "SELECT COUNT(*) as total_appointments FROM appoints WHERE doctor_id = ?";
                $stmt = $cons->prepare($countQuery);
                $stmt->bind_param("i", $doctor_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $countRow = $result->fetch_assoc();
                $totalAppointments = $countRow['total_appointments'];

                echo "<p>Total Appointments: $totalAppointments</p>";

                // Query to select appointments for the specific doctor
                $selectquery = "
                SELECT 
                    appoints.dappoints_id, 
                    appoints.name, 
                    appoints.email, 
                    appoints.phone, 
                    appoints.age, 
                    appoints.appoint_date, 
                    appoints.appoint_time, 
                    appoints.message, 
                    appoints.status, 
                    categories.category_name,
                    CONCAT(doctors.first_name, ' ', doctors.last_name) AS doctor_name
                FROM 
                    appoints
                INNER JOIN 
                    doctors ON appoints.doctor_id = doctors.doctor_id
                INNER JOIN 
                    categories ON appoints.category_n = categories.category_id
                WHERE 
                    appoints.doctor_id = ?";

                // Check if search term is present
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $search = mysqli_real_escape_string($cons, $_GET['search']);
                    // Append search conditions to the query
                    $selectquery .= " AND (appoints.name LIKE '%$search%' OR appoints.email LIKE '%$search%')";
                }

                // Prepare the query
                $stmt = mysqli_prepare($cons, $selectquery);
                if ($stmt === false) {
                    // Print error message
                    die('Error in SQL: ' . mysqli_error($cons));
                }

                // Bind the parameter and execute the query
                mysqli_stmt_bind_param($stmt, 'i', $doctor_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // Fetch and display appointments
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Appointment ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Age</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Message</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['dappoints_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['age']); ?></td>
                                <td><?php echo htmlspecialchars($row['appoint_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['appoint_time']); ?></td>
                                <td><?php echo htmlspecialchars($row['message']); ?></td>
                                <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['doctor_name']); ?></td>
                                <td><button class="btn btn-light"><?php echo htmlspecialchars($row['status']);?></button></td>
                                <td><a href="status.php?id=<?php echo $row['dappoints_id']; ?>" class="btn btn-sm btn-warning">Status</a></td>
                                <td><a href="delete.appoientment2.php?id=<?php echo $row['dappoints_id']; ?>" class="btn btn-sm btn-danger">Cancel</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                // Redirect to login if the user is not logged in
                header("Location: doctor-login.php");
                exit;
            }
        } else {
            header("Location: doctor-login.php");
            exit;
        }
        ?>

    </div>
</div>

<?php   
include 'footer.php';
?>
