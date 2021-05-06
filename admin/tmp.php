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
<?php
include ('header.php');
?>

<div class="admintitle">
    <a href="../index.php" style="float: left; color: #fff; margin-right: 30px">Home page</a>
    <h4><a href="logout.php" style="float: right; color: #fff; margin-right: 30px">Logout</a></h4>
    <h1>Welcome to admin dashboard</h1>
</div>
<div class="dashboard">
    <table width="50%;" align="center">
        <tr>
            <td>1.</td><td><a href="addstudent.php">Add new student</a></td>
        </tr>
        <tr>
            <td>2.</td><td><a href="updatestud.php">Update student info</a></td>
        </tr>
        <tr>
            <td>3.</td><td><a href="deletestudent.php">Delete student</a></td>
        </tr>
        <tr>
            <td>4.</td><td><a href="addcourse.php">Add student semister & course</a></td>
        </tr>
        <tr>
            <td>5.</td><td><a href="addsgpa.php">Add or update SGPA</a></td>
        </tr>
        <tr>
            <td>6.</td><td><a href="updatecourse.php">Update course</a></td>
        </tr>
    </table>
</div>

</body>
</html>
