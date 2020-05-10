<?php 

    require('db.php');
    // $_POST['val'];
    // $_POST['user_id'];
    $sql = mysqli_query($conn, "UPDATE tbl_user SET `status` = '".$_POST['val']."' WHERE id = '".$_POST['user_id']."'");
    if($sql) {
        // echo "Success";
        $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id= '".$_POST['user_id']."' ");
        $data = mysqli_fetch_assoc($query);
        echo $data['status'];
    }
?>