<?php
    include ('baglanti.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    if (isset($_GET['id']))
    {
        $getid=$_GET['id'];
        $sorgu="SELECT * FROM kategori_tablo WHERE kategori_id='$getid'";
        $veri = mysqli_query($baglanti,$sorgu);
        $kayit= mysqli_fetch_array($veri);
        if(!$kayit)
        {
            die("Kayıt bulunamadı");
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $kategori_id=$_POST['kategoriid'];
        $kategori_adi = $_POST['kategoriadi'];
        $sorgu = "UPDATE kategori_tablo SET kategori_adi='$kategori_adi' WHERE kategori_id='$kategori_id'";
        if(mysqli_query($baglanti, $sorgu))
        {
            header( "Location: kategoriler.php" );
        } 
        else
        {
            echo "Hata:" . mysqli_error($baglanti);
        }
    }
?>
<form action="kategoriduzenle.php" method="post">
    <div class="form-group mb-3">
        <label>Kategori Adı</label>
        <input type="text" class="form-control" name="kategoriadi" value="
        <?php 
            echo $kayit['kategori_adi'];
        ?>">
    </div>
    <input type="hidden" name="kategoriid" value="
    <?php 
        echo $kayit['kategori_id'];
    ?>"/>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>