<?php
session_start();
include("../main_conn.php");
//for a sent feedback
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
        else
        {
            $_SESSION['status'] = "Feedback Not sent Successfully...";
            $_SESSION['status_code'] = "error";
            header('Location: dashboard.php');
        }

    }


    //for a update student profile

if(isset($_POST['profile_editbtn']))
{
    $name=$_SESSION['student_name'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $cpassword=$_POST['edit_cpassword'];

    if($cpassword === $password)
    {
        $query="update student_info set student_name='$username',student_email='$email',student_password='$password' where student_name='$name'";
        unset($_SESSION['student_name']);
        $_SESSION['student_name']= $username;
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


// pepar checking Logic
if(isset($_POST['Submit_pepar_data']))
{

    $ans=$_POST['ans'];
    $pepar_name=$_SESSION['pepar_name'];
    unset($_SESSION['pepar_name']);

    $teacher=$_SESSION['teachername'];
    unset($_SESSION['teachername']);

    $student=$_SESSION['student_name'];

    

    // for a find test table name
    $query = "SELECT * FROM pepar_data WHERE id='$pepar_name'";
    $query_run = mysqli_query($conn, $query);
    $row=mysqli_fetch_array($query_run);
    $tb_title=$row[2];
    $tb_name=$row[3];


    // for a total number of question count
    $query="SELECT id FROM $tb_name ORDER BY id ";
    $run_query =mysqli_query($conn,$query);
    if(!$run_query)
    {
        echo '<script> alert("not working query")</script>';
    }
    $pepar_row = mysqli_num_rows($run_query);


    // for fetch data  teacher ans
    $query = "SELECT * FROM $tb_name";
    $query_run2 = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($query_run2))
    {
        $ansewer= $row['ans'];
        $ansvar[]=$ansewer;

    }

    //for fetch student ans 
    $mark=0;
    foreach($ans as $index => $ans_save)
        {
            
            $s_ans =$ans_save;
            $tb_ans=$ansvar[$index];

            // for a checking module
            if($s_ans===$tb_ans)
            {
                $mark=$mark+1;
            }
            

        }  

        // for a pass or fall 
        $haf_mark=$pepar_row/2;
        if($mark>=$haf_mark)
        {
            $pa_fa = "PASS";
        }
        else
        {
            $pa_fa="FALL";
        }
        
        $name=$tb_name."_result";

        $teacher_name=str_replace(" ","",$teacher);
        $new_teacher_name=str_replace(".","",$teacher_name);

        $new_name=str_replace(" ","",$tb_name);
        $new_tb_name=str_replace(".","",$new_name);

        // inserting data into result table
        $result_query="INSERT into $name (student_name,marks,total_marks,pa_fa) values('$student','$mark','$pepar_row','$pa_fa')";
        $run_result=mysqli_query($conn,$result_query);

        if($run_result)
        {
            $_SESSION['status'] = "Your Pepar is Submited... Show Result...";
            $_SESSION['status_code'] = "success";
            header('Location: all_pepars.php');  
        }
        else
        {
            $_SESSION['status'] = "some error apendes....";
            $_SESSION['status_code'] = "error";
            header('Location: fill_pepar.php');  
        } 
}

?>