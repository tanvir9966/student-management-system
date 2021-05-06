<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

</head>
<body>

</body>
</html>

<?php

session_start();
include 'dbconn.php';
$data= $_SESSION['data'];
?>

<div class="container">
    <h2>Student Details</h2>
    <table class="table table-dark">
        <tr>
            <td rowspan="5"> <img src="dataimg/<?php echo $data['image']; ?>" style="max-height: 300px; max-width: 300px" /> </td>
            <th>Name</th>
            <td> <?php echo $data['name']; ?> </td>
        </tr>
        <tr>
            <th>Department</th>
            <td> <?php echo $data['department']; ?> </td>
        </tr>
        <tr>
            <th>Section</th>
            <td> <?php echo $data['sec']; ?> </td>
        </tr>
        <tr>
            <th>Phone number</th>
            <td> <?php echo $data['phone']; ?> </td>
        </tr>
        <tr>
            <th>Address</th>
            <td> <?php echo $data['address']; ?> </td>
        </tr>
    </table>
</div>










