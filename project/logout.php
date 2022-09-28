<?php
session_start();

//for a logout system logic
if(isset($_POST["admin_logout"]))
{
    
    unset($_SESSION['admin_name']);
    header("location: main_loginpage.php");
}
if(isset($_POST["teacher_logout"]))
{
    
    unset($_SESSION['teacher_name']);
    header("location: main_loginpage.php");
}

if(isset($_POST["student_logout"]))
{
    
    unset($_SESSION['student_name']);
    header("location: main_loginpage.php");
}

?>