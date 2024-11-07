<?php


include 'header2.php';
include 'link.php';
include 'db.php';

$ids = $_GET['id'];
$selectquery ="select status from appoints where dappoints_id = $ids";

$showdata = mysqli_query($cons,$selectquery);
$arrdata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {

    $id = $_GET['id'];

    // Retrieve and sanitize form data
   
    $status = mysqli_real_escape_string($cons, $_POST['status']);


    // Prepare the SQL query
    $insertquery = "update appoints SET dappoints_id ='$id', status='$status' WHERE  dappoints_id = $id";

    // Execute the query
    $query = mysqli_query($cons, $insertquery);

    // Check if the query was successful
    if ($query) {
        echo "<script>
        alert('status successfully');window.location.href = 'appoientment2.php';</script>";
        } else {
        echo "<script>alert('Failed to status');</script>";
    }
}

// Close connection
mysqli_close($cons);


?>

<body>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h4 class="mb-4">Add Status</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">status </label>
                            <input type="text" name="status" class="form-control" id="productPrice" aria-describedby="priceHelp" value="<?php echo  $arrdata['status'] ?>" required>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Add status</button>
                   </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->

    <!-- JavaScript Libraries -->
    <?php include 'footer.php'; ?>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>