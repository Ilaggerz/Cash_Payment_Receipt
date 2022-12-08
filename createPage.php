<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>House Rental Reciept</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon" />
    <script
      src="https://kit.fontawesome.com/dc85338648.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <section class="create__container">
      <div class="create__Wrapper">
        <form action="" method="post">
          <div class="create__header">
            <h1 class="create__form__header">HOUSE RENTAL</h1>
          </div>
          <section class="create__form__body">
            <div>
              <input type="text" name="tenant_name" id="tenantName" required />
              <label for="tenantName">TENANT NAME</label>
            </div>
            <div>
              <input
                type="text"
                name="house_Number"
                id="houseNumber"
                required
              />
              <label for="houseNumber">HOUSE NUMBER</label>
            </div>
            <div>
              <label for="monthlyRent"> MONTHLY RENT:</label>
              <select name="montlyRent" id="monthlyRent">
                <option value="1000">1000</option>
                <option value="1200">1200</option>
                <option value="1500">1500</option>
              </select>
            </div>
            <div>
              <input type="text" name="amount_paid" id="amountPaid" required />
              <label for="amountPaid">AMOUNT PAID</label>
            </div>
            <div>
              <label for="paymentDate">PAYMENT DATE: </label>
              <input
                type="date"
                name="payment_date"
                id="paymentDate"
                required
              />
            </div>
            <div>
              <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
              <label for="notes">NOTES</label>
            </div>
            <div class="lastBtn">
              <a aria-label="Go Back Home" href="index.html" class="goBackLink"
                ><i class="fa-solid fa-arrow-left"></i
              ></a>
              <div class="actionBtns">
                <button type="submit" name="Submit">Create</button>
                <button type="reset">Reset</button>
              </div>
            </div>
          </section>
        </form>
      </div>
    </section>
  </body>
</html>

<!--    BACKEND HERE    -->

<?php
include_once 'all_func.php';

if(isset($_POST['Submit']))
{
  // echo $_POST['tenant_name'],$_POST['house_Number'],$_POST['montlyRent'],$_POST['payment_date'],$_POST['notes'];
  insert_data_create($_POST['tenant_name'],$_POST['house_Number'],$_POST['montlyRent'],$_POST['payment_date'],$_POST['notes'],);
}
?>
