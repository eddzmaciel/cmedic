<?php

$a = rand(1000,99999);
$salida = shell_exec('openssl x509 -inform DER -in cahh901031t73.cer -noout -serial > "'.$a.'.txt"');
$fp = fopen($a.".txt", "r");
$linea = fgets($fp);
echo "<pre>".substr($linea, 7)."</pre>";
fclose($fp);
?>