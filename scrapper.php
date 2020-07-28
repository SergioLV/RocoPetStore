<?php
include_once("simple_html_dom.php");

$html = file_get_html('https://www.pyk.cl/perro/719-tails-large');
$xd =$html->find('div[class=col-xs-12 col-sm-5 col-md-5 sinpadding col-details]',0);

echo $xd;
$marca = ucwords(strtolower($xd->find('h3[class=product-vendor]',0)->plaintext));
$name = $xd->find('h2[class=product-title]',0)->plaintext;
$price =$xd->find('h4[class=product-price]',0)->plaintext; 

echo (int)str_replace(".","",substr($price,2));
?>