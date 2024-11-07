<?php
include 'db.php';
include 'link.php';
include 'header.php';

$id = $_GET['id'];
$selectQuery = "SELECT * FROM doctors WHERE doctor_id = $id";
$showdata = mysqli_query($cons, $selectQuery);
$arraydata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $hire_date = $_POST['hire_date'];
    $availability_time_start = $_POST['availability_time_start'];
    $availability_time_end = $_POST['availability_time_end'];
    $availability_week = $_POST['availability_week'];
    $experience = $_POST['experience'];
    $education = $_POST['education'];
    $details = $_POST['details'];
    $category_id = $_POST['category_id'];
    $city_id = $_POST['city_id'];
    $user_id = $_POST['user_id'];

    // Handle profile picture upload
    $file_name = $_FILES['pimage']['name'];
    $file_tmp = $_FILES['pimage']['tmp_name'];
    $upload_dir = "uploads-images/";

    if (!empty($file_name)) {
        $file_path = $upload_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $file_path)) {
    $updateQuery = "
        UPDATE doctors SET 
        first_name = '$first_name',
        last_name = '$last_name',
        email = '$email',
        phone_number = '$phone_number',
        address = '$address',
        date_of_birth = '$date_of_birth',
        hire_date = '$hire_date',
        availability_tstart = '$availability_time_start',
        availability_tend = '$availability_time_end',
        availability_week = '$availability_week',
        exprience = '$experience',
        education = '$education',
        details = '$details',
        profile_picture = '$file_name',
        category_id = '$category_id',
        city_id = '$city_id',
        user_id = '$user_id'
        WHERE doctor_id = $id";

    if (mysqli_query($cons, $updateQuery)) {
        echo "<script>alert('Doctor updated successfully!'); window.location.href ='view-doctor.php';</script>";
    } else {
        echo "<script>alert('Update failed');</script>";
    }

    mysqli_close($cons);
}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include any required meta tags and links here -->
    <title>Edit Doctor</title>
</head>
<body>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light align-center rounded h-100 p-4">
                    <h2 class="text-center py-4">Edit Doctor</h2>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $arraydata['first_name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $arraydata['last_name']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Specialization:</label>
                                    <select name="category_id" class="form-control" id="category_id" required>
                                        <?php
                                        $selectQuery = "SELECT category_id, category_name FROM categories";
                                        $query = mysqli_query($cons, $selectQuery);
                                        while ($category = mysqli_fetch_assoc($query)) {
                                            $selected = $category['category_id'] == $arraydata['category_id'] ? 'selected' : '';
                                            echo "<option value='" . $category['category_id'] . "' $selected>" . $category['category_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $arraydata['email']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number:</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control" value="<?php echo $arraydata['phone_number']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <textarea id="address" name="address" class="form-control"><?php echo $arraydata['address']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth:</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="<?php echo $arraydata['date_of_birth']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="hire_date" class="form-label">Hire Date:</label>
                                    <input type="date" id="hire_date" name="hire_date" class="form-control" value="<?php echo $arraydata['hire_date']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="availability_time_start" class="form-label">Availability Start Time:</label>
                                    <input type="time" id="availability_time_start" name="availability_time_start" class="form-control" value="<?php echo $arraydata['availability_tstart']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="availability_time_end" class="form-label">Availability End Time:</label>
                                    <input type="time" id="availability_time_end" name="availability_time_end" class="form-control" value="<?php echo $arraydata['availability_tend']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="availability_week" class="form-label">Availability Week:</label>
                                    <input type="text" name="availability_week" class="form-control" value="<?php echo $arraydata['availability_week']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="experience" class="form-label">Experience:</label>
                                    <input type="text" id="experience" name="experience" class="form-control" value="<?php echo $arraydata['exprience']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="education" class="form-label">Education:</label>
                                    <input type="text" name="education" class="form-control" value="<?php echo $arraydata['education']; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="details" class="form-label">Details:</label>
                                    <textarea name="details" class="form-control"><?php echo $arraydata['details']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pimage" class="form-label">Profile Picture:</label>
                                    <input type="file" id="pimage" name="pimage" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">City:</label>
                                    <select name="city_id" class="form-control" id="city_id" required>
                                        <?php
                                        $selectCity = "SELECT city_id, city_name FROM cities";
                                        $queryCity = mysqli_query($cons, $selectCity);
                                        while ($city = mysqli_fetch_assoc($queryCity)) {
                                            $selectedCity = $city['city_id'] == $arraydata['city_id'] ? 'selected' : '';
                                            echo "<option value='" . $city['city_id'] . "' $selectedCity>" . $city['city_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                            <div class="mb-3">
                            <label for="user" class="form-label">user id</label>
                            <input type="text" name="user_id" class="form-control" value="<?php echo $arraydata['user_id']; ?>">

                        </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Update Doctor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
