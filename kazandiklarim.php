<!DOCTYPE HTML>
<?php include("function.php"); ?>
<html>
	<head>
		<title><?php sitebaslik(); ?> > Kazandıklarım</title>
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
					<div class="title">Kazandıklarım</div>
					<div class="container">
						<div class="row">
							<?php
								include("config.php");
								$ids=Array();
								$paths=Array();
								$basliks=Array();
								$aciklamas=Array();
								$teklifs=Array();
								$kazanmis=true;
								$query = $db->query("SELECT * FROM urunler_son where kalan<'00:00:00' and aktif=2", PDO::FETCH_ASSOC);
								if ( $query->rowCount() ){
									 foreach( $query as $row ){
										 $queryt = $db->query("select max(teklif) as kazanan from teklif where urun_id = ".$row["id"]." and user_id = ".$_COOKIE["id"], PDO::FETCH_ASSOC);
										if ( $queryt->rowCount() ){
											 foreach( $queryt as $rowt ){
												  if(!empty($rowt["kazanan"]))
												  {
													  array_push($ids,$row["id"]);
													  array_push($paths,$row["resimpath"]);
													  array_push($basliks,$row["urunbaslik"]);
													  array_push($aciklamas,$row["urunaciklama"]);
													  array_push($teklifs,$rowt["kazanan"]);
													  
												  }
											 }
										}
									 }
								}
								if(count($ids)>=1)
								{
									for($i=0;$i<count($ids);$i++)
									{
										print '
													  <a href="urun_detay.php?no='.$ids[$i].'">
														<div class="row">
															<div class="col-4 col-12-medium">
																<img class="image" src="'.$paths[$i].'" width="250" height="200">
															</div>
															<div class="col-4 col-12-medium">
																<header class="style2">
																	<h2>'.$basliks[$i].'</h2>
																	<p>'.$aciklamas[$i].'</p>
																</header>
															</div>
															<div class="col-4 col-12-medium">
																<center>Kazanan Teklifiniz : '.$teklifs[$i].'₺</center>
															</div>
														</div>
													  </a>
													  ';
									}
								}
								else
								{
									print '<div class="col-4 col-12-medium">&nbsp;</div><div class="col-4 col-12-medium"><center>Hiç Müzayede Kazanılmamış</center></div><div class="col-4 col-12-medium">&nbsp;</div>';
								}
								
								$db=null;
							?>
						</div>
					</div>
				</div>

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