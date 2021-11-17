<?php
$servername = "";
    $username = ""; 
    $password = ""; 
    $bname = ""; 
$connect = new mysqli($servername, $username, $password, $bname); 
if ($connect->connect_error) { 
  die("Connection failed: " . $connect->connect_error); 
} 
$sql = "SELECT * FROM history" ;
$result = $connect->query($sql);
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    
        <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               padding-top: 95px;
               font-size:26px;
               padding-bottom: 95px;
               background: #e9e3e2;
              }
        .container{      
            padding-top:5px;
            display: block;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            width: 60%; 
        }
        td,th { border: 1px solid #c7371f; padding: 8px;}
        #Table{ font-family: Arial,Helvetica ; border-collapse: collapse; margin-bottom: 15px;}
        #Table tr:nth-child(even){ background-color: #c1506a; }
        #Table tr:nth-child(odd){ background-color:  #ddc2bc; }
        #Table tr:hover{ background-color: #c7371f; }
        #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color: #93244d; color:white; }
        footer {
            background-color:#c1506a;
            position: absolute;
            left: 0;
            bottom: 0;
            height: 65px;
            width: 100%;
           
        }
    </style>
</head>

<body>
  <?php include('navbar.php'); ?>
	<div class="container">
        <h2 style="text-align: center">Transaction History</h2>

       <br>
       <div>
    <table id = "Table">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Payer Name</th>
                <th>Payer Acc No.</th>
                <th>Payee Name</th>
                <th>Payee Acc No.</th>
                <th>Amount</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
        
        <?php

    while($row = $result->fetch_assoc()) { 
  ?> 
 <tr>
        <td><?php echo $row['sno']; ?></td>
        <td><?php echo $row['payer']; ?></td>
        <td><?php echo $row['payerAcc']; ?></td>
        <td><?php echo $row['payee']; ?></td>
        <td><?php echo $row['payeeAcc']; ?></td>
        <td><?php echo $row['amount']; ?></td>
        <td><?php echo $row['time']; ?></td>

     
        </tr>
 <?php
    }
  
$connect->close();
?> 
</
</table>
    </div>
</div>
<footer style="text-align: center">
            <p style="font-size:15px">Designed and Coded by- Garima Singh</p>
            <p style="font-size:15px">E-mail- garimaXXXX@gmail.com</p>
  </footer>
<body>

</html>


