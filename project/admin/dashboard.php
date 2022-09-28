<?php
include ("include/sidebar.php");
include("../main_conn.php");
?>

<head>
    <link rel="stylesheet" href="bootstrap/css/sb-admin-2.css">
</head>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">

        <!-- Total Student Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Students</div>


                            <?php

                                        $query="SELECT id FROM student_info ORDER BY id ";
                                        $run_query =mysqli_query($conn,$query);
                                        if(!$run_query){
                                            echo '<script> alert("not working query")</script>';
                                        }
                                        $student_row = mysqli_num_rows($run_query);
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $student_row;?></div>
                        </div>
                        <div class="col-auto">
                            <a href="student_info/student_registration.php">
                                <i class="bi bi-people fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Teacher Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Teachers</div>

                            <?php

                                        $query="SELECT id FROM teacher_info ORDER BY id ";
                                        $run_query =mysqli_query($conn,$query);
                                        if(!$run_query){
                                            echo '<script> alert("not working query")</script>';
                                        }
                                        $teacher_row = mysqli_num_rows($run_query);
                                ?>

                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $teacher_row;?></div>
                        </div>
                        <div class="col-auto">
                            <a href="teacher_info/teacher_registration.php">
                                <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admins
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">

                                    <?php

                                        $query="SELECT id FROM admin_info ORDER BY id ";
                                        $run_query =mysqli_query($conn,$query);
                                        if(!$run_query){
                                            echo '<script> alert("not working query")</script>';
                                        }
                                        $admin_row = mysqli_num_rows($run_query);
                                ?>

                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $admin_row;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="admin_info/admin_registration.php">
                                <i class="bi bi-person-lines-fill fa-2x text-gray-300"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- total paper Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Pepars</div>

                            <?php

                                        $query="SELECT id FROM pepar_data ORDER BY id ";
                                        $run_query =mysqli_query($conn,$query);
                                        if(!$run_query){
                                            echo '<script> alert("not working query")</script>';
                                        }
                                        $pepar_row = mysqli_num_rows($run_query);
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pepar_row;?></div>
                        </div>

                        <div class="col-auto">
                            <a href="pepars.php">
                                <i class="bi bi-clipboard2-fill fa-2x text-gray-300"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">New Student Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">

                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">


                    <div class="table-responsive">
                        <?php
                            $query = "SELECT * FROM student_info";
                            $query_run = mysqli_query($conn, $query);
                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Username </th>
                                    <th>Email </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                                <tr>
                                    <td><?php  echo $row['id']; ?></td>
                                    <td><?php  echo $row['student_name']; ?></td>
                                    <td><?php  echo $row['student_email']; ?></td>
                                </tr>
                                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="../logout.php" method="post">
                    <button type="submit" class="btn btn-primary" name="admin_logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- profile modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Update Your Profile?</h5>
            </div>

            <?php
            $name = $_SESSION['admin_name'];

            $query="select * from admin_info where admin_name='$name'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
                ?>

            <div class="modal-body">
                <div class="form-group">
                    <form method="POST" action="admin_info/admin_code.php">

                        <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['id']?>"
                            placeholder="id">
                </div>

                <div class="form-group">
                    <label> Username </label>
                    <input type="text" name="edit_username" class="form-control" value="<?php echo $row['admin_name']?>"
                        placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" class="form-control checking_email"
                        value="<?php echo $row['admin_email']?>" placeholder="Enter Email" required>
                    <small class="error_email" style="color: red;"></small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="edit_password" class="form-control"
                        value="<?php echo $row['admin_password']?>" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="edit_cpassword" class="form-control" placeholder="Confirm Password"
                        required>
                </div>
            </div>



            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <div class="modal-footer">
                    <button type="submit" name="profile_editbtn" class="btn btn-primary">Update</button>
                </div>
                <?php
            }
    ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<?php
include ("include/script.php");
include ("include/footer.php");
?>