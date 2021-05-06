<?php
session_start();
if(isset($_SESSION['id']))
{
    echo "";
    $id=  $_SESSION['uid'];

}
else
{
    header('location:../login.php');
}
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <title>Student management system</title>
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <h4>Are you sure to delete the student of id <?php echo $id?>?<br>
    Enter 'yes' to confirm.</h4><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="id" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    include '../dbconn.php';
    $confirm= $_POST['id'];
    if($confirm=='yes')
    {
        $qry= "DELETE FROM `student` WHERE `id` = $id;";
        $qry2= "DELETE FROM `semester` WHERE `id` = $id;";
        $run= mysqli_query($con,$qry);
        $run2= mysqli_query($con,$qry2);
        if($run)
        {
            ?>
            <script>
                alert('Student deleted.!');
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert('Error!');
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert('Please enter "yes" to confirm.');
        </script>
        <?php
    }
}

?>















