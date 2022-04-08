<?php
require_once('Includes/header.php');
    $conn=mysqli_connect("localhost","root","","student_management");
    if(!$conn){
        die("Connection Failed!!!");
    }
    else{
    if(isset($_POST['update'])){
        $FName=$_POST['FName'];
        $LName=$_POST['LName'];
        $Regno=$_POST['regno'];
        $DOB=$_POST['DOB'];
        $Email=$_POST['email'];
        $branch=$_POST['branch'];
        $pass=$_POST['password'];
        $pass=password_hash($pass,PASSWORD_DEFAULT);
        $sql="UPDATE student_data SET FName='$FName',LName='$LName',DOB='$DOB',Email='$Email',Branch='$branch',Password='$pass' WHERE Regno='$Regno'";
        if(mysqli_query($conn,$sql)){
            $msg="Successfully Updated Your Details!";
            echo '<div class="alert alert-success text-center">'.$msg.'</div>';
            echo "<div align='center' class='mt-3'> <a href=\"javascript:history.go(-1)\" class='btn btn-dark btn-lg active' role='button' aria-pressed='true'>Go Back</a></div>";
        }
        else{
            echo "Update failed!!";
        }
    }
    else if(isset($_POST['updateinternship'])){
        $flag=true;
        $Regno=$_POST['regno'];
        //$ID=$_POST['id'];
        $count=$_POST['count'];
        $cond=$_POST['cout'];
        //echo $count;
        //echo $cond;
        //echo $Regno;
        for($i=0;$i<$count;$i++){
            $ID=$_POST["id$i"];
            $cn=$_POST["cname$i"];
            $rl=$_POST["role$i"];

          
            $sql="UPDATE internships SET Cname='$cn',Role='$rl' WHERE Regno='$Regno' AND ID='$ID'";
            if(!mysqli_query($conn,$sql))
            {
                $flag=false;
            

            }

            
        }
        if($flag==true)
        {
            $msg="Internships Updated!";
            echo '<div class="alert alert-success text-center">'.$msg.'</div>';

        }
        else{
            $msg="Some Problem in Updating Interships!";
            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
        }

        if($cond=="Yes"){
            $flag=true;
            $i=$count;
            $ID=$i+1;
            $cn=$_POST["cname$i"];
            $rl=$_POST["role$i"];
            
            $sql="Insert into internships (ID,Regno,Cname,Role) values ('$ID','$Regno','$cn','$rl')";
            if(mysqli_query($conn,$sql))
            {
                $msg="Internship Added!";
                echo '<div class="alert alert-success text-center">'.$msg.'</div>';
            }
            else{
                $msg="Some Problem in Adding Internship!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
            }

            
            
        }
        
        echo "<div align='center' class='mt-3'> <a href=\"javascript:history.go(-1)\" class='btn btn-dark btn-lg active' role='button' aria-pressed='true'>Go Back</a></div>";

    }
    else if(isset($_POST['updatecontribution'])){
        $flag=true;
        $Regno=$_POST['regno'];
        //$ID=$_POST['id'];
        $count=$_POST['count'];
        $cond=$_POST['cout'];
        //echo $count;
        //echo $cond;
        //echo $Regno;
        for($i=0;$i<$count;$i++){
            $ID=$_POST["id$i"];
            $oname=$_POST["oname$i"];
            $iovit=$_POST["iovit$i"];
            $role=$_POST["role$i"];

          
            $sql="UPDATE contributions SET Oname='$oname',IOvit='$iovit',Role='$role' WHERE Regno='$Regno' AND ID='$ID'";
            if(!mysqli_query($conn,$sql))
            {
                $flag=false;
            

            }

            
        }
        if($flag==true)
        {
            $msg="Contributions Updated!";
            echo '<div class="alert alert-success text-center">'.$msg.'</div>';
        }
        else{
            $msg="Some Problem in Updating Contributions!";
            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
        }
        
        
       
        if($cond=="Yes"){
            $flag=true;
            $i=$count;
            $ID=$i+1;
            $oname=$_POST["oname$i"];
            $iovit=$_POST["iovit$i"];
            $role=$_POST["role$i"];
            
            $sql="Insert into contributions (ID,Regno,Oname,IOvit,Role) values ('$ID','$Regno','$oname','$iovit','$role')";
            if(mysqli_query($conn,$sql))
            {
                $msg="Contributions Added!";
                echo '<div class="alert alert-success text-center">'.$msg.'</div>';
            }
            else{
                $msg="Some Problem in Adding Contributions!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
            }

            
            
        }
        
        echo "<div align='center' class='mt-3'> <a href=\"javascript:history.go(-1)\" class='btn btn-dark btn-lg active' role='button' aria-pressed='true'>Go Back</a></div>";
        

    }
    else if(isset($_POST['updateachievement'])){
        $flag=true;
        $Regno=$_POST['regno'];
        //$ID=$_POST['id'];
        $count=$_POST['count'];
        $cond=$_POST['cout'];
        //echo $count;
        //echo $cond;
        //echo $Regno;
        for($i=0;$i<$count;$i++){
            $ID=$_POST["id$i"];
            $type=$_POST["type$i"];
            $des=$_POST["des$i"];
            $year=$_POST["year$i"];

          
            $sql="UPDATE achievements SET Type='$type',Description='$des',Year='$year' WHERE Regno='$Regno' AND ID='$ID'";
            if(!mysqli_query($conn,$sql))
            {
                $flag=false;
            

            }
            
        }
        if($flag==true)
        {
            $msg="Achievements Updated!";
            echo '<div class="alert alert-success text-center">'.$msg.'</div>';
        }
        else{
            $msg="Some Problem in Updating Achievements!";
            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
        }
        
        
       
        if($cond=="Yes"){
            $flag=true;
            $i=$count;
            $ID=$i+1;
            $type=$_POST["type$i"];
            $des=$_POST["des$i"];
            $year=$_POST["year$i"];
            
            $sql="Insert into achievements (ID,Regno,Type,Description,Year) values ('$ID','$Regno','$type','$des','$year')";
            if(mysqli_query($conn,$sql))
            {
                $msg="Achievements Added!";
                echo '<div class="alert alert-success text-center">'.$msg.'</div>';
            }
            else{
                $msg="Some Problem in Adding Achievements!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
            }

            
            
        }
        
        echo "<div align='center' class='mt-3'> <a href=\"javascript:history.go(-1)\" class='btn btn-dark btn-lg active' role='button' aria-pressed='true'>Go Back</a></div>";
        
        
    }
    else if(isset($_POST['updateacademic'])){
        
    $Regno=$_POST['regno'];
        
        
    $sql4="select * from past_courses where Regno='".$Regno."';";
    $res2=mysqli_query($conn,$sql4);
    $pastCourses= array();
    while($row2=mysqli_fetch_assoc($res2)){
        array_push($pastCourses,$row2['Course']);
    }
    //Current Courses...
    $currentCourses=array();
    $sql3="select * from current_courses where Regno='".$Regno."';";
    $res3=mysqli_query($conn,$sql3);
    while($row3=mysqli_fetch_assoc($res3)){
        array_push($currentCourses,$row3['currCourses']);
    }   
        $flagPast=true;
        $flagCurr=true;
        $flagC=true;
        $flagNC=true;
        $flagNP=true;
        $cgpa=$_POST['cgpa'];
        $Sem=$_POST['Sem'];
        $count=$_POST['sk'];
        for($i=0;$i < count($pastCourses); $i++){
            $s1=$_POST["Coursep$i"];
            $sql5="UPDATE past_courses SET Course='$s1' WHERE Regno='$Regno' AND Course='$pastCourses[$i]'";
            if(!mysqli_query($conn,$sql5))
            {
                $flagPast=false;

            }
        }
        for($i=0;$i<$count;$i++){
        $s1=$_POST["Course$i"];
 ;
            $sql2="UPDATE current_courses SET currCourses='$s1' WHERE Regno='$Regno' AND currCourses='$currentCourses[$i]'";
            if(!mysqli_query($conn,$sql2))
            {
                $flagCurr=false;
            }
        }
     
        
        $sql1="UPDATE student_data SET CGPA='$cgpa',Sem='$Sem'WHERE Regno='$Regno'";
      
        if(!mysqli_query($conn,$sql1))
        {
            $flagC=false;
        }
        if(isset($_POST['newCourse'])){
        $curr=$_POST['newCourse'];
        }
        else{
            $curr=FALSE;
        }
        if(isset($_POST['oldCourse'])){
        $past=$_POST['oldCourse'];
        }
        else{
            $past=FALSE;
        }
        if($curr){
        //echo "$curr<br>";
        /*if(null !== array_search($curr,$pastCourses) || null !==  array_search($curr,$currentCourses) ){
            header("location:studentacademicedit.php?invalidC=$Regno");
            exit();
        }*/
        $sql12="Insert into current_courses (Regno,currCourses) values ('$Regno','$curr')";
        if(!mysqli_query($conn,$sql12))
        {
            $flagNC=false;

        }
        }
        if($past){
        //echo "$past<br>";
        /*if(null !== array_search($past,$pastCourses) || null !== array_search($past,$currentCourses) ){
            header("location:studentacademicedit.php?invalidC=$Regno");
            exit();
        }*/
        $sql11="Insert into past_courses (Regno,Course) values ('$Regno','$past')";
        
        if(!mysqli_query($conn,$sql11))
        {
            $flagNP=false;
        }
        }


        if(!$flagPast)
        {
            $msg="Some Problem in Updating Past Courses!";
            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';

        }
        if(!$flagCurr)
        {
            $msg="Some Problem in Updating Current Courses!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';

        }
        if(!$flagC)
        {
            $msg="Some Problem in Updating CGPA!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';

        }
        if(!$flagNC)
        {
            $msg="Some Problem in Adding Current Course!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
            
        }
        if(!$flagNP)
        {
            $msg="Some Problem in Adding Past Courses!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';

        }
        if($flagCurr and $flagPast and $flagC and $flagNC and $flagNP){
            $msg="Academic Details Updated!";
            echo '<div class="alert alert-success text-center">'.$msg.'</div>';
        }

        echo "<div align='center' class='mt-3'> <a href=\"javascript:history.go(-1)\" class='btn btn-dark btn-lg active' role='button' aria-pressed='true'>Go Back</a></div>";
      
    }
    else if(isset($_POST['updateproject'])){
        $Regno=$_POST['regno'];
        $flag=true;
        //$ID=$_POST['id'];
        $count=$_POST['count'];
        $cond=$_POST['cout'];
        //echo $count;
        //echo $cond;
        //echo $Regno;
        for($i=0;$i<$count;$i++){
            $ID=$_POST["id$i"];
            $title=$_POST["title$i"];
            $desc=$_POST["desc$i"];
            $tech=$_POST["tech$i"];
            $link=$_POST["link$i"];
            //echo "$ID <br>$title<br> $desc<br> $tech<br> $link<br><br><br>";
        
            $sql="UPDATE projects SET Title='$title',Description='$desc',Technologies='$tech', Link='$link' WHERE Regno='$Regno' AND ID='$ID'";
            if(!mysqli_query($conn,$sql))
            {
                $flag=false;
            }

        }
        if($flag==true)
        {
            $msg="Projects Updated!";
            echo '<div class="alert alert-success text-center">'.$msg.'</div>';
        }
        else{
            $msg="Some Problem in Updating Projects!";
            echo '<div class="alert alert-danger text-center">'.$msg.'</div>';
        }
        if($cond=="Yes"){
           
            $i=$count;
            $ID=$i+1;
            $title=$_POST["title$i"];
            $desc=$_POST["desc$i"];
            $tech=$_POST["tech$i"];
            $link=$_POST["link$i"];
            //echo"$title $desc $ID $Regno $tech $link";
            $sql6="Insert into projects (ID,Regno,Title,Description,Technologies,Link) values ('$ID','$Regno','$title','$desc','$tech','$link')";
            if(mysqli_query($conn,$sql6))
            {
                $msg="Project Added!";
                echo '<div class="alert alert-success text-center">'.$msg.'</div>';
            }
            else{
                $msg="Some Problem in Adding Projects!";
                echo '<div class="alert alert-danger text-center">'.$msg.'</div>';

            }
            
            
        }

        
        echo "<div align='center' class='mt-3'> <a href=\"javascript:history.go(-1)\" class='btn btn-dark btn-lg active' role='button' aria-pressed='true'>Go Back</a></div>";

    }
    
    else{
        header("location:view.php");
        }
    }


?>