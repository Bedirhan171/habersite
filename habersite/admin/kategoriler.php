<?php
    include ('baglanti.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
?>
<a href="kategoriekle.php" class='btn btn-primary'>Kategori Ekle</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kategori Adı</th>
                <th scope="col">Sil</th>
                <th scope="col">Güncelle</th>
            </tr>
        </thead>
        <tbody>
<?php
    $sorgu = "SELECT * FROM kategori_tablo";
    if($veri = mysqli_query($baglanti, $sorgu))
    {
        if(mysqli_num_rows($veri) > 0)
        {
            while($kayit = mysqli_fetch_array($veri))
            {
                echo "<tr>";
                echo "<td>".$kayit["kategori_id"]."</td>";
                echo "<td>".$kayit["kategori_adi"]."</td>";
                echo "<td><a class='btn btn-danger'
            href='kategorisil.php?id=".$kayit["kategori_id"]."'>Sil</a></td>";
                echo "<td><a class='btn btn-success'
            href='kategoriduzenle.php?id=".$kayit["kategori_id"]."'>Güncelle</a></td>";
                echo "</tr>";
            }
        }
    }
?>
        </tbody>
    </table>
<?php 
    include ('../includes/footer.php'); 
?>