<?php
session_start();
if(isset($_SESSION['id']))
{
    echo "";
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
    <h2>Update course</h2><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">ID:</label>
            <input type="text" class="form-control" name="id" placeholder="Enter ID" required>
        </div>
        <div class="form-group">
            <label for="email">Semester:</label>
            <input type="text" class="form-control" name="sem" placeholder="Your semister" required>
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
    $id= $_POST['id'];
    $sem= $_POST['sem'];

    $qry2="SELECT * FROM `student` WHERE `id`='$id';";
    $run2=mysqli_query($con,$qry2);
    $chkid=mysqli_num_rows($run2);
    if($chkid<1)
    {
        ?>

        <script>
            alert('This student id does not exist.');
            window.open('updatecourse.php','_self');
        </script>

        <?php
    }
    else
    {
        $qry3="SELECT * FROM `course` WHERE `id`='$id' AND `semister`='$sem';";
        $run3= mysqli_query($con,$qry3);
        $row=mysqli_num_rows($run3);
        if($row<1)
        {
            ?>
            <script>
                alert('This id does not have this semister!');
                window.open('updatecourse.php','_self');
            </script>
            <?php
        }
        else
        {
            $data=mysqli_fetch_assoc($run3);
            $_SESSION['ec']=$id;
            $_SESSION['sem']=$sem;
            $_SESSION['crsdata']=$data;
            ?>
            <script>
                window.open('upcrsform.php','_self');
            </script>

            <?php
        }
    }

}

?>











