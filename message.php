<?php

if(isset($_SESSION['error'])){  ?>

<div class="alert alert-danger">
    <?php echo $_SESSION['error'];
        unset($_SESSION['error']); 
        ?>
    <?php   
}

?>


    <?php

if(isset($_SESSION['success'])){  ?>

    <div class="alert alert-success">
        <?php echo $_SESSION['success'];
        unset($_SESSION['success']); 
        ?>
        <?php   
}

?>