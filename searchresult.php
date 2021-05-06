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
    <h2>Result by Section</h2>
    <br><br>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
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
        </div>
        <div class="form-group">
            <label for="email">Department:</label>
            <input type="text" name="dep" class="form-control" placeholder="Enter Department" required>
        </div>
        <div class="form-group">
            <label for="email">Section:</label>
            <input type="text" name="sec" class="form-control" placeholder="Your section" required>
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
    $sec= $_POST['sec'];
    $sem= $_POST['sem'];
    $dep= $_POST['dep'];

    $qry= "SELECT * FROM semester, student WHERE
    semester.id=student.id and semester.semester='$sem' AND
    student.sec='$sec' AND student.department='$dep';";
    $run= mysqli_query($con,$qry);
    $row= mysqli_num_rows($run);
    if($sem==1)
        $i=4;
    elseif ($sem==2)
        $i=6;
    elseif ($sem==3)
        $i=6;
    elseif ($sem==4)
        $i=6;
    elseif ($sem==5)
        $i=5;
    elseif ($sem==6)
        $i=5;
    elseif ($sem==7)
        $i=5;
    elseif ($sem==8)
        $i=5;
    elseif ($sem==9)
        $i=5;
    elseif ($sem==10)
        $i=6;
    elseif ($sem==11)
        $i=5;
    elseif ($sem==12)
        $i=3;
    $num=1;
    if($row<1)
    {
        echo "<h1 align='center'>No data found!</h1>";
    }

    else
    {
        echo "<h2 align='center' style='margin-top: 50px;'>Result of: Department-
        $dep, semester- $sem, Section- $sec</h2>";
        while ($data=mysqli_fetch_assoc($run))
        {
            ?><br>

            <div class="container">
                <table class="table table-striped">
                    <tr>
                        <th> Name: <?php echo $data['name']; ?> </th>
                        <th> ID: <?php echo $data['id']; ?> </th>
                    </tr>
                    <?php

                    if($num<=$i)
                    {
                        ?>
                        <tr>
                            <th>Course1</th>
                            <td> <?php echo $data['p1']; ?> </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    if($num<=$i)
                    {
                        ?>
                        <tr>
                            <th>Course2</th>
                            <td> <?php echo $data['p2']; ?> </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    if($num<=$i)
                    {
                        ?>
                        <tr>
                            <th>Course3</th>
                            <td> <?php echo $data['p3']; ?> </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    if($num<=$i)
                    {
                        ?>
                        <tr>
                            <th>Course4</th>
                            <td> <?php echo $data['p4']; ?> </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    if($num<=$i)
                    {
                        ?>
                        <tr>
                            <th>Course5</th>
                            <td> <?php echo $data['p5']; ?> </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    if($num<=$i)
                    {
                        ?>
                        <tr>
                            <th>Course6</th>
                            <td> <?php echo $data['p6']; ?> </td>
                        </tr>
                        <?php
                        $num++;
                    }
                    ?>
                    <tr>
                        <th>CGPA</th>
                        <td> <?php echo $data['cgpa']; ?> </td>
                    </tr>
                </table>
            </div>

            <?php
            $num=1;
        }
    }

}

?>