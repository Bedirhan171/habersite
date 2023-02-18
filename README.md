# PHP | MySQL
**Veritabanı eğitim icin yapmış olduğum ufak bi proje
  Bir haber sitesi icerisine yayınlanıcak haberleri, haber kategolerilerini, haberi yazanları, kullanıcı hesab girişi vb. özellik vardır.
  İlk olarak SQL kodları ile veritabanını kuralım.
  Kodlarda üç farklı database bağlantı türü kullandım tavsiyem PDO kullanmasın daha güvenlidir.**

**Veritabanları oluşturmak icin kullanılması gereken sql kodları:**

```sql
  CREATE DATABASE IF NOT EXISTS haberler_db DEFAULT CHARACTER SET utf8 DEFAULT
  COLLATE utf8_turkish_ci;
```

```sql
   CREATE TABLE yazar_tablo(
   yazar_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
   yazar_eposta VARCHAR(50) NOT NULL,
   yazar_sifre VARCHAR(50) NOT NULL,
   yazar_adsoyad VARCHAR(50) NOT NULL
   );
```

```sqql
   CREATE TABLE kategori_tablo(
   kategori_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   kategori_adi VARCHAR(20) NOT NULL
   );
```

```sql
   CREATE TABLE haber_tablo(
   haber_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
   kategori_id INT NOT NULL,
   haber_baslik VARCHAR(100) NOT NULL,
   haber_icerik TEXT,
   yazar_id INT NOT NULL,
   haber_tarih DATETIME DEFAULT CURRENT_TIMESTAMP(),
   FOREIGN KEY (kategori_id) REFERENCES kategori_tablo (kategori_id),
   FOREIGN KEY (yazar_id) REFERENCES yazar_tablo (yazar_id)

   );
```

**Eğer PhpMyAdmin panelini kullanmayı bilmiyorsanız komut satırı üzerindende sql kodlarını kullanarak veritabanını oluşturabilirsiniz.
MySQLsunucu yazılımı kullanılıyor ise yazılımın kurulu olduğu c:\Program Files\MySQL\MySQL Server 8.0\
bin klasörüne geçiş yapılarak aşağıdaki örnek verilen komut dizesi yazılarak mysql client başlatılır.**

```cmd
mysql -u username -h hostname -p
```

**• -u parametresi ile kullanıcı adı belirtilir. <br>
• -h parametresi ile MySQL sunucusunun bulunduğu bilgisayarın adresi belirtilir.Yerel bilgisayarda çalışılıyor ise kullanılmayabilir.<br>
• -p parametresi ile MySQL sunucusuna bağlanmak için kullanılan şifre belirtilir.<br>**



