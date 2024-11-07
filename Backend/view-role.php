<?php


include 'header.php';
include 'link.php';
include 'db.php';


?>
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                            <h4 class="mb-4"> View role</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">role_id</th>
                                            <th scope="col">role_ type</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>



                                    <?php
                        $selectquery = "select * from roles";

                        $query = mysqli_query($cons,$selectquery) ;
                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)){

                        ?>
                        <tr>
                            <td><?php echo $res ['role_id']; ?></td>
                            
                            <td><?php echo $res ['role_type']; ?></td>
                           
                            <td><a href="edit-role.php?id=<?php echo $res ['role_id']; ?>" data-toggle="tooltip" data-placemet="bottom" title="update">
                            <i class="fa fa-edit " aria-hidden="true"></i></a></td>  

                            <td><a href="delete-role.php?id=<?php echo $res ['role_id']; ?>" data-toggle="tooltip" data-placemet="bottom" title="Delete">
                            <i class="fa fa-trash " aria-hidden="true"></i> </a></td>              
                                            
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
