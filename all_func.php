<?php
// PHP Functions here for more accessibility


function getDatabaseConnection()  //Get connection from php to database
{
    $host = 'localhost';
    $dbname = 'house_rental_db';
    $user = 'root';
    $password ='';
    $dsn = "mysql:dbname=$dbname;host=$host"; 

    try 
    {
        $conn = new PDO($dsn, $user, $password);
        return $conn;
    } 


    catch (PDOException $e) 
    {   
        echo 'Connection failed: ' . $e->getMessage();
    }
}

function insert_data__renter ($tnt_id, $tnt_name, $cntct, $MOD, $mm) // RENTER
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO renter_info VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$tnt_id, $tnt_name, $cntct, $MOD, $mm]); 
}

function insert_data__house ($hs_id, $hs_type, $mm_rate, $add, $strt) //HOUSE
{
    $conn = getDatabaseConnection(); 
    $stmt2 = $conn->prepare("INSERT INTO house_info values(?, ?, ?, ?, ?)");
    $stmt2->execute([$hs_id, $hs_type, $mm_rate, $add, $strt]); 
}

function insert_data__receipt ($rec_id, $bal, $ttl_bal, $date) //RECEIPT
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO receipt_table (Receipt_ID, Balance, Amount_paid, Date) values (?, ?, ?, ?, ?)");
    $stmt->execute([$rec_id, $bal, $ttl_bal, $date]); 
}

// NOT SURE IF IM GONNA USE THIS THO :/
// function get_receipt($conn) //For receipt_page
// {
//     $conn = getDatabaseConnection(); 
//     $stmt = $conn -> prepare("SELECT column_name(s)FROM table1 INNER JOIN table2 ON table1.column_name = table2.column_name;"); // Using inner join here for the receipt
//     $stmt -> execute();
//     $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
//     return $result;
// }

function generateRandomString($length = 10) // GENERATE RAND STRING
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


// FINAL USAGE
// include_once 'all_func.php';

// $lgnth = 10;
// $hs_id = generateRandomString($lgnth);

// $bal = rand(1000000000, 1000000000000000);
// $total_bal = $bal * $_POST['months__to__stay'];
// $date = date('y-m-d');


// if (isset($_POST['Submit']))
// {
// insert_data__renter($_POST['tenant__id'],$_POST['tenant__name'],$_POST['contact__number'],$_POST['mode__of__payment'],$_POST['months__to__stay']); // check

// insert_data__house($hs_id,$_POST['home__types'],$_POST['mothly__rent'],$_POST['address'],$_POST['street']); // check

// insert_data__receipt(['generate__receipt__no'], $bal, $total_bal, $date); // on process 
// header('test.php');
// }
?>