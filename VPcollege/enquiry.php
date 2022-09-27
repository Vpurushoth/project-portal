<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone']; 
$altphone = $_POST['altphone'];
$location = $_POST['location'];
$clg = $_POST['clg'];

$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
    die('connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into enquiry(name,email,phone,altphone,location,clg) values(?,?,?,?,?,?)");
    $stmt->bind_param("ssiiss",$name,$email,$phone,$altphone,$location,$clg);
    $stmt->execute();
    header("Location: http://localhost/VPcollege/enqsuc.html");
    $stmt->close();
    $conn->close();
}
?>