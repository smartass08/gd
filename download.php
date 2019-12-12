<?php
include 'curl.php';
include 'func.php';

$clean = fopen('error_log', 'w');
fwrite($clean,'');
fclose($clean);

$gdid = hex2bin($_GET['gd']);
$id = $_GET['gd'];
 
 function udud($id){
		$ch = curl_init("https://drive.google.com/uc?id=$id&authuser=0&export=download");
		curl_setopt_array($ch, array(
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POSTFIELDS => [],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => 'gzip,deflate',
			CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
			CURLOPT_HTTPHEADER => [
				'accept-encoding: gzip, deflate, br',
				'content-length: 0',
				'content-type: application/x-www-form-urlencoded;charset=UTF-8',
				'origin: https://drive.google.com',
				'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36',
				'x-client-data: CKG1yQEIkbbJAQiitskBCMS2yQEIqZ3KAQioo8oBGLeYygE=',
				'x-drive-first-party: DriveWebUi',
				'x-json-requested: true'
			]
		));
		$response = curl_exec($ch);
		$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($response_code == '200') { // Jika response status OK
			$object = json_decode(str_replace(')]}\'', '', $response));
			if(isset($object->downloadUrl)) {
				return $object->downloadUrl;
			} 
		} else {
			return $response_code;
		}
}
$docsurl = bin2hex(udud($id));
$dllink = 'https://drive.google.com/uc?id='.$gdid.'';
$gdlink = bin2hex($dllink);
$dl1 = 'https://fs170.herokuapp.com/?id='.$docsurl.'';
$dl2 = 'https://fs170.herokuapp.com/?id='.$docsurl.'';
$dl3 = 'https://fs170.herokuapp.com/?id='.$docsurl.'';
$kamu = array(''.$dl1.'',''.$dl2.'',''.$dl3.'');
$download = $kamu[rand(0,(count($kamu)-1))];

$grogol = grab('https://www.grogol.us/drive/'.$gdid.'');
$pecah = explode('<div class="main_menu"><table>', $grogol);
$size = explode('<tr><td class="p_s">Size</td><td class="p_m">', $pecah[1]);
$size = explode('</td></tr>', $size[1]);
$time = explode('<tr><td class="p_s">Time</td><td class="p_m">', $pecah[1]);
$time = explode('</td></tr>', $time[1]);
$pecaho = explode('<head>', $grogol);
$title = explode('<title>', $pecaho[1]);
$title = explode(' - GROGOLDRIVE LINK', $title[1]);

