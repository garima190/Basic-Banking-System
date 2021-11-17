<?php
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
    .transferMoney{
        color:black;
        background: #ddc2bc;
        padding: 20px;
        position:fixed;
        top:50%;
        left:50%;
        transform: translate(-50%, -50%);
    }
 
    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState)
        {
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
</head>
<body>
<?php include('navbar.php'); ?>
<div class = 'transferMoney'>
    <h1>Transfer Money</h1>
    <form name="myForm" action="Results.php"  onsubmit="return checkvalidForm()" method="post">
        <table id="table1">
        <tr>
            <td>Payer Acc No.</td>
            <td><input type="number" name="payerID"  min=100 required><td>
        </tr>
        <tr>
            <td>Payee Acc No.</td>
            <td><input type="number" name="payeeID" min=100 required ><td>
        </tr>
        <tr>
            <td>Amount (in Rs.)</td>
            <td><input type="number" name="amount" min=1 required><td>
        </tr>
        <tr>
            <td><input type= "hidden" name= "form_submitted" value="1"></td>
            <td> <input type="submit" value="PROCEED"><td>
        </tr>
       
        </table>
    </form>
</div>
 <script>
 
 function checkvalidForm() {
            var x = document.forms["myForm"]["payerID"].value;
            var y = document.forms["myForm"]["payeeID"].value;
            var z = document.forms["myForm"]["amount"].value;
            var regex1=/^[0-9]+$/;
            if (x == "" || y=="" || z=="") {
                alert("Please Fill the Details!");
                return false;
            }
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid amount to do transaction");
                return false;
            }
            if(isNaN(z)|| !x.match(regex1)|| !y.match(regex1) ||!z.match(regex1)){
                alert("Please Enter correct input!");
                return false;
            }
        }
            
 </script>
</body>
</html>
