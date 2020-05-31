<?php

function sitebaslik()
{
	include("config.php");
	
	$query = $db->query("SELECT ayaricerigi FROM ayarlar WHERE ayaradi = 'sitebaslik'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		print $query["ayaricerigi"];
	}
	
	$db=null;
}

function headerbaslik()
{
	include("config.php");
	
	$query = $db->query("SELECT ayaricerigi FROM ayarlar WHERE ayaradi = 'headerbaslik'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		print $query["ayaricerigi"];
	}
	
	$db=null;
}

function headericerik()
{
	include("config.php");
	
	$query = $db->query("SELECT ayaricerigi FROM ayarlar WHERE ayaradi = 'headericerik'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		print $query["ayaricerigi"];
	}
	
	$db=null;
}

function adresyaz()
{
	include("config.php");
	
	$query = $db->query("SELECT ayaricerigi FROM ayarlar WHERE ayaradi = 'adres'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		print $query["ayaricerigi"];
	}
	
	$db=null;
}

function epostayaz()
{
	include("config.php");
	
	$query = $db->query("SELECT ayaricerigi FROM ayarlar WHERE ayaradi = 'eposta'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		print $query["ayaricerigi"];
	}
	
	$db=null;
}

function telefonyaz()
{
	include("config.php");
	
	$query = $db->query("SELECT ayaricerigi FROM ayarlar WHERE ayaradi = 'telefon'")->fetch(PDO::FETCH_ASSOC);
	if ( $query ){
		print $query["ayaricerigi"];
	}
	
	$db=null;
}




?>