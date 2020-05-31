<!DOCTYPE HTML>
<?php include("function.php"); ?>
<html>
	<head>
		<title><?php sitebaslik(); ?> > Üye Bilgileri</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/main.pr.css" />
		<script src="assets/js/main.pr.js"></script>
	</head>
	<body class="no-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><?php headerbaslik(); ?></h1>
							<p><?php headericerik(); ?></p>
						</div>

					<!-- Nav -->
						<?php include("nav.php"); ?>

				</section>

			<!-- Main -->
				<div id="main" class="wrapper style2">
					<div class="title">Üye Numarası : <?php print $_COOKIE["id"]; ?></div>
						<div class="container">
							<div class="row gtr-150">
								<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
								<div class="col-4 col-12-medium imp-medium">
								<?php
									$id = $_COOKIE["id"];
									include("config.php");
								
									if($_POST)
									{
										if(!empty($_POST["btnkaydet"]))
										{
											if(empty($_POST["adso"]) || empty($_POST["eposta"]) || empty($_POST["tel"]) || empty($_POST["adres"]))
											{
												print '<center><h1 style="color:#e97770;">Hiçbir Alan Boş Geçilemez</h1></center>';
											}
											else
											{
												$query = $db->prepare("UPDATE users SET adsoyad = :adsoyad, eposta = :eposta, telefon = :telefon, adres = :adres WHERE id = ".$id);
												$update = $query->execute(array("adsoyad" => $_POST["adso"], "eposta" => $_POST["eposta"], "telefon" => $_POST["tel"], "adres" => $_POST["adres"]));
												if ( $update ){
													setcookie("adsoyad",$_POST["adso"],time() + (60*60*5));
													 print "<center><h1>Bilgiler Güncellendi</h1></center>';";
												}
											}
										}
									}
									
									$query = $db->query("SELECT * FROM users WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
									$db=null;
								?>
								</div>
								<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
								<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
								<div class="col-4 col-12-medium imp-medium">
									<form action="uye_bilgileri.php" method="post">
										<input type="text" placeholder="Kullanıcı Adı" id="kadi" name="kadi" class="yaziortala" onkeypress="return uzunkontrol(this.value,15);" disabled readonly value="<?php print $query["kullaniciadi"]; ?>" required><br>
										<input type="text" placeholder="Ad Soyad" id="adso" name="adso" class="yaziortala" onkeypress="return uzunkontrol(this.value,40);" value="<?php print $query["adsoyad"]; ?>" required><br>
										<input type="email" placeholder="E-Posta" id="eposta" name="eposta" class="yaziortala" onkeypress="return uzunkontrol(this.value,50);" value="<?php print $query["eposta"]; ?>" required><br>
										<input type="text" placeholder="Telefon Numarası (10 Hane)" id="tel" name="tel" class="yaziortala" onkeypress="return isNumberKey(event); return uzunkontrol(this.value,10);" value="<?php print $query["telefon"]; ?>" required><br>
										<textarea maxlength="255" class="yaziortala" id="adres" name="adres" placeholder="Adres" style="resize:none;" onkeypress="return uzunkontrol(this.value,255);" required><?php print $query["adres"]; ?></textarea><br>
										<center><input type="submit" value="Değişiklikleri Kaydet" id="btnkaydet" name="btnkaydet" class="yaziortala"></center>
									</form>
								</div>
								<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
							</div>
						</div>
				</div>

			<!-- Footer -->
				<?php include("footer.php"); ?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>