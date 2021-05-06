<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <h2>Show student information</h2>
    <br><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Enter ID:</label>
            <input type="text" class="form-control" id="email" placeholder="ID" name="id">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
    session_start();
    include 'dbconn.php';
    $id= $_POST['id'];

    $qry= "SELECT * FROM `student` WHERE `id`='$id';";

    $run= mysqli_query($con,$qry);
    $row=mysqli_num_rows($run);
    if($row>0)
    {
        $_SESSION['data']= mysqli_fetch_assoc($run);
        $_SESSION['id_cr']= $id;
        ?>

        <div class="container">
            <br>
            <input type="button" value="Show Basic Info" onclick="window.open('basicinfo.php')">
            <input type="button" value="Show Courses" onclick="window.open('showcourse.php')">
            <input type="button" value="Show Result" onclick="window.open('showresult.php')">
        </div>

        <?php
    }
    else
    {
        ?>
        <script>
            alert('This id does not exists!');
        </script>
        <?php
    }

}

?>


