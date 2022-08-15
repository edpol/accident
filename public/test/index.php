<?php

$country = 'india';
$filename =  '/var/www/accident/public/datamaps/' . $country . '.topo.json';
echo "File Name: $filename <br>";

$date1 = filectime($filename);
echo "File Date: $date1 <br>";

$date2 = strtotime(date("Y-m-d H:i:s"));
echo "The Time: $date2 <br>";

$diff = ($date2 - $date1);

$msg = "<table>";
$msg .= "<tr><th>Difference</th><th></th></tr>";
$msg .= "<tr><td>Seconds:</td><td>" . $diff            . "</td></tr>";
$msg .= "<tr><td>Minutes:</td><td>" . ($diff/60)       . "</td></tr>";
$msg .= "<tr><td>Hours:  </td><td>" . ($diff/60/60)    . "</td></tr>";
$msg .= "<tr><td>Days:   </td><td>" . ($diff/60/60/24) . "</td></tr>";
$msg .= "</table>";

echo $msg;

