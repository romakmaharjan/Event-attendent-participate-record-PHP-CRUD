<?php
require_once "connection.php";
if(!empty($_GET['id'])){
    $id=$_GET['id'];
    if(!filter_var($id,FILTER_VALIDATE_INT)){
        $_SESSION['error'] = "Invalid id";
        header("Location: index.php");
    }else{
        $sql="DELETE FROM users WHERE id='$id'";
        if(mysqli_query($conn,$sql)){
            $_SESSION['success'] = "Record deleted successfully";
            header("Location: index.php");
        }else{
            $_SESSION['error'] = "Data not deleted";
            header("Location: index.php");
        }
    }
    
   

}else{
   $_SESSION['error'] = "Invalid request";
   header("Location: index.php");
}