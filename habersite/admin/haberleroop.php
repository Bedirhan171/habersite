<?php
class Haberler
    {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "haberler_db";
        public $baglanti;
        public function __construct()
        {
            $this->baglanti = new mysqli($this->servername,
            $this->username, $this->password,
            $this->database);
            if($this->baglanti === false)
            {
                die("Hata:" . $this->baglanti->connect_error);
            }
            else
            {
                return $this->baglanti;
            }
        }
    
        public function haberEkle($post)
        {
            session_start();
            $kategori_id = $_POST['kategoriid'];
            $haber_baslik =$_POST['haberbaslik'];
            $haber_icerik =$_POST['habericerik'];
            $yazar_id = $_SESSION['yazar_id'];
            $sorgu="INSERT INTO haber_tablo(kategori_id,haber_baslik,haber_icerik,yazar_id) VALUES('$kategori_id','$haber_baslik','$haber_icerik','$yazar_id')";
            $sonuc = $this->baglanti->query($sorgu);
            if ($sonuc == true) 
            {
                header("Location:haberler.php");
            }
            else
            {
                echo "Kayıt işlemi başarısız!". $this->baglanti->error;
            }
        }
        public function haberListe()
        {
            $sorgu = "SELECT * FROM haber_tablo";
            $veri = $this->baglanti->query($sorgu);
            if ($veri->num_rows > 0)
            {
                $haberler = array();
                while ($kayit = $veri->fetch_assoc())
                {
                    $haberler[] = $kayit;
                }
                return $haberler;
            }
            else
            {
                echo "Kayıt bulunamadı.";
            }
        }
        public function haberSil($id)
        {
            $sorgu = "DELETE FROM haber_tablo WHERE haber_id = '$id'";
            $sonuc = $this->baglanti->query($sorgu);
            if($sonuc==true)
            {
                header("Location:haberler.php");
            }
            else
            {
                echo "Haber silinemedi.";
            }
        }
        public function haberSec($id)
        {
            $sorgu = "SELECT * FROM haber_tablo WHERE haber_id = '$id'";
            $sonuc = $this->baglanti->query($sorgu);
            if ($sonuc->num_rows > 0) 
            {
                $haber = $sonuc->fetch_assoc();
                return $haber;
            }
            else
            {
                echo "Kayıt bulunamadı.";
            }
        }
        public function haberDuzenle($post)
        {
            session_start();
            $haber_id = $_POST['id'];
            $kategori_id = $_POST['kategoriid'];
            $haber_baslik =$_POST['haberbaslik'];
            $haber_icerik =$_POST['habericerik'];
            $yazar_id = $_SESSION['yazar_id'];
            if (!empty($haber_id) && !empty($post)) 
            {
                $sorgu = "UPDATE haber_tablo SET kategori_id = '$kategori_id',
                haber_baslik = '$haber_baslik',
                haber_icerik = '$haber_icerik',
                yazar_id = '$yazar_id'
                WHERE haber_id = $haber_id";
                $sonuc = $this->baglanti->query($sorgu);
                if ($sonuc==true)
                {
                    header("Location:haberler.php");
                }
                else
                {
                    echo "Güncelleme yapılamadı!.". $this->baglanti->error;
                }
            }
        }
    }
?>