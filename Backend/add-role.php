
<?php

include 'header.php';
include 'link.php';
include 'db.php';
?>

<body>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add role</h6>
                            <form action="" method="post">
                                
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Role name</label>
                                    <input type="text" name="rname" class="form-control" >
                                </div>                    
                                <div class="mb-3 form-check">
                                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                                    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Add role</button>
                            </form>
                        </div>
                    </div>
                    </div>
                  

        <!-- Back to Top -->
        
    </div>

    <!-- JavaScript Libraries -->
 <?php
include 'footer.php';
 ?>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>


<?php




if(isset($_POST['submit'])){

    $rname = $_POST['rname'];
    
   

    $insertquery = "insert into  roles(role_type) values(' $rname')"; 

  $res =  mysqli_query($cons, $insertquery );

  if($res){

 echo"

 <script>alert('add role susscfull');window.location.href ='view-role.php';</script>";


  }else{
     ?>

 <script>alert("role not insert ");</script>
 <?php
  }

 }

?>


 
























