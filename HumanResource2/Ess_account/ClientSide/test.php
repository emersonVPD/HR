<html>
<head>
<title>
</title>

</head>
<body>
<?php

    include "../Query/connection.php";

    if(isset($_POST['changePass']))
    {

        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $con_password = md5($_POST['con_password']);

    $chg_pwd=mysql_query($conn,"SELECT * FROM essaccountstbl WHERE id='1'");
    $chg_pwd1=mysql_fetch_array($chg_pwd);
    $data_pwd=$chg_pwd1['password'];

    if($data_pwd == $old_password)
    {
    if($new_password == $con_password)
    {
    $update_pwd=mysql_query("UPDATE essaccountstbl set password='$new_password' where id='1'");
                    echo "<script>alert('UPDATE SUCCESS');</script>";
            echo '<script>window.history.back();</script>';
    }
    else
    {
                    echo "<script>alert('NEW AND RETYPE NOT EQUAL');</script>";
            echo '<script>window.history.back();</script>';
        }
    }
        else
        {
           echo "<script>alert('OLD PASS WRONG');</script>";
            echo '<script>window.history.back();</script>';
        }
    }


?>
<form action="" method="post">
Current Password<input type="password"  name="curpass"><br>
New Password<input type="password" id="newpass" name="newpass"><br>
Confirm Password<input type="password" id="conpass" name="conpass"><br>

<input type="submit" value="Change">

</form>
</body>
</html>