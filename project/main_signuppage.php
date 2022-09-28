<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Sign Up Page</title>
</head>
<body>
    <div class="bg-img">
        <div class="content">
            <header>Signup Form</header>
            <form method="post" action="main_code.php">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="username"  placeholder="Enter Username" autocomplete="off" required>
                </div>
                <br>
                <div class="field">
                    <span class="fas fa-envelope"></span>
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                <br>
                <div class="field">
                    <span class="fa fa-lock"></span>
                    <input class="pass-key" id="sign_peye" type="password" name="password" placeholder="Password" autocomplete="off" required>
                    <span><a class="fa fa-eye peye" id="sign_p_eye" onclick="eye1()"></a></span>
                </div>
                <br>
                <div class="field">
                    <span class="fa fa-lock"></span>
                    <input class="pass-key" id="sign_ceye" type="password" name="cpassword" placeholder="Conform Password" autocomplete="off" required>
                    <span><a class="fa fa-eye " id="sign_c_eye" onclick="eye2()"></a></span>
                </div>
                <br>
                
                <br>
                <div class="field">
                    <input type="submit" value="Sing up" name="signup_btn">
                </div>
                <br>
                <br>
                <div class="change"><a href="main_loginpage.php">login page</a></div>
            </form>
        </div>
    </div>      
    <script src="./script.js"></script>
     <!-- for custom error on js alert -->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php
        session_start();
        if(isset($_SESSION["status"]) && $_SESSION["status"]!='')
        {
     ?>
     <script>
        swal({
            title:"<?php echo $_SESSION['status'];?>",
            icon:"<?php echo $_SESSION['status_code'];?>",
            button:"Ok"
        });
     </script>
     <?php
     unset($_SESSION['status']);
     unset($_SESSION['status_code']);

        }
     ?>
</body>
</html>