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
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">

</head>
<body>

<?php
$id= $_SESSION['uid'];
$data=$_SESSION['data'];
?>

<div class="container">
    <h2>Show student information</h2>
    <br><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Department:</label>
            <input type="text" class="form-control" name="Department" value="<?php echo $data['department']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Section:</label>
            <input type="text" class="form-control" name="sec" value="<?php echo $data['sec']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Phone:</label>
            <input type="number" class="form-control" name="Phone" value="<?php echo $data['phone']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Address:</label>
            <textarea name="address" class="form-control" required><?php echo $data['address']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="email">Image:</label>
            <input type="file" class="form-control" name="img" required>
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
    $name= $_POST['name'];
    $department= $_POST['Department'];
    $section= $_POST['sec'];
    $phone= $_POST['Phone'];
    $address= $_POST['address'];
    $img= $_FILES['img']['name'];
    $tempname= $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$img");

    $qry="UPDATE `student` SET `name` = '$name',
        `department` = '$department', `sec` = '$section', `phone` = '$phone', `address`
        = '$address', `image` = '$img' WHERE `student`.`id` =
        '$id';";
    $run=mysqli_query($con,$qry);
    if($run)
    {
        ?>

        <script>
            alert('Student updated successfully!');
            window.open('updatestud.php','_self');
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
?>









