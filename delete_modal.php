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
                <table class="table table-bordered">
                    <tr class="hidden">
                        <td>Id</td>
                        <td><input class="form-control" type="hidden" id="updated_user_id" name="updated_user_id" value="<?php echo $user_id ?>" style="width: 100%"></td>
                    </tr>
                </table>
                <h4>Are You Sure You Want to Delete this Record with name '<?php echo $name ?>'?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #000; color: #fff">Close</button>
                <button type="button" class="btn btn-custom-light" id="delete_record" style="background-color: #FF0000; color: #fff" onclick="delete_fun();" >DELETE</button>  
            </div>
        </div>
    </div>
</div>
<script>
    function delete_fun()
    {
        $.ajax(
                {
                    type: 'POST',
                    url: "delete_record.php",
                    data: 'user_id=' + $('#updated_user_id').val(),
                    success: function (data)
                    {
                        alert(data);
                        location.reload();
                    },
                    error: function (xhr, request, error) {
                        console.log(arguments + error);
                        alert(xhr.responseText + " Can't delete because: " + error);
                    }
                });
    }
</script>


