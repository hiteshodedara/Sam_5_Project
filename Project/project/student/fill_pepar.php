<?php
include ("include/sidebar.php");
include("../main_conn.php");
?>




<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">

<?php
    if(isset($_POST['fill_btn']))
    {
        $id=$_POST['fill_id'];
       
        $_SESSION['pepar_name']=$id;
        
    $query = "SELECT * FROM pepar_data WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    $row=mysqli_fetch_array($query_run);
    $teacher=$row[1];
    $tb_title=$row[2];
    $tb_name=$row[3];

    // for teacher name
    $_SESSION['teachername']=$teacher;


    $query = "SELECT * FROM $tb_name";
    $query_run2 = mysqli_query($conn, $query);
    
?>
                        <h4><?php echo $tb_title." Paper";?></h4>
                    </div>
                    <div class="card-body">
                        <form action="student_code.php" method="POST" novalidate>

                        <?php
                        if(mysqli_num_rows($query_run2) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run2))
                            {
                        ?>
                           
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                   <div class="form-group mb-2">
                                    <label for=""><?php echo $row['id'];?>  .Question</label>
                                            <input type="text" name="question[]" class="form-control" required placeholder="<?php echo $row['question'];?>"disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="a">A</label>
                                            <input type="text" name="a[]" class="form-control" required placeholder="<?php echo $row['a'];?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                        <label for="b   ">B</label>
                                            <input type="text" name="b[]" class="form-control" required placeholder="<?php echo $row['b'];?>"disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                        <label for="c">C</label>
                                            <input type="text" name="c[]" class="form-control" required placeholder="<?php echo $row['c'];?>"disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                        <label for="d">D</label>
                                            <input type="text" name="d[]" class="form-control" required placeholder="<?php echo $row['d'];?>"disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                        <label for="ans">Ans</label>
                                            <input type="text" id="ans" name="ans[]" class="form-control" required placeholder="ans" pattern="[A-Da-d]">
                                            <div class="invalid-value">
                                                Enter a, b, c, d 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                    }
                        ?>
                            </div>
                            <div class="paste-new-forms"></div>
                            <button type="submit" name="Submit_pepar_data" class="btn btn-primary">Submit Pepar</button>
                        </form>
                    </div>
                </div>
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
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="../logout.php" method="post">
                    <button type="submit" class="btn btn-primary" name="student_logout">
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
                <form class="user" method="POST" action="student_code.php">
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
                    <div class="form-group">
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





<!-- profile modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Update Your Profile?</h5>
            </div>

            <?php
            $name = $_SESSION['student_name'];

            $query="select * from student_info where student_name='$name'";
            $query_run = mysqli_query($conn,$query);

            foreach($query_run as $row)
            {
                ?>

            <div class="modal-body">
                <div class="form-group">
                    <form method="POST" action="student_code.php">

                        <input type="hidden" name="edit_id" class="form-control" value="<?php echo $row['id']?>"
                            placeholder="id">
                </div>

                <div class="form-group">
                    <label> Username </label>
                    <input type="text" name="edit_username" class="form-control" value="<?php echo $row['student_name']?>"
                        placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="edit_email" class="form-control checking_email"
                        value="<?php echo $row['student_email']?>" placeholder="Enter Email" required>
                    <small class="error_email" style="color: red;"></small>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="edit_password" class="form-control"
                        value="<?php echo $row['student_password']?>" placeholder="Enter Password" required>
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