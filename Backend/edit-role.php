delete<?php


include 'header.php';
include 'link.php';
include 'db.php';

$ids = $_GET['id'];
$selectquery ="select * from roles where role_id = $ids";

$showdata = mysqli_query($cons,$selectquery);
$arrdata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {

    $id = $_GET['id'];

    // Retrieve and sanitize form data
    $roletype = mysqli_real_escape_string($cons, $_POST['rname']);
   

    // Prepare the SQL query
    $insertquery = "update roles SET role_id ='$id', role_type ='$roletype' WHERE  role_id = $id";

    // Execute the query
    $query = mysqli_query($cons, $insertquery);

    // Check if the query was successful
    if ($query) {
        echo "<script>
        alert('Edit role successfully');window.location.href = 'view-role.php';</script>";
        } else {
        echo "<script>alert('Failed to Edit role');</script>";
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
                    <h4 class="mb-4">Add this role</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Role_type</label>
                            <input type="text" name="rname" class="form-control" id="productName" value="<?php echo  $arrdata  ['role_type'] ?>" required>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">edit role</button>
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