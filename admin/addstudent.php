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

<div class="container">
    <h2>Add new student</h2>
    <br><br>
    <form method="post" action="addstudent.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">ID:</label>
            <input type="text" class="form-control" name="id" placeholder="Enter ID" required>
        </div>
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label for="email">Department:</label>
            <input type="text" class="form-control" name="Department" placeholder="Department" required>
        </div>
        <div class="form-group">
            <label for="email">Section:</label>
            <input type="text" class="form-control" name="sec" placeholder="Section" required>
        </div>
        <div class="form-group">
            <label for="email">Number:</label>
            <input type="number" class="form-control" name="Phone" placeholder="Number" required>
        </div>
        <div class="form-group">
            <label for="email">Address:</label>
            <textarea placeholder="Enter your address" class="form-control" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="email">Photo:</label>
            <input type="file" class="form-control" name="img" required> </td>
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
    $name= $_POST['name'];
    $department= $_POST['Department'];
    $section= $_POST['sec'];
    $phone= $_POST['Phone'];
    $address= $_POST['address'];
    $img= $_FILES['img']['name'];
    $tempname= $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname,"../dataimg/$img");
    $qry2="SELECT * FROM `student` WHERE `id`='$id';";
    $run2=mysqli_query($con,$qry2);
    $row=mysqli_num_rows($run2);
    if($row<1)
    {
        $qry="INSERT INTO `student` (`id`, `name`, `department`,
        `sec`, `phone`, `address`, `image`) VALUES ('$id', '$name', '$department',
        '$section', '$phone', '$address', '$img');";
        $run=mysqli_query($con,$qry);
        if($run)
        {
            ?>

            <script>
                alert('Student added successfully!');
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
            alert('This student already added!');
        </script>

        <?php
    }
}
?>
