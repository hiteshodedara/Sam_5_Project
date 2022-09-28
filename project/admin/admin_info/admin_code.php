<?php
session_start();
include("../../main_conn.php");


//for a insert new admin
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

        if($password === $cpassword)
        {
            $query = "INSERT INTO admin_info (admin_name,admin_email,admin_password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run)
            {
                $_SESSION['status_table'] = '<div class="alert alert-success" role="alert">Admin Profile Added</div>';
                header('Location: admin_registration.php');
            }
            else 
            {
                $_SESSION['status_table'] = '<div class="alert alert-danger" role="alert">Email is exist in Database</div>';
                header('Location: admin_registration.php');  
            }
        }
        else 
        {
            $_SESSION['status_table'] = '<div class="alert alert-danger" role="alert">Password and Conform Password is Not Same</div>';
            header('Location: admin_registration.php');  
        }
    }






//for a update admin
if(isset($_POST['editbtn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $cpassword=$_POST['edit_cpassword'];

    if($cpassword === $password)
    {
        $query="update admin_info set admin_name='$username',admin_email='$email',admin_password='$password' where id='$id'";
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {   
            $_SESSION['status_table'] = '<div class="alert alert-success" role="alert">Admin Profile is Updated</div>';
            header('Location: admin_registration.php');
        }
    }
    else
        {
            $_SESSION['status_table'] ='<div class="alert alert-danger" role="alert">Conform Password is Not Same</div>';
            header('Location: admin_registration.php');  
        }
}
    

//for a update admin profile
if(isset($_POST['profile_editbtn']))
{
    $name=$_SESSION['admin_name'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $cpassword=$_POST['edit_cpassword'];

    if($cpassword === $password)
    {
        $query="update admin_info set admin_name='$username',admin_email='$email',admin_password='$password' where admin_name='$name'";
        unset($_SESSION['admin_name']);
        $_SESSION['admin_name']= $username;
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {   
            $_SESSION['status'] = "Profile Updated...";
            $_SESSION['status_code'] = "success";
            header('Location: admin_registration.php');
        }
    }
    else
        {
            $_SESSION['status'] = "Profile Not Updated...";
            $_SESSION['status_code'] = "error";
            header('Location: admin_registration.php');  
        }
}
    


//for a delete admin data
if(isset($_POST['deletebtn']))
{
    $id=$_POST['delete_id'];

    $query="delete from admin_info where id='$id'";
    $query_run=mysqli_query($conn,$query);

    if($query_run)
    {
        $_SESSION['status_table'] ='<div class="alert alert-success" role="alert">Admin Profile is Deleted</div>';
        header('Location: admin_registration.php'); 
    }
    else
    {
        $_SESSION['status_table'] = '<div class="alert alert-danger" role="alert">Admin Profile is Not Deleted</div>';
        header('Location: admin_registration.php'); 
    }
}


?>