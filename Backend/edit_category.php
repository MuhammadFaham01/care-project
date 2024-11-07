<?php

include 'header.php';
include 'link.php';
include 'db.php';


$id = $_GET ['id'];


$selectQuery = " select * from categories where category_id = $id";

$showdata = mysqli_query($cons,$selectQuery);
$arraydata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {
    
    $id = $_GET ['id'];

    $name = $_POST['name'];
    $c_desc = $_POST['c_desc'];

    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $file_type = $_FILES['pimage']['type'];
    $file_size = $_FILES['pimage']['size'];

    $upload_dir = "uploads-images/";

    if (!empty($file_name)) {
        if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {

            $insertquery = "update categories SET category_id ='$id', category_name ='$name',category_desc ='$c_desc ',c_image ='$file_name' WHERE  category_id = $id";
            if (mysqli_query($cons, $insertquery)) {
                echo "<script>alert('category edit successfully!'); window.location.href ='view-category.php';</script>";
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
                            <input type="text" name="name" class="form-control" id="productName" value="<?php echo $arraydata['category_name'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="productPrice" class="form-label">description</label>
                            <input type="text" name="c_desc" class="form-control" id="productPrice" aria-describedby="priceHelp" value="<?php echo $arraydata['category_desc'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Profile Image</label>
                            <input type="file" name="pimage" class="form-control" id="productImage" value="<?php echo $arraydata['category_desc'] ?>" required>
                        </div>
                       
                        <button type="submit" name="submit" class="btn btn-primary">add category</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

