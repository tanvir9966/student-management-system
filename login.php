<?php
session_start();

if(isset($_SESSION['id']))
{
    header('location:admin/admindash.php');
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Login</title>
</head>

<body>

    <h1 align="center">Admin Login</h1>

    <div class="container">
        <form action="login.php" method="post">
            <label for="email">Username:</label>
            <input type="text" class="form-control" name="uname" required>
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="pass" required>

            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>
</html>

<?php

include 'dbconn.php';
if(isset($_POST['login']))
{
    $username= $_POST['uname'];
    $password= $_POST['pass'];

    $qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password';";
    $run= mysqli_query($con, $qry);
    $row= mysqli_num_rows($run);
    if($row<1)
    {
        ?>
        <script>
            alert('Username or password not match');
            window.open('login.php','_self');
        </script>
        <?php
    }
 else {
        $data= mysqli_fetch_assoc($run);
        $id= $data['id'];
        $_SESSION['id'] = $id;
        header('location:admin/admindash.php');
    }


}

?>
