<?php
include_once 'con.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$data = json_decode(file_get_contents("php://input"));

$name=$data->name;


if($name=='Manan')
$sid=1;
else
$sid=34;

include 'includes/config.php';
$d= date('Y-m-d');
$t = date("H:i:s");

$sql= "SELECT * FROM students WHERE id=$sid";
$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$sem = $res['sem'];
$branch = $res['branch'];
$name = $res['name'];

$day = date("N");


$sql = "SELECT * FROM routine WHERE day='$day' AND sem='$sem' AND branch='$branch'";
$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));
$sub = $res['subject_name'];
$subj_id = $res['subj_id'];



{
    $sql = "SELECT * FROM attendance WHERE date='$d' and subject='$sub' and sid='$sid'";
    $c=mysqli_num_rows(mysqli_query($conn,$sql));
    if($c>0)
    {
        echo json_encode(array("r"=>0));
    }
    else
    {
        $sql="INSERT INTO attendance(name,sid,sem,branch,subject,subj_id,date,a_time) VALUES ('$name','$sid','$sem','$branch','$sub','$subj_id','$d','$t')";
        mysqli_query($conn,$sql);
        echo json_encode(array("r"=>1));
    }
}
?>