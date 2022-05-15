<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferring</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

</body>

</html>
<form action="transfer.php" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1"> From Account: </label>
        <input type="number" class="form-control" name="sender" id="exampleInputAcc">
        <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> To Account: </label>
        <input type="number" class="form-control" name="receiver" id="exampleInputAcc1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> Enter Amount: </label>
        <input type="number" class="form-control" name="amount" id="exampleInputAmount">
    </div>


    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


<?php

if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "root", "", "projects");

    if ($conn) {
        echo "Database connected Successfully";
    } else {
        die("Database can't be connected");
    }


    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $amount = $_POST['amount'];


    // $sql1="SELECT * FROM customer_details WHERE 'account_no' = '$sender'";

    // // $val1=$conn->query($sql1);
    // mysqli_query($conn,$sql1);
    // $result=mysqli_fetch_assoc($val);
    // echo $result['balance'];


    $result = mysqli_query($conn, "SELECT * FROM customer_details WHERE account_no = '$sender' ORDER BY account_no ASC");
    while ($res = mysqli_fetch_array($result)) {

        $val1 = $res['balance'];
        echo $val1 . "<br>";
    }

    $result = mysqli_query($conn, "SELECT * FROM customer_details WHERE account_no = '$receiver' ORDER BY account_no ASC");
    while ($res = mysqli_fetch_array($result)) {

        $val2 = $res['balance'];
        echo $val2 . "<br>";
    }


    echo "The amount to be transferred is $amount <br>";
    $number1 = $val1;
    $number2 = $amount;
    $send =  $val1 - $amount;
    echo "The sender's new balance  is: " . $send;

    $number1 = $val2;
    $number2 = $amount;
    $receive =  $val2 + $amount;
    echo "The receiver's new balance  is: " . $receive;

    if($amount > $val1){
        header("Location:failed.html");
    }
    else{

    $sql3 = "UPDATE customer_details SET balance ='$send' WHERE account_no = '$sender'; ";
    $sql3 .= "UPDATE customer_details SET balance ='$receive' WHERE account_no = '$receiver' ";

    if ($conn -> multi_query($sql3)) {
        header("Location:success.html");
        echo "<br>Money transferred successfully<br>";
    } else {
        die("Money can't be transferred");
    }
}
}

?>