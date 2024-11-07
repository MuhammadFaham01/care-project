<?php

include 'header.php';
include 'link.php';
include 'db.php';
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">

            
              
                <form method="GET" action="">
                    <div class="row align-items-center">
<div class="col-12 col-md-7 mb-3 mb-md-0">
<h4 class="mb-4 mb-md-0">View City</h4>

</div>
                        <div class="col-8 col-md-4 mb-3 ">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Enter city name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        </div>
                        <div class="col-4 col-md-1 mb-3">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">City Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Get the search input if available
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // Modify the query to include the search filter
                        $selectquery = "SELECT * FROM cities WHERE city_name LIKE '%$search%'";
                        $query = mysqli_query($cons, $selectquery);
                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $res['city_id']; ?></td>
                                <td><?php echo $res['city_name']; ?></td>
                                <td>
                                    <a href="edit-city.php?id=<?php echo $res['city_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Update">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="delete-city.php?id=<?php echo $res['city_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
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
