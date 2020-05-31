<?php
	ob_start();
	setcookie("login", "null", time() - 3600);
	setcookie("id", "null", time() - 3600);
	setcookie("kullaniciadi", "null", time() - 3600);
	setcookie("sifre", "null", time() - 3600);
	setcookie("adsoyad", "null", time() - 3600);
	print '<title>Çıkış Yapılıyor</title><span style="font-weight:bold; font-size:22px;text-align:center;">Çıkış Yapılıyor...</span>';
	header ("refresh:3;url=index.php");
?>