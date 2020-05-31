function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function uzunkontrol(deger,uzunluk)
{
	if(deger.length>uzunluk){alert("Maksimum "+uzunluk+" karakter!");return false;}
}

function teklifkaydet(urunid)
{
	var teklifelem=document.getElementById("teklif");
	if(teklifelem.value==null || teklifelem.value=="")
	{
		alert("Teklifinizi Girmediniz!");
	}
	else if(parseInt(teklifelem.value)<parseInt(teklifelem.min))
	{
		alert("Minimum Teklif Fiyatından Küçük Teklif Veremezsiniz!");
	}
	else
	{
		$.ajax({
		type: 'post',
		url: 'ajax.php',
		data: {op: "teklifkaydet", id:urunid, teklif:teklifelem.value},
		success: function(result) {
				var son=result.split("%&");
				if(son[0]!="true")
				{
					alert(son[1]);
				}
				else
				{
					teklifelem.value="";
				}
			}
		});
	}
	
}

function teklifgetir(id)
{
	var getir=setInterval(function(){ 
		$.ajax({
		type: 'post',
		url: 'ajax.php',
		data: {op: "teklifgetir", id:id},
		success: function(result) {
				var son=result.split("%&%&");
				minDegis(son[1]);
				document.getElementById("sonteklif").innerHTML=son[0];
		}
		});
	}, 50);
}

function minDegis(tutar)
{
	document.getElementById("mintyaz").innerHTML=tutar;
	document.getElementById("teklif").min=tutar;
}

function teklifver(elem)
{
	  if (elem.keyCode == 13) {document.getElementById("btnteklif").click();}
}