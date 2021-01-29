<?php

function check() {
    
    $servername = "<YOUR HOST NAME>";
    $username = "<YOUR USERNAME>";
    $password = "<YOUR PASSWORD>";
    $dbname = "<YOUR DB's NAME>";

    
    //Create connection
    $conn3 = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn3->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    
    $sql = "SELECT id from records where id = (select max(id) from records) limit 1";
    $result = mysqli_query($conn3, $sql);

    $row = $result->fetch_assoc();
    $result = $row['id'];
    echo $result;

}

check();
?>
