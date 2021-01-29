<?php

$img = $_POST['image'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);


$servername = "<YOUR HOST NAME>";
$username = "<YOUR USERNAME>";
$password = "<YOUR PASSWORD>";
$dbname = "<YOUR DB's NAME>";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

if(isset($_POST['image'])) {
    $sql = "INSERT INTO stamp (id, timestamp) VALUES ('', UNIX_TIMESTAMP())";
    $result = mysqli_query($conn, $sql);
}

if(isset($_POST['image'])) {
    $sql = "SELECT timestamp from stamp where timestamp = (select max(timestamp) from stamp) limit 1";
    $result = mysqli_query($conn, $sql);
    
    $row = $result->fetch_assoc();
    $result = $row['timestamp'];
    $rec = substr($result,3,7);
    $sql2 = "INSERT INTO records (id) VALUES ($rec)";
    $result2 = mysqli_query($conn, $sql2);
    
    $filename = 'images/'.$rec.'';
    file_put_contents($filename, $fileData);     
}

?>
