<?php
	$acik=true;
	if(empty($_GET["no"]))
	{
		header("Location:index.php");
	}
	else
	{
		include("config.php");
		
		$id = $_GET["no"]; 
		$minteklif=0;
		$query = $db->query("SELECT * FROM urunler_son WHERE id = '{$id}' and aktif=2")->fetch(PDO::FETCH_ASSOC);
		if ( !$query ){
			header("Location:index.php");
		}
		else if($query["kalan"]<'00:00:00')
		{
			$acik=false;
		}
		$minteklif=$query["acilis"];
		$querymin = $db->query("SELECT MAX(teklif) as enbuyuk FROM teklif WHERE urun_id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
		if($minteklif<$querymin["enbuyuk"]){$minteklif=$querymin["enbuyuk"];}
		$db=null;
	}
?>

<!DOCTYPE HTML>
<?php include("function.php"); ?>
<html>
	<head>
		<title><?php sitebaslik(); print ' > '.$query["urunbaslik"]; ?></title>
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
					<div class="title"><?php print $query["urunbaslik"]; ?></div>
					<div class="container">

						<!-- Content -->
							
						<div class="row gtr-150">
							<div class="col-6 col-12-medium">
									<img class="image" src="<?php print $query["resimpath"]; ?>" width="400" height="350">
							</div>
							<div class="col-6 col-12-medium">
									<header class="style2">
										<h2><?php print $query["urunbaslik"]; ?></h2>
										<p><?php print $query["urunaciklama"]; ?></p>
									</header>
									<div class="feature-list">
										<div class="row">
											<div class="col-12 col-12-medium">
											<center><h1 class="style1"><span id="kalansure" style="color:#e97770;"></span></h1></center>
												<?php
													if($acik)
													{
													print '
														<script>
															var kalanex="'.$query["kalan"].'";
															kalanex=kalanex.split(":");
															var kalansaniye=((parseInt(kalanex[0]))*3600)+((parseInt(kalanex[1]))*60)+((parseInt(kalanex[2])));
																setInterval(function(){
															if(kalansaniye<=2)
															{
																setInterval(function(){window.location.reload(false);},500);
															}
															var yaz="";
															var depo=kalansaniye;
															yaz+=Math.floor(depo/3600)+":";
															depo=depo%3600;
															yaz+=Math.floor(depo/60)+":"+depo%60;
															document.getElementById("kalansure").innerHTML=yaz;
															kalansaniye--;
															},1000);
														</script>
													';
													}
												?>
											</div>
										</div>
										<div class="row">
											<div class="col-12 col-12-medium" style="color:#e97770;">Açılış Fiyatı : <?php print $query["acilis"]; ?>₺<br>Verilebilecek Minimum Teklif : <span id="mintyaz"><?php print $minteklif+1; ?></span>₺</div>
											<div class="col-6 col-12-medium">
												<form onsubmit="return false;">
													<input type="text" placeholder="Teklifiniz" id="teklif" name="teklif" class="yaziortala" min="<?php print $minteklif+1; ?>" onkeypress="teklifver(event); return isNumberKey(event);" <?php if(!$acik){print 'disabled';} if(empty($_COOKIE["login"])){print 'disabled readonly alt="Teklif Verebilmek İçin Üye Girişi Yapmanız Gereklidir"';} ?>>
												</form>
											</div>
											<div class="col-6 col-12-medium">
												<input type="button" value="Teklif Ver" id="btnteklif" name="btnteklif" class="yaziortala" <?php if(!$acik){print 'disabled';}else{print 'onclick="teklifkaydet('.$query["id"].')"';} if(empty($_COOKIE["login"])){print 'disabled alt="Teklif Verebilmek İçin Üye Girişi Yapmanız Gereklidir"';} ?>>
											</div>
											<div class="col-12 col-12-medium">
												<?php
												
												if(!$acik)
												{
													include("config.php");
													$idd = $query['id']; 
													$queryy = $db->query("SELECT user_id FROM teklif WHERE urun_id = '{$idd}' order by teklif desc limit 1")->fetch(PDO::FETCH_ASSOC);
													$iddd=$queryy["user_id"];
													$queryyy = $db->query("SELECT adsoyad FROM users WHERE id = '{$iddd}'")->fetch(PDO::FETCH_ASSOC);
													$db=null;
													if(empty($queryyy["adsoyad"])){$queryyy["adsoyad"]="Hiçkimse";}
													print 'Açık Artırmayı Kazanan : <span style="color:#e97770;">'.$queryyy["adsoyad"].'</span>';
												}
												?>
												<div class="feature-list">
													<div class="row">
														<div class="col-12 col-12-medium">ÜRÜNE VERİLEN SON 10 TEKLİF</div>
														<div class="row" id="sonteklif"></div>
													</div>
												</div>
												<script>teklifgetir(<?php print $query['id']; ?>);</script>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			<!-- Highlights -->
			<?php include("son_eklenen_3.php"); ?>

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