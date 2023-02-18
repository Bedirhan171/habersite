<?php
    include ('baglanti3.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $yazar_eposta = $_POST['yazareposta'];
        $yazar_sifre = $_POST['yazarsifre'];
        $sorgu = "SELECT * FROM yazar_tablo WHERE yazar_eposta='$yazar_eposta' AND yazar_sifre='$yazar_sifre'";
        $veri = $baglanti3->query($sorgu);
        $kayit = $veri->fetch();
        if($kayit) 
        {
            $_SESSION['user'] = $kayit['yazar_eposta'];
            $_SESSION['yazar_id'] = $kayit['yazar_id'];
            $_SESSION['yazaradsoyad'] = $kayit['yazar_adsoyad'];
            header("location: index.php");
        } 
        else
        {
            echo "Kullanıcı adı veya şifre hatalı";
        }
   }
?>
<?php
    session_start();
    if(isset($_SESSION['user'])===false)
    {
        header('location:login.php');
    }
?>
<html lang="tr">
   <head>
        <title>Yazar Girişi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="bg-light mt-4 p-4">
                        <form action="login.php" method="post" class="row g-3">
                            <div class="col-12">
                                <label>Yazar Eposta</label>
                                <input type="text" name="yazareposta" class="form-control">
                            </div>
                            <div class="col-12">
                                <label>Şifre</label>
                                <input type="password" name="yazarsifre" class="form-control">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-dark float-end">Giriş</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>