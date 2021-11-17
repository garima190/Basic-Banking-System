<?php
    $servername = "fdb34.awardspace.net";
    $username = "3986205_garima0579"; 
    $password = "o:)rs2Dl0ue.Op{T"; 
    $bname = "3986205_garima0579";  
    $connect = new mysqli($servername, $username, $password, $bname); 
    if ($connect->connect_error) { 
    die("Connection failed: " . $connect->connect_error); 
    } 
    $sql = "SELECT * FROM accountdetails" ;
    $result = $connect->query($sql);
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>    
  <style>
        html {
            position: relative;
            min-height: 100%;
        }
        body {
               padding-top: 60px;
               font-size:25px;
               padding-bottom: 97px;
               background:#e9e3e2;
              }
        .container{      
                padding-top:6px;
                display: block;
                margin-top: 20px;
                margin-left: auto;
                margin-right: auto;
                width: 52%;    
        }

        td,th { border: 1px solid #c7371f; padding: 8px;}
        #Table{ font-family: Arial,Helvetica, sans-serif; border-collapse: collapse; margin-bottom: 15px;}
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
            <h2 style="text-align: center">Customer Details</h2>
            <br>                   
            <table id="Table">
                <thead>
                    <tr>
                    <th>S.No.</th>
                    <th>Account No.</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Balance</th>  
                    </tr>
                </thead>                     
                <?php
                while($row = $result->fetch_assoc()) { 
                ?> 
                <tr>
                    <td><?php echo $row['sno']; ?></td>
                    <td><?php echo $row['accID']; ?></td>
                    <td ><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                    
                </tr>
                <?php
                }
                $connect->close();
                ?> 
            </table>
        </div>
        <footer style="text-align: center">
            <p style="font-size:15px">Designed and Coded by- Garima Singh</p>
            <p style="font-size:15px">E-mail- garimaXXXX@gmail.com</p>
  </footer>
</body>
</html>


