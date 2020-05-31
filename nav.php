<?php
$girmis=false;
if(!empty($_COOKIE["login"])){if($_COOKIE["login"]==true){$girmis=true;}}
?>
<nav id="nav">
							<ul>
								<li><a href="index.php">Anasayfa</a></li>
								<li><a href="urunler.php">Ürünler</a></li>
								<?php
									if(!$girmis){print '<li><a href="giris_yap.php">Üye Ol/Giriş Yap</a></li>';}
									else
									{
										print'
											<li>
												<a href="#">Hoşgeldin '.$_COOKIE["kullaniciadi"].'</a>
												<ul>
													<li><a href="uye_bilgileri.php">Üye Bilgileri</a></li>
													<li><a href="sifre_degistir.php">Şifre Değiştir</a></li>
													<li><a href="kazandiklarim.php">Kazandıklarım</a></li>
													<li><a href="cikis.php">Çıkış Yap</a></li>
												</ul>
											</li>
										';
									}
								?>
								
							</ul>
						</nav>