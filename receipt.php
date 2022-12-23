<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/print.js"></script>
</head>
<body>  
<?php 
include_once 'all_func.php';
$id = $_GET['receipt_id'];
$receipt = getData_receipt($id);
$tnnt_id = $receipt['Tenant_ID'];
$renter = getData_tnnt_name($tnnt_id);
$total = $receipt['Monthly_charge'] * $renter['Month_to_stay'];
$new_bal = $receipt['Balance'] - $total;
if (isset($_POST['back']))
{
  header('Location: index.php');
}
?>
    <div class="overlay">
        <section id="receipt">
          <div class="first__col">
            <h2>Monthly Rent</h2> 
            <div class="first__col__split">
              <p>Receipt No. <span id="receipt__no__get"><?php echo $id?></span></p>
              <p>Date: <span id="date__get"><?php echo $receipt['Date']?></span></p>
            </div>
          </div>  
          <div class="second__col">
            <p>Tenant Name: <span id="tenant__name__get"><?php echo $renter['Tenant_Name']?> </span></p>
            <p>House Number: <span id="house__number__get"><?php echo $receipt['House_ID']?>   </span></p>
          </div>
          <div class="third__col">
            <h3>Acknowledgement Receipt</h3>
            <p>Month's Stayed: <span id="months__stayed__get"><?php echo $renter['Month_to_stay']?> </span></p>
            <p>Monthly Rent: <span id="monthly__rent__get"><?php echo $receipt['Monthly_charge']?></span></p>
            <p>Current Balance: <span id="current_balance__get"><?php echo $receipt['Balance']?></span></p>
            <p>Total Amount: <span id="total__amount__get"><?php echo $total?></span></p>
            <p>New Balance: <span id="amount__paid__get"><?php echo $new_bal?></span></p>
          </div>
          <hr />
          <div class="receipt__footer">
            <form action="" method="POST">
            <button name="back" id="back_btn">BACK</button>
            <button id="print__btn">PRINT</button>
            </form>
            <h3>THANK YOU FOR YOUR CHOOSING US</h3>
          </div>
        </section>
      </div>
</body>
</html>