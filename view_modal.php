<?php
$user_id = $_GET['user_id'];
$con = mysqli_connect('localhost', 'root', '', 'CRUD');
$query = "select * from user where user_id='$user_id'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['user_id'];
        $name = $row['user_name'];
        $email = $row['user_email'];
        $contact = $row['user_contact'];
        $password = $row['user_password'];
    }
}
?>
<div id="load_popup_modal_contant" class="" role="dialog">
    <div class="modal-dialog modal-md">
<?php ?>
        <form role="form" class="form-inline" role="form" id="form_load_content_id">
            <div class="modal-content">
                <div class="modal-header" style="padding:0px ;background-color:#5cb85c" >
                    <button type="button" class="close" data-dismiss="modal" style="margin:10px; color: #FFFFFF">&times;</button>
                    <h4 class="modal-title" style="margin:10px; color: #FFFFFF">Welcome <?php echo $name; ?></h4>
                </div>
                <div id="validation-error"></div>
                <div class="cl"></div>
                <div class="modal-body">

                    <b>Name : </b><span><?php echo $name; ?></span><br>
                    <b>Email Id : </b><span><?php echo $email; ?></span><br>
                    <b>Contact No : </b><span><?php echo $contact; ?></span><br>
                    <b>Password : </b><span><?php echo $password; ?></span><br>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
    </div>
</div>
<?php
mysqli_close($con);
?>