if(empty($title[1])){
echo '<!DOCTYPE html>
<html style="height:100%">
<head>
    <title>404 Not Found :( &#8211; SaRDrive</title>
    <meta name="description" content="Error Content Not Found"/>
    <link rel="canonical" href="https://sardrive.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="404 Not Found :( &#8211; SaRDrive" />
    <meta property="og:description" content="Error Content Not Found" />
    <meta property="og:url" content="https://sardrive.com/" />
    <meta property="og:site_name" content="404 Not Found :( &#8211; SaRDrive" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Error Content Not Found" />
    <meta name="twitter:title" content="SaRDrive - Safely store and share your photos, videos, files and more in the cloud." />
	<meta name="theme-color" content="#E52775" />
	<meta name="msapplication-navbutton-color" content="#E52775" />
	<meta name="msapplication-TileColor" content="#E52775"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="#E52775" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link href=\'https://fonts.googleapis.com/css?family=Ubuntu\' rel=\'stylesheet\' />
</head>
<body style="color: #444; margin-top:15px;font: normal 14px/20px Arial, Helvetica, sans-serif; height:50%; background-color: #fff;">
<h1 style="font-family:Ubuntu;margin:6px;padding:2px;">404 File Not Found...!!!</h1><br/>
<p style="font-family:Ubuntu;margin:6px;padding:2px;font-weight:bold;">Reason:<br/>- File deleted by Administrator<br/>- Wrong URL Generator<br/>- Account with all files suspended/deleted by host provider<br/>- Deleted because complaint DMCA</p>
<p style="font-family:Ubuntu;margin:6px;padding:2px;font-weight:bold;"><a href="https://docs.google.com/forms/d/e/1FAIpQLSfzTYKY-UAOUN1xIhoYXtZ52c-bmeBNvleBURs7z6eCJJwLzg/viewform" title="Request" target="_blank"><strong>&#x27A4; Request Reupload Here..!!</strong></a></p>
</body>
</html>';
}else{
echo '<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="'.$titlegenerator.' &#8211; Free Download '.$title[0].', '.$title[0].' MP3, AAC, ZIP, RAR, FLAC, Google Drive, iTunes, Amazon, Mora, YouTube, Generate Link Download '.$title[0].'"/>
    <meta name="keywords" content="'.$titlegenerator.', Generator, Generate, Link Download, Music, Download, Unduh, '.$title[0].', MP3, AAC, ZIP, RAR, FLAC, Google Drive, iTunes, Amazon, Mora, YouTube"/>
    <meta name="author" content="Shinoa"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0"/>
    <meta name="google-site-verification" content="'.$google.'" />
    <meta name="alexaVerifyID" content="'.$alexa.'" />
    <meta name="msvalidate.01" content="'.$bing.'" />
    <meta name="juicyads-site-verification" content="'.$juicyver.'" />
    <meta name="mobile-web-app-capable" content="yes"/>
	<meta name="theme-color" content="#E52775" />
	<meta name="msapplication-navbutton-color" content="#E52775" />
	<meta name="msapplication-TileColor" content="#E52775"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="#E52775" />
    <meta property="og:description" content="'.$titlegenerator.' &#8211; Free Download '.$title[0].', '.$title[0].' MP3, AAC, ZIP, RAR, FLAC, Google Drive, iTunes, Amazon, Mora, YouTube, Generate Link Download '.$title[0].'"/>
    <meta property="og:type" content="website"/>
    <title>'.$title[0].' &#8211; '.$titlegenerator.'</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.9/css/bootstrap-material-design.min.css"/>
    <link rel="stylesheet" type="text/css" href="/styles.css"/>
    <link type="text/css" rel="stylesheet" href="https://assets.sardeath.com/sh/css/common.css" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
<!-- PopAds.net Popunder Code for sardrive.com | 2018-11-28,3011695,0,0 -->
<script type="text/javascript" data-cfasync="false">
/*<![CDATA[/* */
/* Privet darkv. Each domain is 2h fox dead */
 (function(){ var y=window;y["_p\x6f\u0070"]=[["\u0073\x69\x74\u0065\u0049\u0064",3011695],["\x6d\x69\u006eBid",0],["\x70\u006f\x70u\u006e\u0064\x65r\x73\x50\x65\u0072\u0049\u0050",0],["d\u0065l\u0061\x79\u0042\u0065\x74\x77e\u0065\u006e",0],["de\u0066\x61\u0075l\x74",false],["\x64\x65\x66\u0061u\u006c\x74P\u0065r\x44\u0061y",0],["\x74\u006f\u0070\x6do\x73\x74L\x61\u0079\u0065\x72",!0]];var j=["\x2f/\u0063\x31\x2e\u0070\x6f\u0070\x61\x64s\x2e\u006e\u0065t\u002fp\u006f\u0070.j\x73","//\u00632\x2e\u0070\u006f\u0070\x61\u0064s.\u006e\x65\u0074\x2f\x70\u006fp\u002ejs","\x2f/\u0077\u0077\u0077.\u0076\x71q\x76\u0070o\x75\u0069f\x68\u0076\u002e\u0063o\u006d/\x62\u002ejs","\u002f/\u0077\x77\x77\x2e\x76\u006a\u0063ew\u006bcjqu.c\x6f\u006d/\u0077.\u006a\x73",""],u=0,d,q=function(){if(""==j[u])return;d=y["\u0064o\u0063\u0075\x6d\x65nt"]["cre\u0061\x74e\x45le\u006den\x74"]("s\u0063r\u0069pt");d["\u0074\x79\u0070\u0065"]="\u0074e\x78\x74\u002f\u006a\u0061\u0076\u0061\x73\u0063\x72i\u0070t";d["\u0061\x73\x79nc"]=!0;var h=y["\u0064\x6f\x63u\u006dent"]["ge\u0074Ele\u006d\x65\x6e\u0074\x73\x42\u0079\u0054\x61g\x4ea\u006de"]("\u0073c\u0072ip\x74")[0];d["\x73\x72\x63"]=j[u];if(u<2){d["\x63r\u006fs\x73\x4f\x72\x69gin"]="a\u006e\x6f\x6e\u0079\u006d\u006f\u0075s";};d["\x6f\u006e\u0065\u0072ro\u0072"]=function(){u++;q()};h["\u0070\x61\u0072\u0065\x6e\u0074N\u006f\x64\u0065"]["\x69\u006e\u0073\u0065\u0072\u0074\u0042\x65\u0066\x6f\u0072e"](d,h)};q()})();
/*]]>/* */
</script>

<!-- BEGIN ADREACTOR CODE -->
<script data-cfasync="false">
var _avp = _avp || [];
(function() {
var s = document.createElement(\'script\');
s.type = \'text/javascript\'; s.async = true; s.src = window.location.protocol + \'//adserver.adreactor.com/js/libcode3.js\';
var x = document.getElementsByTagName(\'script\')[0];
x.parentNode.insertBefore(s, x);
})();
</script>
<!-- END ADREACTOR CODE -->
<script type="text/javascript">
// FUCK YOU PEEK AT MY SITE CODE
// by Shinoa
function mousedwn(e){try{if(event.button==2||event.button==3)return false}catch(e){if(e.which==3)return false}}document.oncontextmenu=function(){return false};document.ondragstart=function(){return false};document.onmousedown=mousedwn</script>  <script type="text/javascript">/*<![CDATA[*/window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}/*]]>*/</script>
<script type="text/javascript">document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}</script>
<script type=\'text/javascript\'>
//<![CDATA[
function generate() {
    var linkDL = document.getElementById("download"),
        btn = document.getElementById("btn"),
        direklink = document.getElementById("download").href,
        waktu = 5;
    var teks_waktu = document.createElement("span");
    linkDL.parentNode.replaceChild(teks_waktu, linkDL);
    var id;
    id = setInterval(function () {
        waktu--;
        if (waktu < 0) {
            teks_waktu.parentNode.replaceChild(linkDL, teks_waktu);
            clearInterval(id);
            window.location.replace(direklink);
            linkDL.style.display = "inline";
   
        } else {
            teks_waktu.innerHTML = "<div class=\'btn btn-danger\'><i class=\'fa fa-clock-o\' aria-hidden=\'true\'/> " + "<b>Generating file on <font color=\'#000\'>" + "" + waktu.toString() + "</font> second....</b></div>";
            btn.style.display = "none";
        }
    }, 1000);
}
//]]>
</script>
</head>';
echo '<body>
<script>
if (!document.cookie || document.cookie.indexOf(\'AVPWCAP=\') == -1) {
_avp.push({ alias: \'/\', type: \'window\', zid: 23, pid: 8233 });
}
</script>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand logo" href="/"></a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav navbar-right">
<li><a href="/dmca/"><i class="glyphicon glyphicon-paperclip"></i> DMCA</a></li>
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>';
echo '<center><!-- BEGIN ADREACTOR CODE -->
<div id="avp_1554765832110">
<script>
_avp.push({ tagid: \'avp_1554765832110\', alias: \'/\', type: \'banner\', zid: 8, pid: 8233 });
</script>
</div>
<!-- END ADREACTOR CODE --></center>';
echo '<div class="container">
<div class="panel panel-primary">
<div class="panel-heading text-center"><strong>FILES INFORMATION</strong></div>
<div class="panel-body">
<table class="table table-hover w-break"><tbody>
<tr valign="top"><td width="30%">Filename</td><td><font color="#E52775"><strong>'.$title[0].'</strong></font></td></tr>
<tr valign="top"><td width="30%">Filesize</td><td><font color="#E52775">'.$size[0].'</font></td></tr>
<tr valign="top"><td width="30%">Update</td><td><font color="#E52775">'.$time[0].'</font></td></tr>
<tr valign="top"><td width="30%">MD5 Hash</td><td><font color="#E52775">'.md5($gdid).'</font></td></tr>
<tr valign="top"><td width="30%">Your IP</td><td><font color="#E52775">'.$_SERVER['REMOTE_ADDR'].'</font></td></tr>
<tr valign="top"><td width="30%">Browser</td><td><font color="#E52775">'.$_SERVER['HTTP_USER_AGENT'].'</font></td></tr>
<tr valign="top"><td width="30%"</td><td></td></tr></tbody>
</table>
    <br/>
    <table class="table table-bordered">
       <tr>
        <th width="120">Share Link:</th>
        <td><input class="text-info" type="url" value="https://'.$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'].'" style="border: none; width: 100%;" readonly onclick="copier(this)"></td>
       </tr>
       </table><br/>
<center><div id="avp_1554765914477">
<script>
_avp.push({ tagid: \'avp_1554765914477\', alias: \'/\', type: \'banner\', zid: 6, pid: 8233 });
</script>
</div></center>
<div class="alert alert-danger" style="display: none;"></div>
<center><a class="btn btn-danger" href="https://adserver.adreactor.com/servlet/view/window/url/zone?zid=40&pid=8233" rel="nofollow"><i class="fa fa-cloud-download"></i> FAST DOWNLOAD</a></center>
<center><button class="btn btn-danger" onclick="generate()" id="btn"><i class="fa fa-download"></i> DOWNLOAD HERE..!!!</button>
<a class="btn btn-danger" id="download" href="'.$download.'" style="display:none"><i class="fa fa-cloud-download"></i> DOWNLOAD READY...!!</a></center>
<center><div id="avp_1554765956233">
<script>
_avp.push({ tagid: \'avp_1554765956233\', alias: \'/\', type: \'banner\', zid: 32, pid: 8233 });
</script>
</div></center><br/>
</div>
</div>
</div>';
}
?>
