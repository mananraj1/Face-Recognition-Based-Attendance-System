<?php
include 'includes/config.php';
$d= date('Y-m-d');
$t = date("H:i:s");

$sql = "SELECT * FROM routine WHERE day='5'";
$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

$sub = $res['subject_name'];

if($sub=='')
{
    echo json_encode(array("r"=>2));
}
else
{
    $sql = "SELECT * FROM attendance WHERE date='$d' and subject='$sub'";
    $c=mysqli_num_rows(mysqli_query($conn,$sql));
    if($c>0)
    {
        echo json_encode(array("r"=>0));
    }
    else
    {
        $sql="INSERT INTO attendance(name,sid,sem,branch,subject,date,a_time) VALUES ('Manan Raj','2','5','ISE','$sub','$d','$t')";
        mysqli_query($conn,$sql);
        echo json_encode(array("r"=>1));
    }
}
;?>