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
    <script defer src="js/main.js"></script>
  </head>
  <body>
    <!-- CONTAINER -->
    <div class="indexcontainer">
      <!-- CONTAINER HEADER -->
      <header class="indexcontainer__header">
        <h1>HOUSE RENTAL</h1>
      </header>
      <!-- CONTAINER MAIN -->
      <main class="indexcontainer__main">
        <!-- CONTAINER MAIN FORM -->

        <form action="#" method="POST">
          <!-- CUSTOMER INFO -->
          <div class="First__Form">
            <h2>CUSTOMER INFO</h2>
            <div>
              <input
                class="INPUT-DESIGN"
                type="text"
                name="tenant__name"
                id="tenant__name"
                required
              />
              <label for="tenant__name">TENANT NAME</label>
            </div>
            <div>
              <input
                class="INPUT-DESIGN"
                type="tel"
                name="contact__number"
                id="contact__number"
                pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}"
                required
              />
              <label for="contact__number">CONTACT NUMBER</label>
            </div>
            <div>
              <span>MOP:</span>
              <div class="radio__btns">
                <div>
                  <input
                    type="radio"
                    name="mode__of__payment"
                    id="gcash"
                    value="GCASH"
                    required
                  />
                  <label for="gcash">GCASH</label>
                </div>
                <div>
                  <input
                    type="radio"
                    name="mode__of__payment"
                    id="paypal"
                    value="Paypal"
                    required
                  />
                  <label for="paypal">PAYPAL</label>
                </div>
                <div>
                  <input
                    type="radio"
                    name="mode__of__payment"
                    id="creditcard"
                    value="Credit Card"
                    required
                  />
                  <label for="creditcard">CREDIT CARD</label>
                </div>
              </div>
            </div>
            <div>
              <label for="months__to__stay">MONTHS TO STAY</label>
              <input
                type="number"
                name="months__to__stay"
                id="months__to__stay"
                min="1"
                max="12"
                required
              />
            </div>
          </div>
          <!-- RECEIPT INFO -->
          <div class="Second__Form" >
            <h2>HOUSE INFO</h2>
            <div>
              <label for="home__types">HOME TYPES</label>
              <select name="home__types" id="home__types">
                <option value="Bungalow">Bungalow</option>
                <!-- 30000 -->
                <option value="Single-detached">Single-detached</option>
                <!-- 15000 -->
                <option value="Single-attached">Single-attached</option>
                <!-- 20000 -->
                <option value="Duplex">Duplex</option>
                <!-- 50000 -->
                <option value="Townhouse">Townhouse</option>
                <!-- 80000 -->
                <option value="Quadroplex">Quadroplex</option>
                <!-- 60000 -->
                <option value="Rowhouse">Rowhouse</option>
                <!-- 90000 -->
              </select>
            </div>
            <div>
              <label for="monthly__rent">MONTHLY RENT:</label>
              <input
                class="INPUT-DESIGN"
                type="text"
                name="monthly__rent"
                id="monthly__rent"
                required
                readonly
              />
            </div>
            <div>
              <input
                class="INPUT-DESIGN"
                type="text"
                name="generate__receipt__no"
                id="generate__receipt__no"
                placeholder="Generate Receipt No."
                required
                readonly
              />
              <button id="generate__rec__no">GENERATE</button>
            </div>
            <div>
              <input
                class="INPUT-DESIGN"
                type="text"
                name="address"
                id="address"
                required
              />
              <label for="address">ADDRESS</label>
            </div>
            <div>
              <input
                class="INPUT-DESIGN"
                type="text"
                name="street"
                id="street"
                required
              />
              <label for="street">STREET</label>
            </div>
            <div class="form__btns">
              <button type="submit" name="send" id="submit">SUBMIT</button>
              <button type="reset">RESET</button>
            </div>
          </div>
        </form>
      </main>

      <div class="overlay">
        <section id="receipt">
          <div class="first__col">
            <h2>Monthly Rent</h2>
            <div class="first__col__split">
              <p>Receipt No. <span id="receipt__no__get"></span></p>
              <p>Date: <span id="date__get"></span></p>
            </div>
          </div>
          <div class="second__col">
            <p>Tenant Name: <span id="tenant__name__get"></span></p>
            <p>House Number: <span id="house__number__get"></span></p>
          </div>
          <div class="third__col">
            <h3>Acknowledgement Receipt</h3>
            <p>Month's Stayed: <span id="months__stayed__get"></span></p>
            <p>Monthly Rent: <span id="monthly__rent__get"></span></p>
            <p>Current Balance: <span id="current_balance__get"></span></p>
            <p>Total Amount: <span id="total__amount__get"></span></p>
            <p>Amount Paid: <span id="amount__paid__get"></span></p>
          </div>
          <hr />
          <div class="receipt__footer">
            <button id="back_btn">BACK</button>
            <button id="print__btn">PRINT</button>
            <h3>THANK YOU FOR YOUR PATRONAGE</h3>
          </div>
        </section>
      </div>
      <footer class="footer">
        <h4>
          &copy; <span id="getCurrentYear"></span> GROUP 1 BSIT-3A; All
          Rights Reserved
        </h4>
      </footer>
    </div>
  </body>
</html>


<!--  BACK-END HERE -->


<?php

include_once 'all_func.php';


// IF THE SUBMIT BUTTON IS PRESSED
if (isset($_POST['send']))
{

  //DECLARE VARIABLES HERE

$tb_id = generateRandomString(10);
$mm = $_POST['months__to__stay'];
$bal = rand(100_000, 1_000_000_000);
$total_bal = $_POST['monthly__rent'] * $mm;
$date = date('y-m-d');


//FUNCTIONS HERE
insert_data__renter($tb_id,$_POST['tenant__name'],$_POST['contact__number'],$_POST['mode__of__payment'],$_POST['months__to__stay']); // check

insert_data__house($tb_id,$_POST['home__types'],$_POST['monthly__rent'],$_POST['address'],$_POST['street']); // check

insert_data__receipt($_POST['generate__receipt__no'],$tb_id,$tb_id,$_POST['monthly__rent'], $bal, $total_bal, $date); // on process 
}
?>

