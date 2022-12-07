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
        <form action="" method="Post">
          <div class="create__header">
            <h1 class="create__form__header">HOUSE RENTAL</h1>
            <div><i class="fa-solid fa-house"></i></div>
          </div>
          <section class="create__form__body">
            <div>
              <input type="text" name="tenant_name" id="tenantName" required />
              <label for="tenantName">TENANT NAME</label>
            </div>
            <div>
              <input type="text" name="house_name" id="houseName" required />
              <label for="houseName">HOUSE NUMBER</label>
            </div>
            <div><h3>Monthly Rent: 1500</h3></div>
            <div>
              <input type="text" name="amount_paid" id="amountPaid" required />
              <label for="amountPaid">AMOUNT PAID</label>
            </div>
            <div>
              <label for="paymentDate">PAYMENT DATE: </label>
              <input
                type="date"
                name="payment date"
                id="paymentDate"
                required
              />
            </div>
            <div>
              <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
              <label for="notes">AMOUNT PAID</label>
            </div>
            <div>
              <a aria-label="Go Back Home" href="index.html" class="goBackLink"
                >Go back home</a
              >
              <button type="submit" name="Submit">Submit</button>
              <button type="reset">Reset</button>
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
  echo "Submit Button is Working";
}
?>