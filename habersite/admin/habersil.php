<?php
    include ('haberleroop.php');
    $haberObj = new Haberler();
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $haber_id = $_GET['id'];
        $haberObj->haberSil($haber_id);
    }
?>