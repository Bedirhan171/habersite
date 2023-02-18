<?php
    include ('baglanti2.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
?>
<a href="yazarekle.php" class='btn btn-primary'>Yazar Ekle</a>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Yazar Adı Soyadı</th>
            <th scope="col">Sil</th>
            <th scope="col">Güncelle</th>
        </tr>
    </thead>
    <tbody>
<?php
    $sorgu = "SELECT * FROM yazar_tablo";
    if($veri = $baglanti2->query($sorgu))
    {
        if($veri->num_rows > 0)
        {
            while($kayit = $veri->fetch_array())
            {
                echo "<tr>";
                echo "<td>".$kayit["yazar_id"]."</td>";
                echo "<td>".$kayit["yazar_adsoyad"]."</td>";
                echo "<td><a class='btn btn-danger'
                href='yazarsil.php?id=".$kayit["yazar_id"]."'>Sil</a></td>";
                echo "<td><a class='btn btn-success'
                href='yazarduzenle.php?id=".$kayit["yazar_id"]."'>Güncelle</a></td>";
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