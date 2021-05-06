<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

</head>
<body>

<?php

    session_start();
    $id= $_SESSION['id_cr'];
    include 'dbconn.php';
    $qry= "SELECT * FROM `semester` WHERE `id`='$id';";
    $run= mysqli_query($con,$qry);

?>

<div class="container">
    <h2>Show Courses</h2>
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
    $sem= $_POST['sem'];
    $qry2= "SELECT * FROM `courses` WHERE `semester`='$sem';";
    $run2= mysqli_query($con,$qry2);
    $data2=mysqli_fetch_assoc($run2);
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
    ?>

    <div class="container">
        <table class="table table-striped">
            <tr>
                <th colspan="4"> <h4 align="center"> Courses and credits </h4> </th>
            </tr>
            <?php
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 1</th>
                    <td> <?php echo $data2['c1']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr1']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 2</th>
                    <td> <?php echo $data2['c2']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr2']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 3</th>
                    <td> <?php echo $data2['c3']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr3']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 4</th>
                    <td> <?php echo $data2['c4']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr4']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 5</th>
                    <td> <?php echo $data2['c5']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr5']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 6</th>
                    <td> <?php echo $data2['c6']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr6']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            if($num<=$i)
            {

                ?>
                <tr>
                    <th>Course 7</th>
                    <td> <?php echo $data2['c7']; ?> </td>
                    <th>Credit</th>
                    <td> <?php echo $data2['cr7']; ?> </td>
                </tr>
                <?php
                $num++;
            }
            ?>
        </table>
    </div>

    <?php
}

?>