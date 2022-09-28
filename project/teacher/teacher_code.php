<?php
session_start();
include("../main_conn.php");

//for a update teacher profile
if(isset($_POST['profile_editbtn']))
{
    $name=$_SESSION['teacher_name'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $cpassword=$_POST['edit_cpassword'];

    if($cpassword === $password)
    {
        $query="update teacher_info set teacher_name='$username',teacher_email='$email',teacher_password='$password' where teacher_name='$name'";
        unset($_SESSION['teacher_name']);
        $_SESSION['teacher_name']= $username;
        $query_run=mysqli_query($conn,$query);
        if($query_run)
        {   
            $_SESSION['status'] = "Profile Updated...";
            $_SESSION['status_code'] = "success";
            header('Location: dashboard.php');
        }
    }
    else
        {
            $_SESSION['status'] = "Profile Not Updated...";
            $_SESSION['status_code'] = "error";
            header('Location: dashboard.php');  
        }
}
 


//feedback modal control..

if(isset($_POST['SubmitButton']))
    {
        $username=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['mobile'];
        $message=$_POST['message'];

        $query="INSERT into feedback(user_name,user_email,user_mobile,user_message) values('$username','$email','$number','$message')";
        $run_query = mysqli_query($conn,$query);
        if($run_query)
        {
            $_SESSION['status'] = "Feedback sent Successfully...";
            $_SESSION['status_code'] = "success";
            header('Location: dashboard.php');
        }

    }





// new pepar add in database
if(isset($_POST['save_pepar_data']))
{
    
     // random number genretor 
     $randomnum=rand(0,100);

     // store session data
     $teachername=$_SESSION['teachername'];
     $title=$_SESSION['pepar_title'];

     unset($_SESSION['teachername']);
     unset($_SESSION['pepar_title']);
     

     // marge name 
     $tb_name=$title.$randomnum;

    // replaceing space in string
    $new_name=str_replace(" ","",$tb_name);
    $new_tb_name=str_replace(".","",$new_name);

    $result_tb_name=$new_tb_name."_result";
    $creator_query="CREATE table $result_tb_name(id INT NOT NULL AUTO_INCREMENT,student_name VARCHAR(50),marks int(50),total_marks int(50),pa_fa varchar(50),PRIMARY KEY(ID))";
    $result_run_query=mysqli_query($conn,$creator_query);

    if(!$result_run_query)
    {
            $_SESSION['status'] = "Result table is not Created...";
            $_SESSION['status_code'] = "error";
            header('Location: show_all_pepar.php');  
    }

    $result_query="insert into result_data(teacher_name,result_name,result_table) values ('$teachername','$title','$result_tb_name')";
    $run_query=mysqli_query($conn,$result_query);

    if(!$run_query)
    {
            $_SESSION['status'] = "Data Not Insert in Paper Data Table... ";
            $_SESSION['status_code'] = "error";
            header('Location: show_all_pepar.php');  
    }

     //insert creator pepar data in database
    $creator_query="insert into pepar_data(teacher_name,pepar_title,pepar_table) values ('$teachername','$title','$new_tb_name')";
    $run_query=mysqli_query($conn,$creator_query);

    if(!$run_query)
    {
            $_SESSION['status'] = "Data Not Insert in Paper Data Table... ";
            $_SESSION['status_code'] = "error";
            header('Location: show_all_pepar.php');  
    }

     // create table for a pepar
    $new_tb_query="CREATE table $new_tb_name(id INT NOT NULL AUTO_INCREMENT,question VARCHAR(200),a VARCHAR(50), b VARCHAR(50), c VARCHAR(50), d VARCHAR(50), ans VARCHAR(50),PRIMARY KEY(ID))";
        
     // execute query
    $create_query=mysqli_query($conn,$new_tb_query);
    if(!$create_query)
    {
        $_SESSION['status'] = "Table Are Not Created... ";
        $_SESSION['status_code'] = "error";
        header('Location: show_all_pepar.php');  
    }
    else
    {

        $question = $_POST['question'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $ans = $_POST['ans'];

        foreach($question as $index => $questions)
        {
            $s_question = $questions;
            $s_a = $a[$index];
            $s_b = $b[$index];
            $s_c = $c[$index];
            $s_d = $d[$index];
            $s_ans = $ans[$index];


                // insert pepar data in created table 
            $query = "INSERT INTO $new_tb_name(question,a,b,c,d,ans) VALUES ('$s_question','$s_a','$s_b','$s_c','$s_d','$s_ans')";
            $query_run = mysqli_query($conn, $query);
            
        }
        if($query_run)
        {
            $_SESSION['status'] = "Pepar is Created...";
            $_SESSION['status_code'] = "success";
            header('Location: show_all_pepar.php');  
        }
        else
        {
            $_SESSION['status'] = "Pepar Questions Not Inserted... ";
            $_SESSION['status_code'] = "error";
            header('Location: show_all_pepar.php');  
        }
    }
}



//delete a pepar in database

if(isset($_POST['delete_btn']))
{
    $id=$_POST['delete_id'];

    $query = "SELECT * FROM pepar_data WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);
    $row=mysqli_fetch_array($query_run);
    $tb_name=$row['3'];
    
    //for drop a deleted pepar data table
    $delete_tb_query="drop table $tb_name";
    $query_run = mysqli_query($conn, $delete_tb_query);

    if(!$query_run)
    {
        $_SESSION['status'] = "Table Not Drop...";
        $_SESSION['status_code'] = "error";
        header('Location: show_all_pepar.php');  
    }
    
    //for delete data in pepar data table
    $query="delete from pepar_data where id='$id'";
    $query_run=mysqli_query($conn,$query);

    if($query_run)
    {
        $_SESSION['status'] = "Pepar Are Deleted... ";
            $_SESSION['status_code'] = "success";
            header('Location: show_all_pepar.php');  
    }
    else
    {
        $_SESSION['status'] = "Pepar are Not Deleted... ";
            $_SESSION['status_code'] = "error";
            header('Location: show_all_pepar.php');  
    }
}
?>