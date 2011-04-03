<?php
include_once 'simplehtmldom/simple_html_dom.php';

$query = $_POST["query"];

if (!isset($_POST['submit'])){

?>

<html>
<head>
<title>MOVIE RATINGS FOR IDIOTS</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.xdomainajax.js"></script>
</head>
<body>
<div style="width:100%;height:100%;">
<form method="post" action="<?php echo $PHP_SELF;?>" style="position:relative;top:35%;">
<input type="text" class="checker" name="query" placeholder="MOVIE TITLE HERE OBVIOUSLY" style="width:700px;height:50px;font-size:40px;font-family:helvetica;position:relative;left:50%;margin-left:-350px;">
<br /><br /><button type="submit" value="submit" name="submit" style="width: 340px;height: 52px;font-size: 36px;position: relative;left: 50%;margin-left: -160px;">ENLIGHTEN ME</button>
<div id="data" style="width:300px; height:300px;position:absolute;left:200px;top:100px;"></div>
</form>
</div>
<script type="text/javascript">

//$('.checker').keyup(function(event){
//	var query = $(".checker").val();
//	console.log(query);
//	$.ajax({
//	    url: "http://www.google.com/search?hl=en&q=allintitle:"+query+"+-review+site:moki.tv/movie",
//	    type: 'GET',
//	    success: function(res) {
//	        var headline = $(res.responseText).find('a').text();
//	        alert(headline);
//	    }
//	});
    //var url = "http://www.google.com";
    //$("#data").load(url);    
//});

</script>


</body>
</html>



<?php
} else {

	function get_content($url)
	{
	    $ch = curl_init();

	    curl_setopt ($ch, CURLOPT_URL, $url);
	    curl_setopt ($ch, CURLOPT_HEADER, 0);

	    ob_start();

	    curl_exec ($ch);
	    curl_close ($ch);
	    $string = ob_get_contents();

	    ob_end_clean();

	    return $string;     
	}

$filtered = str_replace(" ","-",$query);

$sonofabitch = str_replace('\\',"",$filtered);
$filtered2 = str_replace('\'',"",$sonofabitch);
$filtered3 = str_replace(":","",$filtered2);

$url = "http://moki.tv/movie/$filtered3";

//$html = file_get_html($url);
$strhtml = get_content($url);
$html = str_get_html($strhtml);
$stuff = $html->find("div.rating",0);

$stuff2 = $stuff->plaintext;
$stuff3 = trim($stuff2);
$stuff4 = substr($stuff3,0,3);

$g=floatval($stuff4);
if ($g > 4.4){
	
	echo "<div style='width:100%;height:100%;'><div style='font-size:50px;font-family:Helvetica;position:relative;top:35%;width:100%;text-align:center;'>JESUS HOLY DICKING CHRIST WATCH THIS GOD DAMN FUCKING ASS SHIT CRAZY MOVIE. WHAT THE FUCK.</div><form style='position:relative;left:50%;margin-left:-225px;top:40%;width:500px;' action='http://www.olli.es/fun/index.php'><button type='submit' style='height:40px;width:450px;font-size:30px;font-family:helvetica;'>ANOTHER FUCKING MOVIE</button></form></div>";
}
elseif (4.0 < $g && $g<= 4.4){
	echo "<div style='width:100%;height:100%;'><div style='font-size:50px;font-family:Helvetica;position:relative;top:35%;width:100%;text-align:center;'>WORTH FUCKING WATCHING.</div><form style='position:relative;left:50%;margin-left:-225px;top:40%;width:500px;' action='http://www.olli.es/fun/index.php'><button type='submit' style='height:40px;width:450px;font-size:30px;font-family:helvetica;'>ANOTHER FUCKING MOVIE</button></form></div>";
}
elseif (3.6 < $g && $g <= 4.0){
	echo "<div style='width:100%;height:100%;'><div style='font-size:50px;font-family:Helvetica;position:relative;top:35%;width:100%;text-align:center;'>KINDA FUCKING BETTER THAN AVERAGE.</div><form style='position:relative;left:50%;margin-left:-225px;top:40%;width:500px;' action='http://www.olli.es/fun/index.php'><button type='submit' style='height:40px;width:450px;font-size:30px;font-family:helvetica;'>ANOTHER FUCKING MOVIE</button></form></div>";
}
elseif (2.5 < $g && $g <= 3.6){
	echo "<div style='width:100%;height:100%;'><div style='font-size:50px;font-family:Helvetica;position:relative;top:35%;width:100%;text-align:center;'>ONLY IF YOU'RE FUCKING BORED.</div><form style='position:relative;left:50%;margin-left:-225px;top:40%;width:500px;' action='http://www.olli.es/fun/index.php'><button type='submit' style='height:40px;width:450px;font-size:30px;font-family:helvetica;'>ANOTHER FUCKING MOVIE</button></form></div>";
}
elseif (0.0 < $g && $g <= 2.5) {
	echo "<div style='width:100%;height:100%;'><div style='font-size:50px;font-family:Helvetica;position:relative;top:35%;width:100%;text-align:center;'>HOLY FUCK STAY THE FUCK AWAY FUCK.</div><form style='position:relative;left:50%;margin-left:-225px;top:40%;width:500px;' action='http://www.olli.es/fun/index.php'><button type='submit' style='height:40px;width:450px;font-size:30px;font-family:helvetica;'>ANOTHER FUCKING MOVIE</button></form></div>";
}
else {
	echo "<div style='width:100%;height:100%;'><div style='font-size:50px;font-family:Helvetica;position:relative;top:35%;width:100%;text-align:center;'>THAT'S NOT A FUCKING MOVIE.</div><form style='position:relative;left:50%;margin-left:-225px;top:40%;width:500px;' action='http://www.olli.es/fun/index.php'><button type='submit' style='height:40px;width:450px;font-size:30px;font-family:helvetica;'>TRY THE FUCK AGAIN</button></form></div>";	
}
}
?>


