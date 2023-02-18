<?php
    include ('haberleroop.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    $haberObj = new Haberler();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $haberObj->haberEkle($_POST);
    }
?>
<form action="haberekle.php" method="POST">
    <div class="form-group mb-3">
        <label>Kategori</label>
        <select class="form-select" name="kategoriid">
        <?php
            $sorgu = "SELECT * FROM kategori_tablo";
            $veri = $haberObj->baglanti->query($sorgu);
            while($kayit = $veri->fetch_assoc()) 
            {
                echo "<option value='" . $kayit['kategori_id'] . "'>"
                .$kayit['kategori_adi'] . "</option>";
            }
        ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <label>Haber Başlık</label>
        <input type="text" class="form-control" name="haberbaslik">
    </div>
    <div class="form-group mb-3">
        <label>Haber İçerik</label>
        <textarea class="form-control" name="habericerik" rows="10">
        </textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Kaydet">
</form>
</div>