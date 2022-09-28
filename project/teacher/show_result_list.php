<?php
include('../main_conn.php');
include("include/sidebar.php");




                if(isset($_POST['show_btn']))
                {
                    $id=$_POST['show_id'];

                $query = "SELECT * FROM result_data WHERE id='$id'";
                $query_run = mysqli_query($conn, $query);
                $row=mysqli_fetch_array($query_run);
                $tb_name=$row[3];

                $query = "SELECT * FROM $tb_name";
                $query_run2 = mysqli_query($conn, $query);


?>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Student Profile</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Student Name</th>
                            <th>Marks</th>
                            <th>Total Marks</th>
                            <th>Pass or Fall</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run2) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run2))
                            {
                        ?>
                        <tr>
                            <td><?php  echo $row['id']; ?></td>
                            <td><?php  echo $row['student_name']; ?></td>
                            <td><?php  echo $row['marks']; ?></td>
                            <td><?php  echo $row['total_marks']; ?></td>
                            <td><?php  echo $row['pa_fa']; ?></td>

                        </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                    }
                        ?>
                    </tbody>
                </table>

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
            $name = $_SESSION['teacher_name'];

            $query="select * from teacher_info where teacher_name='$name'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
                ?>

            <div class="modal-body">
                <div class="form-group">
                    <form method="POST" action="teacher_code.php">

                        <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['id']?>"
                            placeholder="id">
                </div>

                <div class="form-group">
                    <label> Username </label>
                    <input type="text" name="edit_username" class="form-control"
                        value="<?php echo $row['teacher_name']?>" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" class="form-control checking_email"
                        value="<?php echo $row['teacher_email']?>" placeholder="Enter Email" required>
                    <small class="error_email" style="color: red;"></small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="edit_password" class="form-control"
                        value="<?php echo $row['teacher_password']?>" placeholder="Enter Password" required>
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
                <form action="../logout.php" method="post">
                    <button type="submit" class="btn btn-primary" name="teacher_logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Feedback Modal-->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Give a Feedback...</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" method="POST" action="teacher_code.php">
                    <div class="form-group row mb-3">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                required>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="tel" class="form-control " id="mobile" name="mobile" placeholder="Mobile Number ">
                    </div>
                    <div class="form-group mb-3">
                        <textArea type="message" class="form-control " id="message" name="message"
                            placeholder="Enter Feedbcak Message" required></textArea>
                    </div>
                    <button type="submit" id="SubmitButton" name="SubmitButton"
                        class="btn btn-primary btn-user btn-block">
                        Submit Feedback
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>




<?php
include ("include/script.php");
include ("include/footer.php");

?>