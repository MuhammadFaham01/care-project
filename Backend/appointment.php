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
            <h4 class="mb-4 mb-md-0">View Appoientment</h4>
        </div>
        <div class="col-8 col-md-4 mb-3 ">
            <input type="text" id="search" name="search" class="form-control" placeholder="Enter user Email">
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
                                            <th scope="col">appointment_id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">email</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">age</th>
                                            <th scope="col">date</th>
                                            <th scope="col">time</th>
                                            <th scope="col">message</th>
                                            <th scope="col">category name</th>
                                            <th scope="col">doctor name</th>
                                            <th scope="col">status</th>

                                            <th scope="col">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>                       
                                    <?php

                        $selectquery = "select * from appoints";


                    // Check if there's a search query
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $search = mysqli_real_escape_string($cons, $_GET['search']);
                        $selectquery .= " WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
                    }

                        $query = mysqli_query($cons,$selectquery) ;
                        $nums = mysqli_num_rows($query);
                        while ($res = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $res ['dappoints_id']; ?></td>
                            <td><?php echo $res ['name']; ?></td>
                            <td><?php echo $res ['email']; ?></td>
                            <td><?php echo $res ['phone']; ?></td>
                            <td><?php echo $res ['age']; ?></td>
                            <td><?php echo $res ['appoint_date']; ?></td>
                            <td><?php echo $res ['appoint_time']; ?></td>
                            <td><?php echo $res ['message']; ?></td>
                            <td><?php echo $res ['category_n']; ?></td>
                            <td><?php echo $res ['doctor_id']; ?></td>
                            <td><button class="btn btn-light"><?php echo $res['status']; ?></button></td>      
                            <td><a href="delete-appointment.php?id=<?php echo $res ['dappoints_id']; ?>" class="btn btn-danger">cancel
                             </a></td>              
                                            
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