<?php
header("Cache-Control: private, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat,26 Jul 1997 05:00:00 GMT");
    $servername = "";
    $username = ""; 
    $password = ""; 
    $bname = ""; 
    $connect = new mysqli($servername, $username, $password, $bname); 
    if ($connect->connect_error) { 
    die("Connection failed: " . $connect->connect_error); 
    } 
?>
<html>
<head> 
    <title>Fund Transfer</title>
    <style>
    body {
               padding-top: 60px;
               font-size:25px;
               background: #e9e3e2;
        }
    .center{
        background: #ddc2bc;
        padding-top:5px;
        display: block;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 50%;    
    }
    .center2{
        font-size:15px;
        width:100%;
    }
    table {
    margin: 0 auto; 
  }
    td,th { border: 1px solid #ddd; padding: 8px;}
    #Table{ font-family: Arial,Helvetica; border-collapse: collapse;}
    #Table tr:nth-child(even){ background-color: #c1506a; }
    #Table tr:nth-child(odd){ background-color:  #ddc2bc; }
    #Table tr:hover{ background-color: #c7371f; }
    #Table th { padding-top: 12px; padding-bottom: 12px; text-align:left; background-color:  #608fb3; color:white; }

    </style>    
     <script type="text/javascript">
    
    if(window.history.replaceState){
        
        window.history.replaceState(null, null, window.location.href); 
    }
    
</script>
</head>

<body>

<?php include('navbar.php'); ?>
<?php 
  if(isset($_POST['form_submitted'])){

    
      $PAYER_AC = $_POST['payerID'];
      $PAYEE_AC = $_POST['payeeID'];
      $AMOUNT = $_POST['amount'];

      if(empty($PAYER_AC) || empty($PAYEE_AC) || empty($AMOUNT)){
        
        echo "<script> alert('Empty Fields !');
        window.location.href='FundTransfer.php';
        </script>";  
        exit() ;           
      }

      
      if($AMOUNT <=0){
        echo "<script> alert('Amount must be greater than zero!');
        window.location.href='FundTransfer.php';
        </script>";  
        exit() ;  
      }

      if(!ctype_digit($AMOUNT) || !ctype_digit($PAYER_AC) || !ctype_digit($PAYEE_AC)){
        echo "<script> alert('Entered value can only contain digit!');
        window.location.href='FundTransfer.php';
        </script>";  
        exit() ;  
      }

     
      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accID='$PAYER_AC'";
      $r =  $connect->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payer ID does not exists !');
        window.location.href='FundTransfer.php';
        </script>";  
        exit() ;      
      }
    
      
      $sqlcount = "SELECT COUNT(1) FROM accountdetails where accID='$PAYEE_AC'";
      $r =  $connect->query($sqlcount);
      $d = $r->fetch_row();
      if($d[0]<1){
        echo "<script> alert('Payee ID does not exists !');
        window.location.href='FundTransfer.php';
        </script>";  
        exit() ;      
      }
      
      $sql = "Select * from accountdetails where accID='$PAYER_AC'";       
          if($result = $connect->query($sql)){            
               $row1 = $result->fetch_array(); 
               if($row1['balance']<$AMOUNT){
                echo "<script> alert('Payer does not have required balance !');
                window.location.href='FundTransfer.php';
                </script>";  
                exit() ; 
                }  
          }  
          echo "<div class ='center'>";
          echo "<div class ='center2'>";
          echo "<h1 style='text-align: center'>Transaction Successfully Completed</h1>
                <p  style='text-align: center; font-size:25px;'>Details of payer and payee<p>
                <table id = 'Table'>
                <tr>
                <th></th>
                <th>Account No.</th>
                <th>Name</th>
                <th>E-mail</th>
               
                </tr>";

          
          $sql = "Select * from accountdetails where accID='$PAYER_AC'";       
          if($result = $connect->query($sql)){            
               $row1 = $result->fetch_array(); 
                
                       echo "<tr> 
                            <td> Payer </td>
                            <td>".$row1['accID']."</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['email']."</td>
                           
                            </tr>";                        
                       $PayerCurrBal = $row1['balance'];            
            }
        
          
          $sql2 = "Select * from accountdetails where accID='$PAYEE_AC'";
          if($result = $connect->query($sql2)){
                $row2 = $result->fetch_array();
                       echo "<tr> 
                            <td> Payee </td>
                            <td>".$row2['accID']."</td>
                            <td>".$row2['name']."</td>
                            <td>".$row2['email']."</td>
                           
                            </tr>"; 
                        $PayeeCurrBal = $row2['balance'];                       
               
               
            }               
            echo "</table>";
            $PayeeCurrBal += $AMOUNT;
            $PayerCurrBal -= $AMOUNT;
            echo "<br>";
            echo "<table id = 'Table' style='margin-bottom:15px;'>
                    <tr>
                        <th></th>
                        <th>Old Balance</th>
                        <th>New Balance</th>
                    </tr>
                    <tr>
                        <th>Payer</th>
                        <td style='color:black'>".$row1['balance']."</td>                        
                        <td style='color:black'>".$PayerCurrBal."</td>
                    </tr>
                    <tr>
                        <th>Payee</th>
                        <td style='color:black'>".$row2['balance']."</td>                        
                        <td style='color:black'>".$PayeeCurrBal."</td>
                    </tr>";
            echo "</table>";

           $updpayer ="Update accountdetails set balance='$PayerCurrBal' where accID='$PAYER_AC'";

           $updpayee ="Update accountdetails set balance='$PayeeCurrBal' where accID='$PAYEE_AC'";

           if($connect->query($updpayer)==false){
                ?>        
                <script>alert("PAYER DETAILS NOT UPDATED!")</script>
                <?php
           }

           if($connect->query($updpayee)==false){
                    ?>        
                    <script>alert("PAYEE DETAILS NOT UPDATED! ERROR OCCURED!")</script>
                    <?php
            }
            date_default_timezone_set('Asia/Kolkata');           
            $date = date('Y-m-d H:i:s',time());
            $InsTransTab ="Insert into history (payer, payerAcc, payee, payeeAcc, amount, time) values ('$row1[name]','$row1[accID]','$row2[name]','$row2[accID]','$AMOUNT','$date')";
            
            if($connect->query($InsTransTab)==false){
                    ?>        
                    <script>alert("Record of this transaction saved! ERROR OCCURED!")</script>
                    <?php
            }


            echo "<br>";
        echo "</div>";
        echo "</div>";
        
  }
  else{
      ?>
      <h1>All transactions are up to date</h1>
      <?php
  }
  
  $connect->close();
?>
</body>
</html>

