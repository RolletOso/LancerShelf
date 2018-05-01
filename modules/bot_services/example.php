<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
<head>
<title>Mini bots-spiders for your PHP applications - demo page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body {font-family:verdana,arial,sans-serif; color:#191919; font-size:11px;}
	div.resul { font-size:30px; }
	a { color:#D70606; font-weight:bold;}
</style>
</head>
<body>
<h1>Mini bots for your code</h1>

<?
		include("minibots.class.php");
		$mb = new Minibots();

		echo "<h2>Check word spelling with Google</h2><p>Check spelling 'wokipedia':</p><pre>echo \$mb->doSpelling('wokipedia');\n".$mb->doSpelling('wokipedia')."</pre><hr>";

		echo "<h2>Get exchange rates from bank of italy</h2><p>How many u.s. dollars for 1 euro?:</p> <pre>echo \$mb->doExchangeRate('USD','2009-12-24');\n".$mb->doExchangeRate('USD','2009-12-24')."</pre><hr>";
		
		echo "<h2>Make tiny url with tinyurl.com</h2><p>Tiny url for http://www.barattalo.it/tag/file_get_contents/:</p> <pre>echo \$mb->doShortUrl('http://www.barattalo.it/tag/file_get_contents/');\n".$mb->doShortUrl('http://www.barattalo.it/tag/file_get_contents/')."</pre><hr>";

		echo "<h2>Meteo with Google</h2><p>Get meteo data for Milan: </p><pre>print_r( \$mb->doMeteo('Milan') , true );\n".print_r( $mb->doMeteo('Milan') , true ) ."</pre><hr>";

		echo "<h2>Get geo info from ip address</h2><p>Get ip geo data for your ip:</p><pre>print_r( \$mb->doGeoIp() , true );\n".print_r( $mb->doGeoIp() , true ) ."</pre><hr>";

		echo "<h2>SMTP mail validation</h2><p>Validate an email address with smtp call:</p><pre>print_r( \$mb->doSMTPValidation(\"ponsgiulio@rockit.it\") , true );\n".print_r( $mb->doSMTPValidation("ponsgiulio@rockit.it") , true ) ."</pre><hr>";

?>
<a href="http://www.barattalo.iy">download php from this post</a>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-3189741-1";
urchinTracker();
</script>

</body>
</html>