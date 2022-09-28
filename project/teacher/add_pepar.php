<?php
include ("include/sidebar.php");
include("../main_conn.php");
?>

<?php @session_start(); 
if(isset($_POST['pepar_create_btn']))
{
    $teachername=$_POST['teachername'];
    $title=$_POST['title'];

    $_SESSION['teachername']=$teachername;
    $_SESSION['pepar_title']=$title;
    
}

?>

  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4><?php echo $title." Paper";?>
                            <a href="javascript:void(0)" class="add-more-form float-end btn btn-primary">Add More Question</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="teacher_code.php" method="POST">
                            <div class="main-form mt-3 border-bottom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="">Question</label>
                                            <input type="text" name="question[]" class="form-control" required placeholder="Question"required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <input type="text" name="a[]" class="form-control" required placeholder="A"required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <input type="text" name="b[]" class="form-control" required placeholder="B"required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <input type="text" name="c[]" class="form-control" required placeholder="C"required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <input type="text" name="d[]" class="form-control" required placeholder="D"required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <input type="text" name="ans[]" class="form-control" required placeholder="Ans"required pattern="[A-Da-d]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="paste-new-forms"></div>
                            <button type="submit" name="save_pepar_data" class="btn btn-primary">Save Pepar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
<script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                <div class="row">\
                                    <div class="col-md-12">\
                                        <div class="form-group mb-2">\
                                            <label for="">Question</label>\
                                            <input type="text" name="question[]" class="form-control" required placeholder="Question">\
                                        </div>\
                                    </div>\
                                </div>\
                                <div class="row">\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name="a[]" class="form-control" required placeholder="A">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name="b[]" class="form-control" required placeholder="B">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name="c[]" class="form-control" required placeholder="C">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name="d[]" class="form-control" required placeholder="D">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name="ans[]" class="form-control" required placeholder="Ans">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>');
            });

        });
    </script>







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



<?php
include ("include/script.php");
// include ("include/footer.php");
?>