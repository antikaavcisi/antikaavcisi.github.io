<?php

if($_POST)
{
	
	include("config.php");

	if($_POST["op"]=="teklifkaydet")
	{
		if(empty($_POST["id"]) || empty($_POST["teklif"]))
		{
			print 'false%&Hiçbir Alan Boş Geçilemez';
			die();
		}
		
		if(!ctype_digit($_POST["teklif"]) || !ctype_digit($_POST["teklif"]))
		{
			print 'false%&Teklif Sadece Rakamlardan Oluşur';
			die();
		}
		
		$query = $db->query("SELECT id,acilis FROM urunler_son WHERE id = ".$_POST["id"]." and kalan > '00:00:01' and aktif=2")->fetch(PDO::FETCH_ASSOC);
		if (!$query ){
			print 'false%&Ürün Bulunamadı';
			die();
		}
		$id=$_POST["id"];
		$minteklif=$query["acilis"];
		$querymin = $db->query("SELECT MAX(teklif) as enbuyuk FROM teklif WHERE urun_id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
		if($minteklif<$querymin["enbuyuk"]){$minteklif=$querymin["enbuyuk"];}
		
		if($_POST["teklif"]<=$minteklif)
		{
			print 'false%&Minimum Teklif Fiyatından Küçük Teklif Veremezsiniz!';
			die();
		}
		
		$query = $db->prepare("INSERT INTO teklif SET urun_id = ?, user_id = ?, teklif = ?");
		$insert = $query->execute(array($_POST["id"], $_COOKIE["id"], $_POST["teklif"]));
		if (!$insert ){
			print 'false%&Teklif Kaydedilirken Hata Oluştu!';
			die();
		}
		else
		{
			print 'true%&success!';
		}
		
		
	}
	
	if($_POST["op"]=="teklifgetir")
	{
		if(empty($_POST["id"]))
		{
			die();
		}
		$yaz="";
		$querysont = $db->query("SELECT user_id,teklif,timestamp FROM teklif where urun_id=".$_POST["id"]." order by teklif desc, timestamp desc limit 10", PDO::FETCH_ASSOC);
		if ( $querysont->rowCount() ){
			foreach( $querysont as $row ){
			$uid=$row["user_id"];
			$queryyy = $db->query("SELECT adsoyad FROM users WHERE id = '{$uid}'")->fetch(PDO::FETCH_ASSOC);
			$tarihparcala=explode(" ",$row["timestamp"]);
			$tarihparcala2=explode("-",$tarihparcala[0]);				
			$yaz.= '<div class="col-4 col-4-medium">'.$queryyy["adsoyad"].' </div><div class="col-4 col-4-medium">'.$row["teklif"].'₺ teklif etti</div><div class="col-4 col-4-medium">'.($tarihparcala2[2].'/'.$tarihparcala2[1].'/'.$tarihparcala2[0].' '.$tarihparcala[1]).'</div>';
			}
		}
		else
		{
			$yaz .='<div class="col-12 col-12-medium" style="color:#e97770;">HİÇ TEKLİF VERİLMEMİŞ</div>';
		}
		$query = $db->query("SELECT acilis FROM urunler_son WHERE id = ".$_POST["id"])->fetch(PDO::FETCH_ASSOC);
		$minteklif=$query["acilis"];
		$querymin = $db->query("SELECT MAX(teklif) as enbuyuk FROM teklif WHERE urun_id = ".$_POST["id"])->fetch(PDO::FETCH_ASSOC);
		if($minteklif<$querymin["enbuyuk"]){$minteklif=$querymin["enbuyuk"];}
		
		$yaz.='%&%&'.($minteklif+1);
		print $yaz;
	}
	
	$db=null;

}

?>