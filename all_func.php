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

function insert_data__receipt ($rec_id, $ten_ID,$hs_ID,$mm_charge,$bal, $ttl_bal, $date) //RECEIPT
// under maintenance
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO receipt_table values (?, ?, ?, ?, ?,?,?)");
    $stmt->execute([$rec_id, $ten_ID,$hs_ID, $mm_charge,$bal, $ttl_bal, $date]);
}



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

function getData_receipt($id)  //Gets all data from specified table inside database TOOL
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("SELECT * FROM receipt_table WHERE Receipt_ID = $id");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
} 

function getData_tnnt_name($tenant_id)  //Gets all data from specified table inside database TOOL
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("SELECT Tenant_Name, Month_to_stay FROM renter_info WHERE Tenant_ID = '$tenant_id'");
    $stmt->execute();
    $result = $stmt->fetch (PDO::FETCH_ASSOC);
    return $result;
} 



?>