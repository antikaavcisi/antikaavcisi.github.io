<!DOCTYPE HTML>
<?php include("function.php"); ?>
<html>
	<head>
		<title><?php sitebaslik(); ?> > Üye Ol / Giriş Yap</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/main.pr.css" />
		<script src="assets/js/main.pr.js"></script>
	</head>
	<body class="left-sidebar is-preload">
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
				<section id="main" class="wrapper style2">
					<div class="container">
						<div class="row gtr-150">
							<div class="col-8 col-12-medium imp-medium">

								<!-- Content -->
									<div id="content">
										<article class="box post">
											<header class="style1">
												<h2>ÜYE OL</h2>
											</header>
											<div class="content">
												<form action="giris_yap.php" method="post">
													<center>
														<input type="text" placeholder="Kullanıcı Adı" id="kadisign" name="kadisign" class="yaziortala" onkeypress="return uzunkontrol(this.value,15);" required><br>
														<input type="password" placeholder="Şifre" id="sifresign" name="sifresign" class="yaziortala" onkeypress="return uzunkontrol(this.value,20);" minlength="6" required><br>
														<input type="password" placeholder="Şifre Tekrar" id="sifretekrsign" name="sifretekrsign" class="yaziortala" onkeypress="return uzunkontrol(this.value,20);" minlength="6" required><br>
														<input type="text" placeholder="Ad Soyad" id="adsosign" name="adsosign" class="yaziortala" onkeypress="return uzunkontrol(this.value,40);" required><br>
														<input type="email" placeholder="E-Posta Adresi" id="epostasign" name="epostasign" class="yaziortala" onkeypress="return uzunkontrol(this.value,50);" required><br>
														<input type="text" maxlength="10" placeholder="Telefon Numarası (10 Hane)" id="telsign" name="telsign" class="yaziortala" minlength="10" maxlength="10" onkeypress="return isNumberKey(event); return uzunkontrol(this.value,10);" required><br>
														<textarea maxlength="255" class="yaziortala" id="adressign" name="adressign" placeholder="Adres" style="resize:none;" onkeypress="return uzunkontrol(this.value,255);" required></textarea><br>
														<input type="submit" value="Üye Ol" id="btnsign" name="btnsign" class="yaziortala">
													</center>
												</form>
											</div>
									</div>

							</div>
							<div class="col-4 col-12-medium imp-medium">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="box">
											<header>
												<h2 class="yaziortala">Giriş Yap</h2>
											</header>
											<form action="giris_yap.php" method="post">
												<center><input type="text" placeholder="Kullanıcı Adı" id="kadilogin" name="kadilogin" class="yaziortala" required><br>
												<input type="password" placeholder="Şifre" id="sifrelogin" name="sifrelogin" class="yaziortala" required><br>
												<input type="submit" value="Giriş Yap" id="btnlogin" name="btnlogin" class="yaziortala"></center>
											</form>
											<?php 
												if($_POST)
												{
													include("config.php");
													
													if(!empty($_POST["btnlogin"]))
													{
														$kadi = $_POST["kadilogin"]; 
														$sifre=md5($_POST["sifrelogin"]);
														$query = $db->query("Select id,kullaniciadi,sifre,adsoyad from users where kullaniciadi= '{$kadi}' and sifre= '{$sifre}'")->fetch(PDO::FETCH_ASSOC);
														if ( $query ){
															 setcookie("login",true,time() + (60*60*5));
															 setcookie("id",$query["id"],time() + (60*60*5));
															 setcookie("kullaniciadi",$query["kullaniciadi"],time() + (60*60*5));
															 setcookie("sifre",$query["sifre"],time() + (60*60*5));
															 setcookie("adsoyad",$query["adsoyad"],time() + (60*60*5));
															 header("Location: index.php");
														}
														else
														{
															print '<center><h1 style="color:#e97770;">Kullanıcı Adı/Şifre Yanlış</h1></center>';
														}
													}
													
													$db=null;
												}
											?>
										</section>
									</div>
							</div>
							<div class="col-12 col-12-medium imp-medium">
								<?php
									if($_POST)
									{
										include("config.php");
										if(!empty($_POST["btnsign"]))
										{
											if(empty($_POST["kadisign"]) || empty($_POST["sifresign"]) || empty($_POST["sifretekrsign"]) || empty($_POST["adsosign"]) || empty($_POST["epostasign"]) || empty($_POST["telsign"]) || empty($_POST["adressign"]))
											{
												print '<center><h1 style="color:#e97770;">Hiçbir Alan Boş Bırakılamaz</h1></center>';
											}
											else
											{
												$kadi = $_POST['kadisign']; 
												$query = $db->query("SELECT kullaniciadi FROM users WHERE kullaniciadi = '{$kadi}'")->fetch(PDO::FETCH_ASSOC);
												if ( $query ){
													print '<center><h1 style="color:#e97770;">Kullanıcı Adı Kullanımda</h1></center>';
												}
												else
												{
													$eposta = $_POST['epostasign']; 
													$query = $db->query("SELECT eposta FROM users WHERE eposta = '{$eposta}'")->fetch(PDO::FETCH_ASSOC);
													if ( $query ){
														print '<center><h1 style="color:#e97770;">E-Posta Adresi Kayıtlı</h1></center>';
													}
													else
													{
														$telefon = $_POST['telsign']; 
														$query = $db->query("SELECT telefon FROM users WHERE telefon = {$telefon}")->fetch(PDO::FETCH_ASSOC);
														if ( $query ){
															print '<center><h1 style="color:#e97770;">Telefon Numarası Kayıtlı</h1></center>';
														}
														else
														{
															if($_POST["sifresign"]!=$_POST["sifretekrsign"])
															{
																print '<center><h1 style="color:#e97770;">Şifreler Aynı Değil</h1></center>';
															}
															else
															{
																$query = $db->prepare("INSERT INTO users SET kullaniciadi = :kullaniciadi, sifre = :sifre, adsoyad = :adsoyad, eposta = :eposta, telefon = :telefon, adres = :adres");
																$insert = $query->execute(array("kullaniciadi" => $_POST["kadisign"], "sifre" => md5($_POST["sifresign"]), "adsoyad" => $_POST["adsosign"], "eposta" => $_POST["epostasign"], "telefon" => $_POST["telsign"], "adres" => $_POST["adressign"]));
																if ( $insert ){
																	 print '<center><h1 style="color:#e97770;">Başarıyla Kayıt Oldunuz<br>Giriş Yapabilirsiniz</h1></center>';
																}
															}
														}
													}
												}
											}
										}
										
										$db=null;
									}
								?>
							</div>
						</div>
					</div>
				</section>

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