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
    <h2>Show Result</h2>
    <br><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Enter ID:</label>
            <input type="text" name="id" class="form-control" placeholder="Enter ID" required>
        </div>
        <div class="form-group">
            <label for="email">Semester:</label>
            <input type="text" class="form-control" name="sem" placeholder="Semester" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
    include 'dbconn.php';
    $id= $_POST['id'];
    $sem= $_POST['sem'];
    $qry2= "SELECT * FROM `student` WHERE `id`='$id';";
    $run2=mysqli_query($con,$qry2);
    $chkid= mysqli_num_rows($run2);
    if($chkid<1)
    {
        ?>
        <script>
            alert('This id does not exists!');
        </script>
        <?php
    }
    else
    {
        $qry= "SELECT * FROM `course` WHERE
        `id`='$id' AND `semister`='$sem';";

        $run= mysqli_query($con,$qry);
        $row= mysqli_num_rows($run);
        if ($row<1)
        {
            ?>
            <script>
                alert('This id does not have this semister!');
            </script>
            <?php
        }
        else
        {
            $data=mysqli_fetch_assoc($run);
            if($data['sgpa']==NULL)
            {
                ?>
                <script>
                    alert('Result have not published for this semister.');
                </script>
                <?php
            }
            else
            {
                echo "<h2 align='center' style='margin-top: 50px;'>Result of: ID- $id, semister- $sem</h2>";
                ?>

                <div class="container">
                    <h2>Striped Rows</h2>
                    <p>The .table-striped class adds zebra-stripes to a table:</p>
                    <table class="table table-striped">
                        <tr>
                            <th colspan="2"> Result </th>
                        </tr>
                        <tr>
                            <th>Course1</th>
                            <td> <?php echo $data['p1']; ?> </td>
                        </tr>
                        <tr>
                            <th>Course2</th>
                            <td> <?php echo $data['p2']; ?> </td>
                        </tr>
                        <tr>
                            <th>Course3</th>
                            <td> <?php echo $data['p3']; ?> </td>
                        </tr>
                        <tr>
                            <th>Course4</th>
                            <td> <?php echo $data['p4']; ?> </td>
                        </tr>
                        <tr>
                            <th>Course5</th>
                            <td> <?php echo $data['p5']; ?> </td>
                        </tr>
                        <tr>
                            <th>SGPA</th>
                            <td> <?php echo $data['sgpa']; ?> </td>
                        </tr>
                    </table>
                </div>

                <?php
            }
        }
    }
}

?>