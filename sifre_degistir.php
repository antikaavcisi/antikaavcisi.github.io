<!DOCTYPE HTML>
<?php include("function.php"); ?>
<html>
	<head>
		<title><?php sitebaslik(); ?> > Şifre Değiştir</title>
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
					<div class="title">Şifre Değiştir</div>
					<div class="container">
						<div class="row gtr-150">
							<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
							<div class="col-4 col-12-medium imp-medium">
								<form action="sifre_degistir.php" method="post">
									<input type="password" placeholder="Eski Şifre" id="sifreeski" name="sifreeski" class="yaziortala" onkeypress="return uzunkontrol(this.value,20);" minlength="6" required><br>
									<input type="password" placeholder="Yeni Şifre" id="sifreyeni" name="sifreyeni" class="yaziortala" onkeypress="return uzunkontrol(this.value,20);" minlength="6" required><br>
									<input type="password" placeholder="Yeni Şifre Tekrar" id="sifreyenit" name="sifreyenit" class="yaziortala" onkeypress="return uzunkontrol(this.value,20);" minlength="6" required><br>
									<center><input type="submit" value="Şifreyi Değiştir" id="btndegistir" name="btndegistir" class="yaziortala"></center>
								</form>
							</div>
							<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
							<div class="col-4 col-12-medium imp-medium">&nbsp;</div>
								<div class="col-4 col-12-medium imp-medium">
								<?php
									if($_POST)
									{
										include("config.php");
										
										if(!empty($_POST["btndegistir"]))
										{
											if(empty($_POST["sifreeski"]) || empty($_POST["sifreyeni"]) || empty($_POST["sifreyenit"]))
											{
												print '<center><h1 style="color:#e97770;">Hiçbir Alan Boş Geçilemez</h1></center>';
											}
											else if(md5($_POST["sifreeski"])!=$_COOKIE["sifre"])
											{
												print '<center><h1 style="color:#e97770;">Eski Şifre Yanlış</h1></center>';
											}
											else if($_POST["sifreyeni"]!=$_POST["sifreyenit"])
											{
												print '<center><h1 style="color:#e97770;">Yeni Şifreler Uyuşmuyor</h1></center>';
											}
											else
											{
												$query = $db->prepare("UPDATE users SET sifre = :sifre WHERE id = ".$_COOKIE["id"]);
												$update = $query->execute(array("sifre" => md5($_POST["sifreyeni"])));
												if ( $update ){
													 print "<center><h1>Bilgiler Güncellendi<br>Çıkış Yapılıyor</h1></center>';";
													 header("refresh:2;url=cikis.php");
												}
											}
										}
									
										$db=null;
									}
								?>
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