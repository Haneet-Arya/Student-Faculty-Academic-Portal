
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery/jquery.js"></script>
    <script type="text/javascript" src='js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="sstyle.css">
    <title>Student Faculty Interaction</title>
    
</head>
<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="index.php"><img class="d-inline-block align-top" src="images/vitlogo.png" alt="VIT Vellore" style="height:75px; width:180px;"></a>
    <h3>Student Faculty Interaction Portal</h3>




      <?php

if(isset($_SESSION['StudentID']) || isset($_SESSION['Faculty']))
{
  if(isset($_GET['success']) && !isset($_SESSION['Faculty']))
  {

    $_SESSION['GET']=$GetID=$_GET['success'];
    if($_SESSION['GET']==$_SESSION['StudentID']){

      $con=mysqli_connect("localhost","root","");

    if(!$con){
        echo 'Connect Error';
    }
    $sql="select * from student_data where Regno='".$GetID."'";
    mysqli_select_db($con,"student_management");
    $res=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($res))
    {    $Image=$row['Img'];
        
    }

      
    echo '
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav" >
        <li class="nav-item dropdown" style="margin-left:350px;">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="images/'.$Image.'" width="40" height="40" class="rounded-circle">
        </a>
        <div class="dropdown-menu "  aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="view.php?success='.$GetID.'">Dashboard</a>
          <form name="logout" action="logout.php" method="POST">
          <button class="dropdown-item btn btn-outline-primary" name="logout">Logout</button>
          </form>
        </div>
      </li>   
    </ul>
  </div>';
    }
    
  
    

  



}
else if(isset($_GET['edit']) && !isset($_SESSION['Faculty']))
{
  $_SESSION['GET']=$GetID=$_GET['edit'];
  if($_SESSION['GET']==$_SESSION['StudentID']){
    $con=mysqli_connect("localhost","root","");

    if(!$con){
        echo 'Connect Error';
    }
    $sql="select * from student_data where Regno='".$GetID."'";
    mysqli_select_db($con,"student_management");
    $res=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($res))
    {    $Image=$row['Img'];
        
    }
  echo '
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbar-list-4">
  <ul class="navbar-nav">
      <li class="nav-item dropdown" style="margin-left:350px;">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="images/'.$Image.'" width="40" height="40" class="rounded-circle">
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="view.php?success='.$GetID.'">Dashboard</a>
        <form name="logout" action="logout.php" method="POST">
        <button class="dropdown-item btn btn-outline-primary" name="logout">Logout</button>
        </form>
      </div>
    </li>   
  </ul>
</div>';
  }
}

else{
  echo ' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbar-list-4">
  <ul class="navbar-nav" style="margin-left:350px;">
  <li class="nav-item ml-5 mt-2">
<form action="logout.php" method="POST">
<button class="btn btn-outline-primary" name="logout">Logout</button>
</form></li>';
}

}
else
                        {
                            echo '  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbar-list-4">
                            <ul class="navbar-nav" style="margin-left:350px;">
                                    <!-- Navbar dropdown -->
                            <li class="nav-item dropdown" >
                              <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-expanded="false"
                              >
                                I\'m Student
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                    
                              </ul>
                            </li>
                             <!-- Navbar dropdown -->
                             <li class="nav-item dropdown" >
                              <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-expanded="false"
                              >
                                I\'m Faculty
                              </a>
                              <!-- Dropdown menu -->
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="faculty-login.php">Login</a></li>
                                <li><a class="dropdown-item" href="faculty-register.php">Register</a></li>
                    
                              </ul>
                            </li>';
                        }

                    ?>

      </ul>

    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->



