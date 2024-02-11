<?php
require_once "header.php";
require_once "connection.php";

$id=$_GET['id'];

$sql="SELECT * FROM users WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$userData=mysqli_fetch_assoc($result);
$language = explode(",",$userData['language']);

if(!empty($_POST)){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $gender =$_POST['gender'];
    $language = implode(",",$_POST['language']);
    $country=$_POST['country'];
    $sql="UPDATE users SET 
        name='$name',
        email='$email',
        address='$address',
        phone='$phone',
        gender='$gender',
        language='$language',
        country='$country'
        WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        $_SESSION['success'] = "Record updated successfully";
        header("Location: index.php");
    }else{
        $_SESSION['error'] = "Data not updated";
        header("Location: index.php");
    }

}
    
?>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <div class="form-group mb-2">
                <label for="name">Name</label>
                <input type="text" name="name" value="<?= $userData['name']; ?>" require class="form-control" id="name">
            </div>
            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="text" name="email" value="<?= $userData['email']; ?>" require class="form-control"
                    id="email">
            </div>
            <div class="form-group mb-2">
                <label for="address">Address</label>
                <input type="text" name="address" value="<?= $userData['address']; ?>" require class="form-control"
                    id="address">
            </div>
            <div class="form-group mb-2">
                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?= $userData['phone']; ?>" require class="form-control"
                    id="phone">
            </div>
            <div class="form-group mb-2">
                <label>Gender</label><br>
                <label> <input type="radio" <?=$userData['gender']=='male'? 'checked':''?> name="gender"
                        value="male">Male</label> &ensp;
                <label> <input type="radio" <?=$userData['gender']=='female'? 'checked':''?> name="gender"
                        value="female">Female</label> &ensp;
                <label> <input type="radio" <?=$userData['gender']=='other'? 'checked':''?> name="gender"
                        value="other">Other</label>

            </div>
            <div class="form-group mb-2">
                <label>Language</label><br>
                <label> <input type="checkbox" <?=in_array('nepali',$language) ? 'checked' : ""?> name="language[]"
                        value="nepali">Nepali</label> &ensp;
                <label> <input type="checkbox" <?=in_array('english',$language) ? 'checked' : ""?> name="language[]"
                        value="english">English</label>
                <label> <input type="checkbox" <?=in_array('hindi',$language) ? 'checked' : ""?> name="language[]"
                        value="hindi">Hindi</label>
            </div>
            <div class="form-group mb-3">
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control">
                    <option <?= $userData['country']=='nepal' ? 'selected' : ''?> value="nepal">Nepal</option>
                    <option <?= $userData['country']=='english' ? 'selected' : ''?> value="english">English</option>
                    <option <?= $userData['country']=='india' ? 'selected' : ''?> value="india">India</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-success"> Update Record</button>
            </div>
        </form>

    </div>

</div>



<?php
require_once "footer.php";
?>