<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['acc_no'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customer_details where acc_no=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customer_details where acc_no=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['cur_bal']) 
    {        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['cur_bal'] - $amount;
                $sql = "UPDATE customer_details set cur_bal=$newbalance where acc_no=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['cur_bal'] + $amount;
                $sql = "UPDATE customer_details set cur_bal=$newbalance where acc_no=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['name'];
                $sender_acc = $sql1['acc_no'];
                $receiver = $sql2['name'];
                $receiver_acc = $sql2['acc_no'];
                $sql = "INSERT INTO transfer(`from_acc`, `from_name`, `to_acc`, `to_name`, `amount`) VALUES ('$sender_acc','$sender','$receiver_acc','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transfermoney.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <style type="text/css">
    	
	button {
        border: none;
        border-radius: 7px;
        margin: 10px;
        padding: 10px;
        background: #3a3b3a;
        color: white;
        letter-spacing: 1.5px;
        font-size: 15px;
        transition: 0.1s;
    }
    button:hover {
        background-color: #000000;
    }

    </style>
</head>

<body>
 
<?php
  include 'navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['acc_no'];
                $sql = "SELECT * FROM  customer_details where acc_no=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
    <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center py-2">Account Number</th>
                    <th scope="col" class="text-center py-2">Name</th>
                    <th scope="col" class="text-center py-2">E-Mail</th>
                    <th scope="col" class="text-center py-2">Balance</th>
                    <th scope="col" class="text-center py-2">Mobile Number</th>
                </tr>
            </thead>
                <tr>
                    <td class="py-2"><?php echo $rows['acc_no'] ?></td>
                    <td class="py-2"><?php echo $rows['name']?></td>
                    <td class="py-2"><?php echo $rows['email']?></td>
                    <td class="py-2"><?php echo $rows['cur_bal']?></td>
                    <td class="py-2"><?php echo $rows['mo_no']?></td>
                </tr>
            </table>
        </div>
        <br>
        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid2=$_GET['acc_no'];
                $sql = "SELECT * FROM customer_details where acc_no!=$sid2";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['acc_no'];?>" >
                
                    <?php echo $rows['name'] ;?> (Account Number: 
                    <?php echo $rows['acc_no'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>

        <label>Amount:</label>
            <div class="input-group mb-3">
                <span class="input-group-text">₹</span>
                <input type="number" class="form-control" aria-label="Amount" name="amount" required>
                <span class="input-group-text">.00</span>
            </div>
            <br><br>
            <div class="text-center" >
                <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
    </form>
    </div>
    <br><br><br>
<footer class="page-footer font-small">
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="#"> THE BANK OF TSF</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>