<?php
session_start();
include("../../main_conn.php");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

        if($password === $cpassword)
        {
            $query = "INSERT INTO student_info (student_name,student_email,student_password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run)
            {
                $_SESSION['status_table'] = '<div class="alert alert-success" role="alert">student Profile Added</div>';
                header('Location: student_registration.php');
            }
            else 
            {
                $_SESSION['status_table'] = '<div class="alert alert-danger" role="alert">Email is exist in Database</div>';
                header('Location: student_registration.php');  
            }
        }
        else 
        {
            $_SESSION['status_table'] = '<div class="alert alert-danger" role="alert">Password and Conform Password is Not Same</div>';
            header('Location: student_registration.php');  
        }
    }






//for a update student

if(isset($_POST['editbtn']))
{
    $id=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $cpassword=$_POST['edit_cpassword'];

    if($cpassword === $password)
    {
        $query="update student_info set student_name='$username',student_email='$email',student_password='$password' where id='$id'";
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {   
            $_SESSION['status_table'] = '<div class="alert alert-success" role="alert">student Profile is Updated</div>';
            header('Location: student_registration.php');
        }
    }
    else
        {
            $_SESSION['status_table'] ='<div class="alert alert-danger" role="alert">Conform Password is Not Same</div>';
            header('Location: student_registration.php');  
        }
}
    


//for a delete student data

if(isset($_POST['deletebtn']))
{
    $id=$_POST['delete_id'];

    $query="delete from student_info where id='$id'";
    $query_run=mysqli_query($conn,$query);

    if($query_run)
    {
        $_SESSION['status_table'] ='<div class="alert alert-success" role="alert">student Profile is Deleted</div>';
        header('Location: student_registration.php'); 
    }
    else
    {
        $_SESSION['status_table'] = '<div class="alert alert-danger" role="alert">student Profile is Not Deleted</div>';
        header('Location: student_registration.php'); 
    }
}


?>