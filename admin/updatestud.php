<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <h2>Update student information</h2>
    <br><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Enter ID:</label>
            <input type="text" class="form-control" id="email" placeholder="ID" name="id" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $id= $_POST['id'];

    session_start();
    include '../dbconn.php';

    $qry= "SELECT * FROM `student` WHERE `id`='$id';";

    $run= mysqli_query($con,$qry);
    $row=mysqli_num_rows($run);
    if($row<1)
    {
        ?>
        <script>
            alert('This id does not exists!');
        </script>
        <?php
    }
    else
    {
        ?>

        <div class="container"><br>
            <h5> Update for id:<?php echo $id?> </h5>
        </div>

        <?php
        $_SESSION['data']= mysqli_fetch_assoc($run);
        $_SESSION['uid']= $id;
        ?>

        <div class="container">
            <br>
            <input type="button" value="Update basic info" onclick="window.open('updtstdform.php')">
            <input type="button" value="Add semester" onclick="window.open('addcourse.php')">
            <input type="button" value="Add or update CGPA" onclick="window.open('addsgpa.php')">
            <input type="button" value="Delete this student" onclick="window.open('deletestudent.php')">
        </div>

        <?php
    }

}

?>


