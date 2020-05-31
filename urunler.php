<!DOCTYPE HTML>
<?php include("function.php"); ?>
<html>
	<head>
		<title><?php sitebaslik(); ?> > Ürünler</title>
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
				<section id="highlights" class="wrapper style3">
					<div class="title">Son Eklenenler</div>
					<div class="container">
						<div class="row aln-center">
							<?php
								include("config.php");
								$query = $db->query("select * from urunler_son where kalan > '00:01:00' and aktif=2 order by id desc limit 12", PDO::FETCH_ASSOC);
								if ( $query->rowCount() ){
									 foreach( $query as $row ){
										 $kalanex=explode(":",$row["kalan"]);
										$minteklif=$row["acilis"];
										$kdd=$row["id"];
										$querymin = $db->query("SELECT MAX(teklif) as enbuyuk FROM teklif WHERE urun_id = '{$kdd}'")->fetch(PDO::FETCH_ASSOC);
										if($minteklif<$querymin["enbuyuk"]){$minteklif=$querymin["enbuyuk"];}
										 print'
											<div class="col-4 col-12-medium">
												<section class="highlight">
													<a href="urun_detay.php?no='.$row["id"].'" class="image featured"><img src="'.$row["resimpath"].'" alt="" /></a>
													<h3><a href="urun_detay.php?no='.$row["id"].'">'.$row["urunbaslik"].'</a></h3>
													<p>'.$row["urunaciklama"].'</p>
													<p><b>Açılış Fiyatı : '.$row["acilis"].' ₺</b></p>
													<p><b>Minimum Teklif : '.$row["acilis"].' ₺</b></p>
													<h3 id="'.$row["id"].'"></h3>
													<ul class="actions">
														<li><a href="urun_detay.php?no='.$row["id"].'" class="button style1">Hemen Teklif Ver</a></li>
													</ul>
												</section>
												<script>
													var kalan'.$row["id"].'saniye=('.$kalanex[0].'*3600)+('.$kalanex[1].'*60)+('.$kalanex[2].');
													setInterval(function(){
													if(kalan'.$row["id"].'saniye<=2)
													{
														setInterval(function(){window.location.reload(false);},500);
													}
													var y'.$row["id"].'az="";
													var de'.$row["id"].'po=kalan'.$row["id"].'saniye;
													y'.$row["id"].'az+=Math.floor(de'.$row["id"].'po/3600)+":";
													de'.$row["id"].'po=de'.$row["id"].'po%3600;
													y'.$row["id"].'az+=Math.floor(de'.$row["id"].'po/60)+":"+de'.$row["id"].'po%60;
													document.getElementById("'.$row["id"].'").innerHTML=y'.$row["id"].'az;
													kalan'.$row["id"].'saniye--;
													},1000);
												</script>
											</div>
							';
									 }
								}
								$db=null;
							?>
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