<?php
// Database connection
$mysqli =new mysqli("localhost","admin","admin_pass","week traffic");

if (mysqli->connect_errno !=0)
{
    die( $mysqli->connect_error);
}
$sql ="SELECT *FROM visits";
$res =$mysqli->query($sql);

$data=[];
while($row=$res->fetch_assoc()){

array_push($data,$row);

}
echo json_encode($data);


?>
