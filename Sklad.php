 <?php
 $servername = "dbs.spskladno.cz";
 $username = "student14";
 $password = "spsnet";
 $dbname = "vyuka14";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    exit("Spojení se nezdařilo. Chyba: " . $conn->connect_error);

 } 
echo("připojeno"); 

$conn->set_charset("utf8mb4");

$conn->close();
?>
