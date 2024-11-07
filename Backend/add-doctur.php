<?php
include 'db.php';
include 'link.php';
include 'header.php';

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
    $experience = $_POST['exprience'];
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
            // Insert the data into the database with profile picture
            $sql = "INSERT INTO doctors (first_name, last_name, email, phone_number, address, date_of_birth, hire_date, availability_tstart, availability_tend, availability_week, exprience, education, details, profile_picture, category_id, city_id,user_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

            if ($stmt = $cons->prepare($sql)) {
                $stmt->bind_param("ssssssssssssssssi", $first_name, $last_name, $email, $phone_number, $address, $date_of_birth, $hire_date, $availability_time_start, $availability_time_end, $availability_week, $experience, $education, $details, $file_name, $category_id, $city_id,$user_id);

                if ($stmt->execute()) {
                    echo "<script>alert('Doctor added successfully!'); window.location.href ='view-doctor.php';</script>";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error: " . $cons->error;
            }

            $cons->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Handle case where no file is uploaded
        $sql = "INSERT INTO doctors (first_name, last_name, email, phone_number, address, date_of_birth, hire_date, availability_tstart, availability_tend, availability_week, exprience, education, details, category_id, city_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $cons->prepare($sql)) {
            $stmt->bind_param("ssssssssssssssi", $first_name, $last_name, $email, $phone_number, $address, $date_of_birth, $hire_date, $availability_time_start, $availability_time_end, $availability_week, $experience, $education, $details, $category_id, $city_id);

            if ($stmt->execute()) {
                echo "<script>alert('Doctor added successfully!'); window.location.href ='view-doctor.php';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $cons->error;
        }

        $cons->close();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include any required meta tags and links here -->
    <title>Add New Doctor</title>
</head>
<body>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light align-center rounded h-100 p-4">
                    <h2 class="text-center py-4">Add New Doctor</h2>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                            <div class="mb-3">
                            <label for="role" class="form-label">Select spesaliz</label>
                            <select name="category_id" class="form-control" id="category_id" required>
                            <?php
                            $selectQuery = "SELECT category_id, category_name FROM categories";
                            $query = mysqli_query($cons, $selectQuery);

                            
                            if ($query && mysqli_num_rows($query) > 0) {
                                while ($category = mysqli_fetch_assoc($query)) {
                                    echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
                                }
                            } else {
                                echo "<option value=''>No category available</option>";
                            }
                            ?>
                        </select>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Phone Number:</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address:</label>
                                    <textarea id="address" name="address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth:</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="hire_date" class="form-label">Hire Date:</label>
                                    <input type="date" id="hire_date" name="hire_date" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="availability_time_start" class="form-label">Availability Start Time:</label>
                            <input type="time" id="availability_time_start" name="availability_time_start" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="availability_time_end" class="form-label">Availability End Time:</label>
                            <input type="time" id="availability_time_end" name="availability_time_end" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                        <label for="availability_time_end" class="form-label">Availability week:</label>
                        <input type="text" name="availability_week" class="form-control">
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exprience" class="form-label">Exprience</label>
                            <input type="text" id="exprience" name="exprience" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                        <label for="Education" class="form-label">Education</label>
                        <input type="text" name="education" class="form-control">
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="Details" class="form-label">Details</label>
                            <textarea id="detaile" name="details" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="profile_picture" class="form-label">Profile Picture:</label>
                                    <input type="file" id="profile_picture" name="pimage" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="mb-3">
                            <label for="role" class="form-label">Select city</label>
                            <select name="city_id" class="form-control" id="city_id" required>
                                    <?php
                                    $selectQuery = "SELECT city_id, city_name FROM cities";
                                    $query = mysqli_query($cons, $selectQuery);

                                    if ($query && mysqli_num_rows($query) > 0) {
                                        while ($city = mysqli_fetch_assoc($query)) {
                                            echo "<option value='" . $city['city_id'] . "'>" . $city['city_name'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No city available</option>";
                                    }
                                    ?>
                                </select>
                        </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="user" class="form-label">user id</label>
                                    <input type="text" id="user_id" name="user_id" class="form-control">
                                </div>
                            </div>
                            </div>
                        <button type="submit" name="submit" class="btn btn-primary">Add Doctor</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include 'footer.php';

?>

