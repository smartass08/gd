<?php
$google = 'gDsFL6rRB7Y3tpk7D0EcKTpEisFcHoM6vtUfQv6Sbik';
$bing = 'E78E512CA8EF22B3A2E123793E7FB7C1';
$alexa = 'Cw_stL-5kXvBYX6zyzLtk62AA-E';

function ngegrab($url){
    $curl = curl_init();
    $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
    $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
    $header[] = "Cache-Control: max-age=0";
    $header[] = "Connection: keep-alive";
    $header[] = "Keep-Alive: 300";
    $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
    $header[] = "Accept-Language: en-us,en;q=0.5";
    $header[] = "Pragma: ";
    $referer = "http://www.google.com";
    $btext = rand(0,99999);
    $browser = 'Mozilla/5.0' . $btext;
 
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_USERAGENT, $browser);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_REFERER, $referer);
    curl_setopt($curl, CURLOPT_AUTOREFERER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 14);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
return curl_exec($curl);
  curl_close($curl);
}
function grab($url)
{
$ua="Nokia6020/2.0 (04.90) Profile/MIDP-2.0 Cofiguration/CLDC-1.1";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT,$ua);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$exec=curl_exec($ch);
return $exec;
}
function cut($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];}
return '';}
}
?>
