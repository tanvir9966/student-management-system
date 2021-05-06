<?php
session_start();
if(isset($_SESSION['id']))
{
    $id= $_SESSION['uid'];
    include '../dbconn.php';
    $qry= "SELECT * FROM `semester` WHERE `id`='$id';";
    $run= mysqli_query($con,$qry);
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
    <h2>Add SGPA for <?php echo $id?></h2><br>
    <form method="post">

        Select Semester
        <select name="sem">
            <?php while ($data=mysqli_fetch_array($run)):;  ?>
                <option value="<?php echo $data[2]; ?>"><?php echo $data[2]; ?></option>
            <?php endwhile; ?>
        </select>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $_SESSION['sem']= $_POST['sem'];
    header("Location: sgpaform.php");

}