<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbdatabase";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";

CreateTable($conn);
InsertData($conn);
SelectData($conn);


function CreateTable($conn)
{

    //sql to create table

    $sql = "CREATE TABLE MyUsers (
    
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    
    firstname VARCHAR(30) NOT NULL,
    
    lastname VARCHAR(30) NOT NULL,
    
    email VARCHAR(50),
    
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
    )";


    if ($conn->query($sql) === TRUE) {

        echo "Table MyGuests created successfully<br>";

    } else {

        echo "Error creating table: " . $conn->error;

    }


}

function InsertData($conn)
{
    //Insert into table

    $sql = "INSERT INTO MyUsers (firstname, lastname, email)

    VALUES ('John', 'Doe', 'john@example.com')";


    if ($conn->query($sql) === TRUE) {

        echo "New record created successfully<br>";

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }
}


function SelectData($conn)
{
    $sql = "SELECT id, firstname, lastname FROM MyUsers";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

        // output data of each row

        while ($row = $result->fetch_assoc()) {

            echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";

        }

    } else {

        echo "0 results";

    }
}



