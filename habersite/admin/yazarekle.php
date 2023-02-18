<?php
    include ('baglanti2.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $yazar_eposta = $_POST['yazareposta'];
        $yazar_sifre = $_POST['yazarsifre'];
        $yazar_adsoyad = $_POST['yazaradsoyad'];
        $sorgu="INSERT INTO yazar_tablo (yazar_eposta, yazar_sifre, yazar_adsoyad )
        VALUES (2$yazar_eposta', '$yazar_sifre', '$yazar_adsoyad')";
        if($baglanti2->query($sorgu)=== true)
        {
            header( "Location: yazarlar.php" );
        } 
        else
        {
            echo "Hata:" . $baglanti2->error;
        }
        $baglanti2->close();    
    }
?>

<form action="yazarekle.php" method="post">
    <div class="form-group mb-3">
        <label>Yazar Eposta</label>
        <input type="text" class="form-control" name="yazareposta">
    </div>
    <div class="form-group mb-3">
        <label>Yazar Şifre</label>
        <input type="password" class="form-control" name="yazarsifre">
    </div>
    <div class="form-group mb-3">
        <label>Yazar Ad Soyad</label>
        <input type="text" class="form-control" name="yazaradsoyad">
    </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
<?php 
    include ('../includes/footer.php'); 
?>