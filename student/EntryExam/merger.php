<?php

session_start();


$servername = "localhost";
$username = "BOB";
$password = "";
$dbname = "bob";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$var = $_POST['id'];
$var2 = $_POST['sid'];
$tempID = $_POST['tempID'];
//echo $var;
$_SESSION['Exam'] = $var;
$_SESSION['student'] = $var2;
$_SESSION['TempExamID'] = $tempID;
$finder = $_SESSION['account'];

$run = $_SESSION['Exam'];
$run2 = $_SESSION['student'];
$TempExamID = $_SESSION['TempExamID'];
if(!empty($tempID) && !empty($var2) && !empty($var) && isset($finder)){
    

$sql = "SELECT ExamID,Student FROM students WHERE ExamID=$var AND Student=$var2";
$fsql = $conn->query("SELECT `Account`,`fname`,`lname` FROM `users` WHERE `Account`='$finder'");
$chek = $fsql->fetch_assoc();
$sql1  = "INSERT INTO students (Student,ExamID,TEID) VALUES ('$var2','$var','$tempID')";
$rt = "SELECT ExamID FROM pre_data WHERE ExamID=$var";
$data1 = $conn->query($rt);
$fname = $chek['fname'];
$lname = $chek['lname'];
$_SESSION['ffname'] = $chek['fname'];
$_SESSION['llname'] = $chek['lname'];

if(1 == mysqli_num_rows($data1)){
    
$data = $conn->query($sql);
    
    if(1 == mysqli_num_rows($data)){
        echo "{$fname} {$lname} did the exam already!";
        require('ajaxEnd.php');
    }else{
        if($conn->query($sql1) == true){
            echo "Added Successfully!!"."<br/>";
            echo "<p>Access Granted!</p>";
            echo "Begin the Exam: <a href='exam.php'><input type='button' name='but' id='but' value='Start Exam' /></a>";
            
        }else{
            echo "Error Occured While Adding Please Refresh the Browser!";
            require('ajaxEnd.php');
        }  
    }
}else{
    echo "You cant Do an Exam That doesn't Exist!";
}
    
}else{
    echo "Please Fill Out All Fields!!";
}

?>