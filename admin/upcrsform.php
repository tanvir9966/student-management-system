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

<?php
$data=$_SESSION['crsdata'];
?>

<div class="container">
    <h2>Update Course</h2>
    <form method="post" action="upcrsform.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Course 1:</label>
            <input type="text" class="form-control" name="c1" value="<?php echo $data['course1'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 1:</label>
            <input type="number" class="form-control" name="cr1" value="<?php echo $data['credit1'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Course 2:</label>
            <input type="text" class="form-control" name="c2" value="<?php echo $data['course2'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 2:</label>
            <input type="number" class="form-control" name="cr2" value="<?php echo $data['credit2'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Course 3:</label>
            <input type="text" class="form-control" name="c3" value="<?php echo $data['course3'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 3:</label>
            <input type="number" class="form-control" name="cr3" value="<?php echo $data['credit3'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Course 4:</label>
            <input type="text" class="form-control" name="c4" value="<?php echo $data['course4'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 4:</label>
            <input type="number" class="form-control" name="cr4" value="<?php echo $data['credit4'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Course 5:</label>
            <input type="text" class="form-control" name="c5" value="<?php echo $data['course5'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Credit 5:</label>
            <input type="number" class="form-control" name="cr5" value="<?php echo $data['credit5'] ?>" required>
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
    $id= $_SESSION['ec'];
    $sem= $_SESSION['sem'];
    $c[1]=$_POST['c1'];
    $c[]=$_POST['c2'];
    $c[]=$_POST['c3'];
    $c[]=$_POST['c4'];
    $c[]=$_POST['c5'];
    $cr[1]=$_POST['cr1'];
    $cr[]=$_POST['cr2'];
    $cr[]=$_POST['cr3'];
    $cr[]=$_POST['cr4'];
    $cr[]=$_POST['cr5'];

    $qry= "UPDATE `course` SET `course1` = '$c[1]', `credit1` = '$cr[1]',
    `course2` = '$c[2]', `credit2` = '$cr[2]', `course3` = '$c[3]',
    `credit3` = '$cr[3]', `course4` = '$c[4]', `credit4` = '$cr[4]',
    `course5` = '$c[5]', `credit5` = '$cr[5]' WHERE `course`.`id` = '$id'
    AND `course`.`semister`='$sem';";
    $run= mysqli_query($con,$qry);

    if($run)
    {

        ?>

        <script>
            alert('Courses updated');
            window.open('updatecourse.php','_self');
        </script>

        <?php
    }
    else
    {
        ?>

        <script>
            alert('error');
        </script>

        <?php
    }
}
?>







