<?php
include("admin_sidebar.php");
include("../../main_conn.php");
        ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="admin_code.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email"
                            required>
                        <small class="error_email" style="color: red;"></small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control"
                            placeholder="Confirm Password" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="registerbtn" class="btn btn-primary">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Profile
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add Admin Profile
                </button>
            </h6>
        </div>
        <div class="card-body">

            <?php
            if(isset($_SESSION['status_table']) && $_SESSION['status_table'] !='')
            {
                echo '<h2>'.$_SESSION['status_table'].'</h2>';
                unset($_SESSION['status_table']);
            }
            ?>
            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM admin_info";
                $query_run = mysqli_query($conn, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Username </th>
                            <th>Email </th>
                            <th>Password</th>

                            <th>EDIT</th>
                            <th>DELETE</th>
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
                            <td><?php  echo $row['admin_name']; ?></td>
                            <td><?php  echo $row['admin_email']; ?></td>
                            <td><?php  echo $row['admin_password']; ?></td>

                            <td>
                                <form action="admin_edit.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="admin_code.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="deletebtn" class="btn btn-danger">
                                        DELETE</button>
                                </form>
                            </td>
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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Close</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="../../logout.php" method="post">
                    <button type="submit" class="btn btn-primary" name="admin_logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
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
                    <form method="POST" action="admin_code.php">

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

<?php
include ("../include/script.php");
include ("../include/footer.php");
?>