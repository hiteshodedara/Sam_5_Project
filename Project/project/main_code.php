<?php
include("main_conn.php");
session_start();
//main signup code..

if(isset($_POST['signup_btn']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    if($password === $cpassword)
    {
        $admin_query="SELECT * FROM admin_info WHERE admin_name='$username' AND admin_password='$password'";
        $admin_query_run=mysqli_query($conn,$admin_query);
    
        $teacher_query="SELECT * FROM teacher_info WHERE teacher_name='$username' AND teacher_password='$password'";
        $teacher_query_run=mysqli_query($conn,$teacher_query);
    
        $student_query="SELECT * FROM student_info WHERE student_name='$username' AND student_password='$password'";
        $student_query_run=mysqli_query($conn,$student_query);
    
        if(mysqli_fetch_array($admin_query_run))
        {
            $_SESSION['status']="User Available in Database...";
            $_SESSION['status_code']="error";
            echo "<script>window.location.replace('http://localhost/project/main_signuppage.php')</script>";
        }
        elseif(mysqli_fetch_array($teacher_query_run))
        {
            $_SESSION['status']="User Available in Database...";
            $_SESSION['status_code']="error";
            echo "<script>window.location.replace('http://localhost/project/main_signuppage.php')</script>";
        }
        elseif(mysqli_fetch_array($student_query_run))
        {
            $_SESSION['status']="User Available in Database...";
            $_SESSION['status_code']="error";
            echo "<script>window.location.replace('http://localhost/project/main_signuppage.php')</script>";
        }            
        else
        {    
            $query="INSERT INTO student_info (student_name,student_email,student_password) VALUES ('$username','$email','$password')";
            $run_query=mysqli_query($conn,$query);
            if($run_query)
            {
                $_SESSION['status']="Sign up Successfully...";
                $_SESSION['status_code']="success";
                echo "<script>window.location.replace('http://localhost/project/main_loginpage.php')</script>";
            }
            else
            {
                $_SESSION['status']="Email is Taken by Another Person...";
                $_SESSION['status_code']="error";
                echo "<script>window.location.replace('http://localhost/project/main_signuppage.php')</script>";
            }
        }
    }
}


//main login code

if(isset($_POST['login_btn']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $admin_query="SELECT * FROM admin_info WHERE admin_name='$username' AND admin_password='$password'";
    $admin_query_run=mysqli_query($conn,$admin_query);

    $teacher_query="SELECT * FROM teacher_info WHERE teacher_name='$username' AND teacher_password='$password'";
    $teacher_query_run=mysqli_query($conn,$teacher_query);

    $student_query="SELECT * FROM student_info WHERE student_name='$username' AND student_password='$password'";
    $student_query_run=mysqli_query($conn,$student_query);

    if(mysqli_fetch_array($admin_query_run))
    {
        $_SESSION['admin_name']= $username;
        header("Location:admin/dashboard.php");
    }
    elseif(mysqli_fetch_array($teacher_query_run))
    {
        $_SESSION['teacher_name']=$username;
        header("Location:teacher/dashboard.php");
    }
    elseif(mysqli_fetch_array($student_query_run))
    {
        $_SESSION['student_name']=$username;
        header("Location:student/dashboard.php");
    }            
    else
    {            
            $_SESSION['status']="Please Sign up and Try Again";
            $_SESSION['status_code']="error";
            echo "<script>window.location.replace('http://localhost/project/main_loginpage.php')</script>";
    }
}

?>