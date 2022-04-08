<?php

require_once('Includes/connection.php');

if(isset($_POST['register']))
{

   
    
    $Name=mysqli_real_escape_string($con,$_POST['Name']);
    $ID=mysqli_real_escape_string($con,$_POST['id']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $formEntries=array($Name,$ID,$email,$password);

    $returnStr="";



    for($i=0;$i<count($formEntries);$i++){
        if(empty($formEntries[$i])){
      
            switch($i){
                case 0:
                    $returnStr.="&Name";
                break;
                case 1:
                    $returnStr.="&ID";
                break;
                case 2:
                    $returnStr.="&email";
                break;
                case 3:
                    $returnStr.="&password";
                break;

            }

        }
    }

    if(!preg_match("/^[a-z,A-Z]*$/",$Name)){
        $returnStr.="&characters";
    }
    else{


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $returnStr.="&InValidEmail";
        }
        else{
            
            $sql="select * from faculty_data where FacultyID ='".$ID."'";
            mysqli_select_db($con,"student_management");
            $result=mysqli_query($con,$sql);

        
            if(mysqli_fetch_assoc($result)){
                $returnStr.="&UserExits";
            }



    
        }
        


    }


   
    if(strlen($returnStr)>0){
        $returnUrl=("location:faculty-register.php?".substr($returnStr,1)); 
     
        header($returnUrl);
        exit();
    }
    else{


        $HashPassword=password_hash($password,PASSWORD_DEFAULT);
        date_default_timezone_set('Asia/Kolkata');
        $date=date("d/m/Y");

        $sql="Insert into faculty_data (FacultyID,FacultyName,FacultyEmail,FacultyPassword) values ('$ID','$Name','$email','$HashPassword')";
                mysqli_select_db($con,"student_management");
                $result=mysqli_query($con,$sql);
                header("location:faculty-register.php?success");
                exit();
    }
   

}
else{

    header("location:faculty-register.php");

}





?>