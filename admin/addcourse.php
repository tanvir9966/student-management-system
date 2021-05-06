<?php
session_start();
if(isset($_SESSION['id']))
{
    $id= $_SESSION['uid'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <h2>Add Semester for id: <?php echo $id?></h2><br>
    <form method="post">

        Select Semester
        <select name="sem">
            <?php
            $i=1;
            while ($i<=12):;  ?>
                <option value="<?php echo $i; ?>"><?php echo $i;
                $i++;
                ?></option>
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
    $sem= $_POST['sem'];

    include '../dbconn.php';
    $qry= "SELECT * FROM `semester` WHERE `id`='$id' AND `semester`=$sem;";
    $run= mysqli_query($con,$qry);
    $row=mysqli_num_rows($run);
    if($row>0)
    {
        ?>
        <script>
            alert('This semester already added!');
        </script>
        <?php
    }
    else
    {
        $qry2= "INSERT INTO `semester` (`srl`, `id`, `semester`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `cgpa`) VALUES (NULL, '$id', '$sem', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
        $run2= mysqli_query($con,$qry2);
        if($run2)
        {
            ?>
            <script>
                alert('Semester added!');
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

}
?>







