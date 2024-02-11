<?php
require_once "connection.php";
if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $gender =$_POST['gender'];
    $language = implode(",",$_POST['language']);
    $country=$_POST['country'];
    
    $sql="INSERT INTO users(name,email,address,phone,gender,langauge,country)
    VALUES('$name','$email','$address','$phone','$gender','$language','$country')";
    if(mysqli_query($conn,$sql)){
        $_SESSION['success'] = "Record inserted successfully";
        header("Location: index.php");
    }else{
        $_SESSION['error'] = "Data not inserted";
        header("Location: index.php");
    }

}else{
   $_SESSION['error'] = "Invalid request";
   header("Location: index.php");
}