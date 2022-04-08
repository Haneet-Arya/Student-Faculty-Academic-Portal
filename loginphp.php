<?php
    session_start();
    require_once('Includes/connection.php');
    if(isset($_POST['login']))
    {

        if(empty($_POST['regno']) || empty($_POST['password']))
        {
            header("location:login.php?empty");
            exit();
        }
        else{

            $Regno=mysqli_real_escape_string($con,$_POST['regno']);
            $Pass=mysqli_real_escape_string($con,$_POST['password']);

            $sql="select * from student_data where Regno ='".$Regno."'";
            mysqli_select_db($con,"student_management");
            $res=mysqli_query($con,$sql);

            if($row=mysqli_fetch_assoc($res))
            {
                //de hash
                $hash=password_verify($Pass,$row['Password']);
                if($hash==false){
                    
                    header("location:login.php?pinvalid");
                    exit();
                }
                elseif($hash==true){


                    $_SESSION['StudentID']=$row['Regno'];
                    $StudentID=$row['Regno'];
                    header("location:view.php?success=$StudentID");

                }
            }

            else{
                
                header("location:login.php?invalid");
                exit();
            }
        }


    }
    else{

        header("location:login.php");
    }



?>