				<section id="highlights" class="wrapper style3">
					<div class="title">Son Eklenen Ürünler</div>
					<div class="container">
						<div class="row aln-center">
							<?php
include("config.php");
$sql="select * from urunler_son where kalan > '00:01:00' and aktif=2";
if(!empty($_GET["no"])){$sql.=" and id!=".$_GET["no"];}
$sql.=" order by id desc limit 3";
	$query = $db->query($sql, PDO::FETCH_ASSOC);
	if ( $query->rowCount() ){
		foreach( $query as $row ){
			$sayi=rand();
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
						<h3 id="'.$sayi.'"></h3>
						<ul class="actions">
							<li><a href="urun_detay.php?no='.$row["id"].'" class="button style1">Hemen Teklif Ver</a></li>
						</ul>
					</section>
					<script>
						var kalan'.$sayi.'saniye=('.$kalanex[0].'*3600)+('.$kalanex[1].'*60)+('.$kalanex[2].');
							setInterval(function(){
						if(kalan'.$sayi.'saniye<=2)
						{
							setInterval(function(){window.location.reload(false);},500);
						}
						var y'.$sayi.'az="";
						var de'.$sayi.'po=kalan'.$sayi.'saniye;
						y'.$sayi.'az+=Math.floor(de'.$sayi.'po/3600)+":";
						de'.$sayi.'po=de'.$sayi.'po%3600;
						y'.$sayi.'az+=Math.floor(de'.$sayi.'po/60)+":"+de'.$sayi.'po%60;
						document.getElementById("'.$sayi.'").innerHTML=y'.$sayi.'az;
						kalan'.$sayi.'saniye--;
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