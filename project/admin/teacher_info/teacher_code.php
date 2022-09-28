<?php
session_start();
include("../../main_conn.php");

//for a insert teacher

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

        if($password === $cpassword)
        {
            $query = "INSERT INTO teacher_info (teacher_name,teacher_email,teacher_password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run)
            {
                $_SESSION['status'] = '<div class="alert alert-success" role="alert">teacher Profile Added</div>';
                $_SESSION['status_code'] = "success";
                header('Location: teacher_registration.php');
            }
            else 
            {
                $_SESSION['status'] = '<div class="alert alert-danger" role="alert">Email is exist in Database</div>';
                $_SESSION['status_code'] = "error";
                header('Location: teacher_registration.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = '<div class="alert alert-danger" role="alert">Password and Conform Password is Not Same</div>';
            $_SESSION['status_code'] = "warning";
            header('Location: teacher_registration.php');  
        }
    }






//for a update teacher

if(isset($_POST['editbtn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $cpassword=$_POST['edit_cpassword'];

    if($cpassword === $password)
    {
        $query="update teacher_info set teacher_name='$username',teacher_email='$email',teacher_password='$password' where id='$id'";
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {   
            $_SESSION['status'] = '<div class="alert alert-success" role="alert">teacher Profile is Updated</div>';
            $_SESSION['status_code'] = "success";
            header('Location: teacher_registration.php');
        }
    }
    else
        {
            $_SESSION['status'] ='<div class="alert alert-danger" role="alert">Conform Password is Not Same</div>';
            $_SESSION['status_code'] = "warning";
            header('Location: teacher_registration.php');  
        }
}
    


//for a delete teacher data

if(isset($_POST['deletebtn']))
{
    $id=$_POST['delete_id'];

    $query="delete from teacher_info where id='$id'";
    $query_run=mysqli_query($conn,$query);

    if($query_run)
    {
        $_SESSION['status'] ='<div class="alert alert-success" role="alert">teacher Profile is Deleted</div>';
        $_SESSION['status_code'] = "warning";
        header('Location: teacher_registration.php'); 
    }
    else
    {
        $_SESSION['status'] = '<div class="alert alert-danger" role="alert">teacher Profile is Not Deleted</div>';
        $_SESSION['status_code'] = "warning";
        header('Location: teacher_registration.php'); 
    }
}


?>