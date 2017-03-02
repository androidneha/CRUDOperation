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
        <div class="modal-content">
            <div class="modal-header" style="padding:0px ;background-color:#5cb85c" >
                <button type="button" class="close" data-dismiss="modal" style="margin:10px; color: #FFFFFF">&times;</button>
                <h4 class="modal-title" style="margin:10px; color: #FFFFFF">Welcome <?php echo $name; ?></h4>
            </div>
            <div id="validation-error"></div>
            <div class="cl"></div>
            <div class="modal-body">
                <form role="form" class="form-inline"  id="form_load_content_id">
                    <table class="table table-bordered">
                        <tr class="hidden">
                            <td>Id</td>
                            <td><input class="form-control" type="hidden" id="updated_user_id" name="updated_user_id" value="<?php echo $user_id ?>" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input class="form-control" type="text" id="updated_user_name" name="updated_user_name" value="<?php echo $name ?>" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input class="form-control" type="text" id="updated_user_email" name="updated_user_email" value="<?php echo $email ?>" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td><input class="form-control" type="text" id="updated_user_contact" name="updated_user_contact" value="<?php echo $contact ?>" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input class="form-control" type="text" id="updated_user_password" name="updated_user_password" value="<?php echo $password ?>" style="width: 100%"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #000; color: #fff">Close</button>
                <button type="button" class="btn btn-custom-light" id="update_record" style="background-color: #5cb85c; color: #fff" onclick="update();" >Update</button>

            </div>
        </div>
    </div>
</div>
<script>
    function update()
    {
        $.ajax(
                {
                    type: 'POST',
                    url: "update_record.php",
                    data: 'user_id=' + $('#updated_user_id').val() + '&updated_user_name=' + $('#updated_user_name').val() +
                            '&updated_user_email=' + $('#updated_user_email').val() +
                            '&updated_user_contact=' + $('#updated_user_contact').val() +
                            '&updated_user_password=' + $('#updated_user_password').val(),
                    success: function (data)
                    {
                        alert(data);
                        location.reload();
                    },
                    error: function (xhr, request, error) {
                        console.log(arguments + error);
                        alert(xhr.responseText + " Can't do because: " + error);
                    }
                });
    }
</script>


