<?php
include 'link.php';
include 'header.php';
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $c_desc = $_POST['c_desc'];

    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $file_type = $_FILES['pimage']['type'];
    $file_size = $_FILES['pimage']['size'];

    $upload_dir = "uploads-images/";

    if (!empty($file_name)) {
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
            $sql = "INSERT INTO `categories` (`category_name`, `category_desc`, `c_image`) 
                    VALUES ('$name', '$c_desc', '$file_name')";

            if (mysqli_query($cons, $sql)) {
                echo "<script>alert('category add successfully!'); window.location.href ='view-category.php';</script>";
            } else {
                echo "<script>alert(' not added');</script>";
            }
            mysqli_close($cons);
        }
    }
}
?>
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Add category</h6>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="productName" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">description</label>
                            <input type="text" name="c_desc" class="form-control" id="productPrice" aria-describedby="priceHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Profile Image</label>
                            <input type="file" name="pimage" class="form-control" id="productImage" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">add category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    include 'footer.php';
    
    ?>

