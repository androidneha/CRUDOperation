<?php

$user_id = $_POST["user_id"];
$updated_user_name = $_POST["updated_user_name"];
$updated_user_email = $_POST["updated_user_email"];
$updated_user_contact = $_POST["updated_user_contact"];
$updated_user_password = $_POST["updated_user_password"];
//echo $updated_user_name."/".$updated_user_contact."/".$updated_user_email."/".$updated_user_password."/".$user_id;

$con = mysqli_connect('localhost', 'root', '', 'CRUD');
/* @var $updated_user_email type */
$sql = "UPDATE user SET user_name='$updated_user_name', user_email='$updated_user_email',user_contact='$updated_user_contact' , user_password='$updated_user_password' WHERE user_id='$user_id'";
$result = mysqli_query($con, $sql);
if ($con->query($sql) === TRUE) {
    echo 'successfully updated';
} else {
    echo 'not updated' . $con->error;
}
mysqli_close($con);
