<?php
// PHP Functions here for more accessibility


function getDatabaseConnection()  //Get connection from php to database
{
    $host = 'localhost';
    $dbname = 'house_rent_receipt';
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

function insert_data_create ($tnt_name, $house_num, $mm_rate, $date, $note) // For createpage
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO house_rent VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$tnt_name, $house_num, $mm_rate, $date, $note]); 
}

function insert_data_pay ($rec_id, $hs_id, $payday, $bal, $amnt_pay) // For PayPage
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO receipt_table (?, ?, ?, ?, ?)");
    $stmt->execute([$rec_id, $hs_id, $payday, $bal, $amnt_pay]); 
}

function get_receipt($conn) //For receipt_page
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn -> prepare("SELECT column_name(s)FROM table1 INNER JOIN table2 ON table1.column_name = table2.column_name;"); // Using inner join here for the receipt
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>