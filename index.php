<?php
$conn = mysqli_connect('localhost', 'root', '', 'CRUD') or die('Database Connection Error');
$query = "select * from user";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous"> 
        <style>
            .focus
            {
                border-color: red;
            }
            i,th{
                color:#5cb85c;
            }
            .btn-group button{
                margin:2px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div id="load_popup_modal_show_id" class="modal fade" tabindex="-1" data-keyboard="false" data-backdrop="static"></div>
            <div class="row">
                <div class="col-md-4">
                    <center><h3 style="color:#5cb85c; margin-top: 30px"><b>Register Here</b></h3></center>
                    <form id="myform" onsubmit="return false;">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <button class="btn btn-large btn-block btn-success" id="register_btn" type="submit">Register</button>
                    </form>
                </div>
                <div class="col-md-8">
                    <center><h3 style="color:#5cb85c; margin-top: 30px"><b>All Records</b></h3></center>
                    <table id="my_table" class="table table-bordered" style="margin-top: 35px;">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['user_name']; ?></td>
                                        <td><?php echo $row['user_email']; ?></td>
                                        <td><?php echo $row['user_contact']; ?></td>
                                        <td><?php echo $row['user_password']; ?></td>
                                        <td style="width:15%; text-align: center;">
                                            <div class="btn-group">
                                                <button class="view_modal_popup" data-id="<?php echo'' . $row['user_id'] . ''; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                <button  class="update_modal_popup" data-id="<?php echo'' . $row['user_id'] . ''; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                <button class="delete_modal_popup" data-id="<?php echo'' . $row['user_id'] . ''; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
        <?php
    }
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
                        $('#myform').submit(function (e)
                        {
                            e.preventDefault();
                            var name = $('#name').val();
                            var email = $('#email').val();
                            var contact = $('#contact').val();
                            var pwd = $('#pwd').val();
                            if (name === '' && email === '' && contact === '' && pwd === '')
                            {
                                $('#name').attr("placeholder", "Please Enter your name");
                                $('#name').addClass('focus');
                                $('#email').attr("placeholder", "Please Enter your email-id");
                                $('#email').addClass('focus');
                                $('#contact').attr("placeholder", "Please Enter your contact no");
                                $('#contact').addClass('focus');
                                $('#pwd').attr("placeholder", "Please Enter your desired password");
                                $('#pwd').addClass('focus');
                            }
                            if (name === '')
                            {
                                $('#name').attr("placeholder", "Please Enter your name");
                                $('#name').addClass('focus');
                            } else if (email === '')
                            {
                                $('#email').attr("placeholder", "Please Enter your email-id");
                                $('#email').addClass('focus');
                            } else if (contact === '')
                            {
                                $('#contact').attr("placeholder", "Please Enter your contact no");
                                $('#contact').addClass('focus');
                            } else if (pwd === '')
                            {
                                $('#pwd').attr("placeholder", "Please Enter your desired password");
                                $('#pwd').addClass('focus');
                            } else
                            {
                                $.ajax(
                                        {
                                            type: 'POST',
                                            url: "handler.php",
                                            data: $('#myform').serialize(),
                                            success: function (data)
                                            {
                                                var data = data.split(".");
                                                if (data.length > 0)
                                                {
                                                    if (data[1] === 'SUCCESS')
                                                    {
                                                        var new_row = "<tr>" +
                                                                "<td>" + data[0] + "</td>" +
                                                                "<td>" + name + "</td>" +
                                                                "<td>" + email + "</td>" +
                                                                "<td>" + contact + "</td>" +
                                                                "<td>" + pwd + "</td>" +
                                                                "<td style='width:15%; text-align: center;'>" +
                                                                "<div class='btn-group'>" +
                                                                "<button id='click_to_load_modal_popup'><i class='fa fa-eye' aria-hidden='true'></i></button>" +
                                                                "<button><i class='fa fa-pencil' aria-hidden='true'></i></button>" +
                                                                "<button><i class='fa fa-trash' aria-hidden='true'></i></button>" +
                                                                "</div>" +
                                                                "</td>" +
                                                                "</tr>";
                                                        $('#my_table tbody').append(new_row);
                                                        $('#myform')[0].reset();
                                                        $('#name').focus();
                                                    }
                                                } else
                                                {
                                                    alert('Server is Down');
                                                }
                                            },
                                            error: function (xhr, request, error) {
                                                console.log(arguments + error);
                                                alert(xhr.responseText + " Can't do because: " + error);
                                            }
                                        });
                            }
                        });
                        $(document).ready(function ()
                        {
                            var $modal = $('#load_popup_modal_show_id');
                            //view modal
                            $('.view_modal_popup').on('click', function ()
                            {
                                var user_id = $(this).attr('data-id');
                                $modal.load('view_modal.php?user_id=' + user_id,
                                        function ()
                                        {
                                            $modal.modal('show');
                                        });
                            });

                            //update modal
                            $('.update_modal_popup').on('click', function ()
                            {
                                var user_id = $(this).attr('data-id');
                                $modal.load('update_modal.php?user_id=' + user_id,
                                        function ()
                                        {
                                            $modal.modal('show');
                                        });
                            });
                            //delete modal
                            $('.delete_modal_popup').on('click', function ()
                            {
                                var user_id = $(this).attr('data-id');
                                $modal.load('delete_modal.php?user_id=' + user_id,
                                        function ()
                                        {
                                            $modal.modal('show');
                                        });
                            });
                        });

        </script>
    </body>
</html>
