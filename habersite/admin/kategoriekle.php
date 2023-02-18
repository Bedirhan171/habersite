<?php
    include ('baglanti.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $kategori_adi = $_POST['kategoriadi'];
        $sorgu="INSERT INTO kategori_tablo (kategori_adi) VALUES ('$kategori_adi')";
        if(mysqli_query($baglanti, $sorgu))
        {
            header("Location: kategoriler.php");
        }
        else
        {
            echo "Hata:" . mysqli_error($baglanti);
        }
    }
?>

<form action="kategoriekle.php" method="post">
    <div class="form-group mb-3">
        <label>Kategori Adı</label>
        <input type="text" class="form-control" name="kategoriadi">
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>


<?php 
    include ('../includes/footer.php'); 
?>