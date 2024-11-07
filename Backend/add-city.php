<?php


include 'header.php';
include 'link.php';
include 'db.php';

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form data
   
    $city = mysqli_real_escape_string($cons, $_POST['city']);
   

    // Prepare the SQL query
    $insertquery = "INSERT INTO cities (city_name) VALUES ('$city')";

    // Execute the query
    $query = mysqli_query($cons, $insertquery);

    // Check if the query was successful
    if ($query) {
        echo "<script>
        alert('Added city successfully');window.location.href = 'view-city.php';</script>";
        } else {
        echo "<script>alert('Failed to add city');</script>";
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
                    <h4 class="mb-4">Add this City</h4>
                    <form action="" method="post" enctype="multipart/form-data">
                       
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">city name</label>
                            <input type="text" name="city" class="form-control" id="productPrice" aria-describedby="priceHelp" required>
                        </div>
                     
                        <button type="submit" name="submit" class="btn btn-primary">Add city</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
  
    <?php include 'footer.php'; ?>

 
</body>
</html>