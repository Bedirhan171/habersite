<?php
    include ('haberleroop.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    $haberObj = new Haberler();
    // Güncellenecek kayıtları getirir.
    if(isset($_GET['id']) && !empty($_GET['id'])) 
    {
        $haber_id = $_GET['id'];
        $haber = $haberObj->haberSec($haber_id);
    }
    // Güncellenen kayıtları kaydeder.
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $haberObj->haberDuzenle($_POST);
    }
?>
<form action="haberduzenle.php" method="POST">
    <div class="form-group mb-3">
        <label>Kategori</label>
        <select class="form-select" name="kategoriid">
        <?php
            $sorgu = "SELECT * FROM kategori_tablo";
            $veri = $haberObj->baglanti->query($sorgu);
            while($kayit = $veri->fetch_assoc())
            {
                if($haber['kategori_id']==$kayit['kategori_id'])
                {
                    echo "<option selected value='" . $kayit['kategori_id'] . "'>" .$kayit['kategori_adi2'] . "</option>";
                }
                else
                {
                    echo "<option value='" . $kayit['kategori_id'] . "'>" .$kayit['kategori_adi'] . "</option>";
                }
            }
        ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <label>Haber Başlık</label>
        <input type="text" class="form-control" name="haberbaslik" value="
        <?php 
            echo $haber['haber_baslik']; 
        ?>">
    </div>
    <div class="form-group mb-3">
        <label>Haber İçerik</label>
        <textarea class="form-control" name="habericerik" rows="10">
        <?php 
            echo $haber['haber_icerik']; 
        ?>
        </textarea>
    </div>
        <input type="hidden" name="id" value="
        <?php 
            echo $haber['haber_id']; 
        ?>">
        <input type="submit" class="btn btn-primary" value="Güncelle">
</form>
</div>