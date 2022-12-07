<?php
// PHP Functions here for more accessibility

$conn = getDatabaseConnection();

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



?>