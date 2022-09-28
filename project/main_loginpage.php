<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>Login Page</title>
</head>
<body>
    
<div class="bg-img">
        <div class="content">
            <header>Login Form</header>
            <form action="main_code.php" method="POST">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="username" placeholder="Enter Username" required autocomplete="off">
                </div>
                <br>
                <div class="field">
                    <span class="fa fa-lock"></span>
                    <input class="pass-key" id="login-eye" type="password" name="password" placeholder="Password" required autocomplete="off">
                    <span><a class="fa fa-eye peye" id="login-p-eye" onclick="eye()"></a></span>
                </div>
                <br>
                <br>
                <div class="field">
                    <input type="submit" value="Login" name="login_btn">
                </div>
                <br>
                <br>
                <div class="change"><a href="main_signuppage.php">Signup Form</a></div>
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
