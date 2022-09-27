<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$idno = $_POST['idno'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];
$pswd1 = $_POST['pswd1'];
$phno = $_POST['phno'];
$phno1 = $_POST['phno1'];
$course = $_POST['course']; 
$address = $_POST['address'];
$dob = $_POST['dob'];


if (!empty($fname) || !empty($lname) || !empty($idno) || !empty($email) || !empty($pswd) || !empty($pswd1) || !empty($phno) || !empty($phno1)|| !empty($course) || !empty($address) || !empty($dob) )
{

$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
    die('connection Failed: '.$conn->connect_error);
}

else{
    $SELECT = "SELECT email From signup Where email = ? Limit 1";
    $INSERT = "insert into signup(fname,lname,idno,email,pswd,pswd1,phno,phno1,course,address,dob) values(?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

     if ($rnum==0) {
     $stmt->close();
     $stmt = $conn->prepare($INSERT);
     $stmt->bind_param("ssisssiisss",$fname,$lname,$idno,$email,$pswd,$pswd1,$phno,$phno1,$course,$address,$dob);
     $stmt->execute();
     ;
    } else {
     echo "Someone already register using this email";
    }
    $stmt->close();
    $conn->close();
   }
} else {
echo "All field are required"; 
die();
}

?>