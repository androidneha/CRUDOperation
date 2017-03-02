<?php

$user_id = $_POST["user_id"];
$con = mysqli_connect('localhost', 'root', '', 'CRUD');
$sql = "DELETE FROM user WHERE user_id=$user_id";
$result = mysqli_query($con, $sql);
if ($con->query($sql) === TRUE) {
    echo 'Deleted Successfully';
} else {
    echo 'not deleted' . $con->error;
}
mysqli_close($con);

