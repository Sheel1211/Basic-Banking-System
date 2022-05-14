<?php

$conn=mysqli_connect("localhost","root","","projects");

if($conn){
    echo "Database connected Successfully";
}
else{
    die ("Database can't be connected");
}
$sender=$_POST['sender'];
$receiver=$_POST['receiver'];

$amount=$_POST['amount'];


$sql1="SELECT balance FROM customer_details WHERE account_no = `$sender`";
$val1=mysqli_query($conn,$sql1);

$sql2="SELECT balance FROM customer_details WHERE account_no = `$receiver`";
$val2=mysqli_query($conn,$sql2);

$send=$val1 - $amount;
$receive=$val2 + $amount;

$sql3="UPDATE customer_details SET balance=`$send` WHERE account_no = `$sender` ";
$sql3 .= "UPDATE customer_details SET balance=`$receive` WHERE account_no = `$receiver`"


?>

