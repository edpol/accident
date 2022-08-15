<?php
$url  = "https://covid19.mathdro.id/api/countries";
$country_list = file_get_contents($url);
echo "URL: " . $url . "<br>";
echo "Type: " . gettype($country_list) . "<br>";
var_dump($country_list);

