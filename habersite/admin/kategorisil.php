<?php
    include ('baglanti.php');
    $sorgu = "DELETE FROM kategori_tablo WHERE kategori_id=' " . $_GET["id"] . "'";
    if (mysqli_query($baglanti, $sorgu)) 
    {
        header("location: kategoriler.php");
        exit();
    } 
    else 
    {
        echo "Kayıt silinemedi :" . mysqli_error($baglanti);
    }
    mysqli_close($baglanti);
?>