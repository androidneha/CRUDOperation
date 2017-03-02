<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if (isset($_POST['name']) || isset($_POST['email']) || isset($_POST['contact']) || isset($_POST['pwd'])) 
    {
        if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['contact']) || !empty($_POST['pwd'])) 
        {
            $name=$_POST['name'];
            $email=$_POST['email']; 
            $contact=$_POST['contact'];
            $pwd=$_POST['pwd'];
            $con= mysqli_connect('localhost', 'root', '', 'CRUD');
            $result= mysqli_query($con,"insert into user set user_name='$name',user_email='$email',user_contact='$contact',user_password='$pwd'");
            $query="select user_id from user where user_email='$email' and user_password='$pwd'";
            $result=mysqli_query($con, $query);
            if(mysqli_num_rows($result)>0)
            {
                while($row= mysqli_fetch_array($result))
                {
                    echo $row['user_id'].".SUCCESS";
                }
            }
            else
            {
                echo 'error';
            }
        }
        else 
        {
            echo 'Some Fields are Empty';
        }
    } 
    else 
    {
        echo 'Some Fields are not Set';
    }
}
