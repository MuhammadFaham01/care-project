<?php
include 'link.php';
include 'header.php';
include '../backend/db.php';
?>
<div class="container mt-4">
    <div class="bg-light rounded p-4">
        <h4 class="mb-4">View Appointment</h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
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
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (isset($_SESSION['email']) && isset($_SESSION['user_id'])) {
    
    if ($isLoggedIn) {
        // Get the logged-in user's ID from the session
        $userId = $_SESSION['user_id'];
    
    } else {
        // Redirect to signin.php if not logged in
        echo "<script>location.href='login.php';</script>";
        exit();}

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
            users ON appoints.user_id = users.user_id
        INNER JOIN 
            categories ON appoints.category_n = categories.category_id
        INNER JOIN
            doctors ON appoints.doctor_id = doctors.doctor_id
        WHERE 
            appoints.user_id = ?";

    $stmt = mysqli_prepare($cons, $selectquery);
    mysqli_stmt_bind_param($stmt, 'i', $userId); // Bind the user ID from the session
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Fetch and display appointments
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
            <td><button class="btn btn-light"><?php echo htmlspecialchars($row['status']); ?></button></td>
            <td><a href="?id=<?php echo $row['dappoints_id']; ?>" class="btn btn-sm btn-danger py-2 px-4">Cancel</a></td>
        </tr>
        <?php
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($cons);

} else {
    // Redirect to login if the user is not logged in
    header("Location:doctor-login.php");
    exit;
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
