<?php
session_start();
if(isset($_SESSION['id']))
{
    $id= $_SESSION['uid'];
    include '../dbconn.php';
    /*$qry= "SELECT * FROM `semester` WHERE `id`='$id';";
    $run= mysqli_query($con,$qry);*/
    $sem= $_SESSION['sem'];
    $qry2= "SELECT * FROM `courses` WHERE `semester`='$sem';";
    $qry3= "SELECT * FROM `semester` WHERE `id`='$id' AND `semester`=$sem;";
    $run2= mysqli_query($con,$qry2);
    $run3= mysqli_query($con,$qry3);
    $data2=mysqli_fetch_assoc($run2);
    $data3=mysqli_fetch_assoc($run3);
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
    <form method="post" action="sgpaform.php" enctype="multipart/form-data">
        <?php
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c1'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c1" value="<?php echo $data3['p1'] ?>" required>
            </div>
            <?php
            $num++;
        }
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c2'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c2" value="<?php echo $data3['p2'] ?>" required>
            </div>
            <?php
            $num++;
        }
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c3'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c3" value="<?php echo $data3['p3'] ?>" required>
            </div>
            <?php
            $num++;
        }
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c4'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c4" value="<?php echo $data3['p4'] ?>" required>
            </div>
            <?php
            $num++;
        }
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c5'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c5" value="<?php echo $data3['p5'] ?>" required>
            </div>
            <?php
            $num++;
        }
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c6'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c6" value="<?php echo $data3['p6'] ?>" required>
            </div>
            <?php
            $num++;
        }
        if($num<=$i)
        {
            ?>
            <div class="form-group">
                <label for="email"><?php echo $data2['c7'] ?></label>
                <input type="number" step=".01" min="0" max="4" class="form-control" name="c7" value="<?php echo $data3['p7'] ?>" required>
            </div>
            <?php
            $num++;
        }
        ?>

        <button type="submit" name="submit" class="btn btn-primary">Calculate</button>
    </form>
</div>

</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $srl= $data3['srl'];
    $num=1;
    if($num<=$i)
    {
        $c[1]=$_POST['c1'];
        $cr[1]=$data2['cr1'];
        $num++;
    }
    if($num<=$i)
    {
        $c[]=$_POST['c2'];
        $cr[]=$data2['cr2'];
        $num++;
    }
    if($num<=$i)
    {
        $c[]=$_POST['c3'];
        $cr[]=$data2['cr3'];
        $num++;
    }
    if($num<=$i)
    {
        $c[]=$_POST['c4'];
        $cr[]=$data2['cr4'];
        $num++;
    }
    if($num<=$i)
    {
        $c[]=$_POST['c5'];
        $cr[]=$data2['cr5'];
        $num++;
    }
    if($num<=$i)
    {
        $c[]=$_POST['c6'];
        $cr[]=$data2['cr6'];
        $num++;
    }
    if($num<=$i)
    {
        $c[]=$_POST['c7'];
        $cr[]=$data2['cr7'];
        $num++;
    }
    $mul[1]=0.00;
    $sum=0.00;
    $totalcr=0.00;
    for ($num=1; $num<=$i; $num++)
    {
        $mul[$num]=$c[$num]*$cr[$num];
        $sum=$sum+$mul[$num];
        $totalcr=$totalcr+$cr[$num];
    }
    $sgpa=$sum/$totalcr;
    $sgpa= number_format("$sgpa", 2);

    if($sem==1)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==2)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]', `p6` = '$c[6]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==3)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]', `p6` = '$c[6]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==4)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]', `p6` = '$c[6]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==5)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==6)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==7)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==8)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==9)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==10)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]', `p6` = '$c[6]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==11)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]', `p4` = '$c[4]', `p5` = '$c[5]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    if($sem==12)
    {
        $qry= "UPDATE `semester` SET `p1` = '$c[1]', `p2` = '$c[2]',
             `p3` = '$c[3]',
              `cgpa` = '$sgpa' WHERE `semester`.`srl` = $srl;";
    }
    $run= mysqli_query($con,$qry);
    if($run)
    {
        ?>
        <script>
            alert('Result added!');
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











