<?php

require_once('Includes/connection.php');

if(isset($_POST['register']))
{

    $Image=$_FILES['image']['name'];
    $Type=$_FILES['image']['type'];
    $Temp=$_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size'];


    $Extension=explode('.',$Image);
    $TrueExt=(strtolower(end($Extension)));
    
    $AllowImg=array('jpg','jpeg','png');
    $Target="images/".$Image;
    
    $FirstName=mysqli_real_escape_string($con,$_POST['FName']);
    $LastName=mysqli_real_escape_string($con,$_POST['LName']);
    $Regno=mysqli_real_escape_string($con,$_POST['regno']);
    $DOB=mysqli_real_escape_string($con,$_POST['DOB']);
    $Branch=mysqli_real_escape_string($con,$_POST['branch']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $formEntries=array($FirstName,$LastName,$Regno,$DOB,$email,$password);

    $returnStr="";



    for($i=0;$i<count($formEntries);$i++){
        if(empty($formEntries[$i])){
      
            switch($i){
                case 0:
                    $returnStr.="&FName";
                break;
                case 1:
                    $returnStr.="&LName";
                break;
                case 2:
                    $returnStr.="&Regno";
                break;
                case 3:
                    $returnStr.="&DOB";
                break;
                case 4:
                    $returnStr.="&email";
                break;
                case 5:
                    $returnStr.="&password";
                break;

            }

        }
    }

    if(!preg_match("/^[a-z,A-Z]*$/",$FirstName) || !preg_match("/^[a-z,A-Z]*$/",$LastName)){
        $returnStr.="&characters";
    }
    else{


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $returnStr.="&InValidEmail";
        }
        else{
            
            $sql="select * from student_data where Regno ='".$Regno."'";
            mysqli_select_db($con,"student_management");
            $result=mysqli_query($con,$sql);

        
            if(mysqli_fetch_assoc($result)){
                $returnStr.="&UserExits";
            }



    
        }
        


    }


   
    if(strlen($returnStr)>0){
        $returnUrl=("location:register.php?".substr($returnStr,1)); 
     
        header($returnUrl);
        exit();
    }
    else{

        $HashPassword=password_hash($password,PASSWORD_DEFAULT);
        date_default_timezone_set('Asia/Kolkata');
        $date=date("d/m/Y");

        if(in_array($TrueExt,$AllowImg))
        {
            if($size<1000000){


                $sql="Insert into student_data (Regno,Img,FName,LName,DOB,Branch,Email,Password,Date) values ('$Regno','$Image','$FirstName','$LastName','$DOB','$Branch','$email','$HashPassword','$date')";
                mysqli_select_db($con,"student_management");
                $result=mysqli_query($con,$sql);
                move_uploaded_file($Temp,$Target);
                header("location:register.php?success");
                exit();

            }
            else{
                header("location:register.php?Too_Large");
                exit();

            }

        }
        else{
        
        $returnUrl=("location:register.php?InValid_Format"); 
     
        header($returnUrl);
        exit();
            
        }
    }

}
else{

    header("location:register.php");

}





?>