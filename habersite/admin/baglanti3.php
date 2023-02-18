<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "haberler_db";

try
{
    $baglanti3 = new PDO("mysql:host=$servername;dbname =$database",$username,$password);
    $baglanti3->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} 
catch (PDOEXCEPTION $e) 
{
    die("Bağlantı Hatası:" . $e->getMessage());
}
?>