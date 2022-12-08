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

function insert_data_create ($conn) // For createpage
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO tablehere (name, username, password) VALUES (:fname,:uid,:pword)");
    $stmt->execute([]); 
}

function insert_data_pay ($conn) // For PayPage
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn->prepare("INSERT INTO tablehere (name, username, password) VALUES (:fname,:uid,:pword)");
    $stmt->execute([]); 
}

function get_receipt($conn)
{
    $conn = getDatabaseConnection(); 
    $stmt = $conn -> prepare("SELECT column_name(s)FROM table1 INNER JOIN table2 ON table1.column_name = table2.column_name;"); // Using inner join here for the receipt
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>