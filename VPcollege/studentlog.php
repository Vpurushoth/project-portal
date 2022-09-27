<?php


$fname = $_POST['fname'];
$pswd = $_POST['pswd']; 

$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
    die('connection Failed: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("select * from signup where fname = ?");
    $stmt->bind_param("s",$fname,);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    if($stmt_result->num_rows>0)
    {
      $data=$stmt_result->fetch_assoc();
      
      if($data['pswd'] === $pswd )
      {
         header("Location: http://localhost/VPcollege/pro-profile.html");  
      }
      else
      {
         echo "<h2>Invalid UserName or Password</h2>";
      }
    }
    else
    {
      echo "<h2>Invalid UserName or Password</h2>";
    }
}
?> 
        
        
        
        
        
