<?php


include 'header.php';
include 'link.php';
include 'db.php';

?>
   
   <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
        <!-- <h4 class="mb-4">View user</h4> -->
        <!-- Search Form -->
        <form method="GET" action="">
    <div class="row align-items-center">
        <div class="col-12 col-md-7 mb-3 mb-md-0">
            <h4 class="mb-4 mb-md-0">View contact</h4>
        </div>
        <div class="col-8 col-md-4 mb-3 ">
            <input type="text" id="search" name="search" class="form-control" placeholder="Enter user email">
        </div>
        <div class="col-4 col-md-1 mb-3">
            <button type="submit" class="btn btn-primary w-100">Sarch</button>
        </div>
    </div>
</form>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">subject</th>
                        <th scope="col">message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Default query
                    $selectquery = "SELECT * FROM contact";

                    // Check if there's a search query
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = mysqli_real_escape_string($cons, $_GET['search']);
                        $selectquery .= " WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
                    }
                    $query = mysqli_query($cons, $selectquery);
                    $nums = mysqli_num_rows($query);
                    while ($res = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $res['contact_id']; ?></td>
                        <td><?php echo $res['name']; ?></td>
                        <td><?php echo $res['email']; ?></td>
                        <td><?php echo $res['subject']; ?></td>
                        <td><?php echo $res['message']; ?></td>
                        <td><a href="delete-contact.php?id=<?php echo $res['contact_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>
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
