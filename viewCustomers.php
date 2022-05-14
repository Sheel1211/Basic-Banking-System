<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Banking Solutions</title>
</head>

<body>
  <nav class="navbar">
    <!-- LOGO -->
    <div class="logo">ALPHA BANKING</div>
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
        <th scope="col">Account Number</th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Balance</th>
      </tr>
    </thead>

    <?php
    include 'connect.php';
    $result = mysqli_query($conn, "SELECT * FROM customer_details ORDER BY account_no ASC");
    while ($res = mysqli_fetch_array($result)) {
      echo "<tbody>";
      echo "<tr>";
      echo "<th scope=\"row\">";
      echo  "". $res['account_no'] . "</td>"."</th>";
      echo "<td>" . $res['name'] . "</td>";
      echo "<td>" . $res['email'] . "</td>";
      echo "<td>" . $res['balance'] . "</td>";
      
      // echo "<td><a href=\"edit.php?id=".$res['id']."\">Edit</a></td>  <td><a href=\"delete.php?id=".$res['id']."\">Delete</a></td></tr>";
    }
    ?>
    
  </table>

</body>

</html>