<?php
    include ('haberleroop.php');
    include ('../includes/header.php');
    include ('../includes/navbaradmin.php');
    $haberObj = new Haberler();
?>
<a href="haberekle.php" class='btn btn-primary'>Haber Ekle</a>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Haber Id</th>
            <th scope="col">Haber Başlık</th>
            <th scope="col">Haber Tarihi</th>
            <th scope="col">Sil</th>
            <th scope="col">Güncelle</th>
        </tr>
        </thead>
        <tbody>
<?php
    foreach($haberObj->haberListe() as $id)
    {   
        echo "<tr>";
        echo "<td>".$haber['haber_id']."</td>";
        echo "<td>".$haber['haber_baslik']."</td>";
        echo "<td>".$haber['haber_tarih']."</td>";
        echo "<td><a class='btn btn-danger' 
    href='habersil.php?id=".$haber['haber_id']."'>Sil</a></td>";
        echo "<td><a class='btn btn-success' 
    href='haberduzenle.php?id=".$haber['haber_id']."'>Güncelle</a></td>";
        echo "</td>";
        echo "</tr>";
    }
        ?>
        </tbody>
    </table>