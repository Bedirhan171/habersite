<?php
    include ('baglanti2.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    if (isset($_GET['id']))
    {
        $getid=$_GET['id'];
        $sorgu="SELECT * FROM yazar_tablo WHERE yazar_id='$getid'";
        $veri = $baglanti2->query($sorgu);
        $kayit= $veri->fetch_array();
        if(!$kayit)
        {
            die("Kayıt bulunamadı");
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $yazar_id=$_POST['yazarid'];
        $yazar_eposta = $_POST['yazareposta'];
        $yazar_sifre = $_POST['yazarsifre'];
        $yazar_adsoyad = $_POST['yazaradsoyad'];
        $sorgu = "UPDATE yazar_tablo SET yazar_eposta='$yazar_eposta',
        yazar_sifre ='$yazar_sifre', yazar_adsoyad='$yazar_adsoyad'
        WHERE yazar_id='$yazar_id'";
        if($baglanti2->query($sorgu))
        {
            header("Location: yazarlar.php");
        } 
        else
        {
            echo "Hata:" . $baglanti2->error;
        }
    }
?>
<form action="yazarduzenle.php" method="post">
    <div class="form-group mb-3">
        <label>Yazar Eposta</label>
        <input type="text" class="form-control" name="yazareposta" value="
            <?php 
                echo $kayit['yazar_eposta'];
            ?>">
    </div>
    <div class="form-group mb-3">
        <label>Yazar Şifre</label>
        <input type="password" class="form-control" name="yazarsifre" value="
            <?php 
                echo $kayit['yazar_sifre'];
            ?>">
    </div>
    <div class="form-group mb-3">
        <label>Yazar Adı Soyadı</label>
        <input type="text" class="form-control" name="yazaradsoyad" value="
            <?php 
                echo $kayit['yazar_adsoyad'];
            ?>">
    </div>
        <input type="hidden" name="yazarid" value="
            <?php 
                echo $kayit['yazar_id'];
            ?>"/>
        <button type="submit" class="btn btn-primary">Kaydet</button>
</form>