<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="view.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Banking Solutions</title>
  <link rel="icon" href="Images/logo.png">
</head>
<style>
  .btn-info {
    background-color: #ec7f9e;
  }

  .btn-info:hover {
    background-color: #820c68;

  }
  .table{
    background-color: rgb(109, 160, 204);
    color:white;
    margin:auto;
    margin-top: 10px;
    
    border-radius: 15px;
  }
</style>

<body>
  <nav class="navbar">

    <!-- LOGO -->
    <div class="logo"><img src="Images/logo.png" width="20px" margin-top="4px">    ALPHA BANKING</div>

    <!-- NAVIGATION MENU -->
    <ul class="nav-links">
      <!-- USING CHECKBOX HACK -->
      <input type="checkbox" id="checkbox_toggle" />
      <label for="checkbox_toggle" class="hamburger">&#9776;</label>
      <!-- NAVIGATION MENUS -->
      <div class="menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="/">About</a></li>
        <li class="services">
          <a href="/">Services</a>
          <!-- DROPDOWN MENU -->
          <!-- <ul class="dropdown">
             <li><a href="viewTransactions.html">Show Transactions </a></li>
             <li><a href="viewCustomers.html">Transfer Money</a></li>
             
           </ul> -->
        </li>
        <li><a href="/">Pricing</a></li>
        <li><a href="/">Contact</a></li>
      </div>
    </ul>
  </nav>

  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Serial No</th>
        <th scope="col">Sender Account Number</th>
        <th scope="col">Receiver Account Number</th>
        <th scope="col">Amount</th>
        <th scope="col">Date-Time</th>
        <th scope="col">Status</th>
      </tr>
    </thead>

    <?php
    include 'connect.php';
    $result = mysqli_query($conn, "SELECT * FROM transaction_details ORDER BY serial_no ASC");
    while ($res = mysqli_fetch_array($result)) {
      echo "<tbody>";
      echo "<tr>";
      echo "<th scope=\"row\">";
      echo  "" . $res['serial_no'] . "</td>" . "</th>";
      
      echo "<td>" . $res['sender_account_no'] . "</td>";
      echo "<td>" . $res['receiver_account_no'] . "</td>";
      echo "<td>" . $res['amount'] . "</td>";
      echo "<td>" . $res['date_time'] . "</td>";
      echo "<td>" . $res['status'] . "</td>";
      
    }


    ?>



  </table>

</body>

</html>