<?php
$clean = fopen('error_log', 'w');
fwrite($clean,'');
fclose($clean);

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
$docsurl = udud($id);

if(empty($docsurl){
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
header("location: $docsurl");
}
?>
