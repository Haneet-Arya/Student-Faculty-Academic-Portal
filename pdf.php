<?php session_start(); ?>
<?php
//require('fpdf/fpdf.php');
require_once('Includes/connection.php');
require('fpdf/WriteHtml.php');
if(isset($_SESSION['StudentID'])){
    
    $reg=$_SESSION['StudentID'];
    
    
    $fid=$_GET['Faculty'];
    //echo "$reg"." $fid";
    mysqli_select_db($con,"student_management");
    $sqlm="SELECT * FROM student_data WHERE Regno='$reg'";
    $res=mysqli_query($con,$sqlm);
    while($row=mysqli_fetch_assoc($res)){
        $branch=$row['Branch'];
        $name=$row['FName']." ".$row['LName'];

    }
    $sqlf="SELECT * FROM faculty_data WHERE FacultyID='$fid'";
    $res=mysqli_query($con,$sqlf);
    while($row=mysqli_fetch_assoc($res)){
        
        $fname=$row['FacultyName'];

    }
    //echo $fname;
}
else if(isset($_SESSION['Faculty'])){
$name=$_POST['sname'];
$fname=$_POST['fname'];
$branch=$_POST['branch'];
$fid=$_POST['fid'];
$reg=$_POST['reg'];
mysqli_select_db($con,"student_management");
$sql="INSERT INTO lor (Regno,FacultyID) VALUES ('$reg','$fid') ";
mysqli_query($con,$sql);
}
$pdf=new PDF_HTML();
$pdf->AliasNbPages();

$pdf -> AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->SetTitle('Letter Of Recomendation');



$pdf->Cell(190, 266, "", 1, 0, 'C');
$pdf->Image('images/vitlogo.png',70,20,70);
$LOR="<body>
<br><br><br><br><br><br><br><br><br><br>
<table style='width:100%;padding:30px;border: 1px solid black;'>
<tr>
<th align='center'><br><br><h1 ><i>                             <b><u>Letter Of Recomendation</u></b></i></h1></th>
</tr>";
$pdf->WriteHTML($LOR);
$pdf->SetFont('Arial','i',14);
$rest="
<tr>
<td align='center'><br><br><br>To who so ever it may concern I <i><b>Dr. $fname</b> </i>recomend <i><b> $name </i></b> from VIT Vellore currently pursuing his/her bachelors degree in <i><b> $branch </i></b> discipline has proven himself/herself time and again showing that they can work under pressure. He/She has shown commendable leadership qualities alongside exceptional time management skills. <i><b>$name</i></b> has my enthusiastic recommendation. He/She is a kind, compassionate, intelligent, and strong person who has a clear sense of direction and purpose.I am confident  that  he/she  will  bring  the  same  warmth,  support,  insight,  and  hard  work  to  all  her/his  future  endeavors . I  wish  him/her  all  the  very  best  and  request  you  to  overcome  your  hesitation contact me for any further information. 
</tr>
<tr>
<td>
<br>
<br>
<br><br><br>
<br>
<br><br><br>
<br>
<br><br>
<br>
      
    <b>________________</b>                                                 <b>________________</b>                                                   <br>             <i> <b>Chancellor Of VIT</b></i>                                                 <i><b>    Dr. $fname</b></i>
</td>
</tr>
</table>";

$pdf->WriteHTML("<br>$rest");
$pdf->Output();
?>