<?php

// // User variables:
// $dir = '/'; // Directory where apache has access to (chmod 777).
// $RootCA = '/cahh901031t73.cer'; // Points to the Root CA in PEM format.
// $OCSPUrl = 'http://ocsp.url'; //Points to the OCSP URL
// // Script:
// $a = rand(1000,99999); // Needed if you expect more page clicks in one second!
// file_put_contents($dir.$a.'cert_i.pem', $_SERVER['SSL_CLIENT_CERT_CHAIN_0']); // Issuer certificate.
// file_put_contents($dir.$a.'cert_c.pem', $_SERVER['SSL_CLIENT_CERT']); // Client (authentication) certificate.
// // $salida = shell_exec('openssl x509 -inform DER -outform PEM -in cahh901031t73.cer -pubkey -out cahh901031t73.cer.pem');
// // $salida = shell_exec('openssl pkcs8 -inform DER -in Claveprivada_FIEL_CAHH901031T73_20151007_102013.key -passin pass:hcha1915 -out Claveprivada_FIEL_CAHH901031T73_20151007_102013.key.pem');
// $salida = shell_exec('openssl pkcs8 -inform DER -in "CAHH901031T73_20151007_102013".key -passin pass:"hugo1990" -out "CAHH901031T73_20151007_102013.key.pem"');
// echo "<pre>".$salida."</pre>";
// var_dump($output);
// $output2 = preg_split('/[\r\n]/', $output);
// $output3 = preg_split('/: /', $output2[0]);
// $ocsp = $output3[1];
// echo "OCSP status: ".$output; // will be "good", "revoked", or "unknown"
// unlink($dir.$a.'cert_i.pem');
// unlink($dir.$a.'cert_c.pem');

// $pub_key = openssl_pkey_get_public(file_get_contents('/cahh901031t73.cer'));
// var_dump($pub_key);
// $keyData = openssl_pkey_get_details($pub_key);
// fule_put_contents('./cahh901031t73.cer.pem', $keyData['key']);

// Claveprivada_FIEL_CAHH901031T73_20151007_102013.key

//
// +---------------------------------------------------------------------------+
// | satxmlsv22.php Procesa el arreglo asociativo de intercambio y genera un   |
// |               mensaje XML con los requisitos del SAT de la version 3.2    |
// |               publicada en el DOF del ? de Diciembre del 2011.            |
// |                                                                           |
// +---------------------------------------------------------------------------+
// | Copyright (c) 2011  Fabrica de Jabon la Corona, SA de CV                  |
// +---------------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software               |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA|
// +---------------------------------------------------------------------------|
// | Autor: Fernando Ortiz <fortiz@lacorona.com.mx>                            |
// +---------------------------------------------------------------------------+
// |19/dic/2011  Se toma como base el programa de la version 2.0 se agregan los|
// |             nuevos nodos, pero se usa xslt para formar la cadena original |
// +---------------------------------------------------------------------------+
//
satxmlsv22();
// {{{  satxmlsv22
function satxmlsv22() {
global $xml, $cadena_original, $conn, $sello, $texto, $ret;
error_reporting(E_ALL & ~(E_WARNING | E_NOTICE));
satxmlsv22_genera_xml($arr,$edidata,$dir,$nodo,$addenda);
satxmlsv22_genera_cadena_original();
satxmlsv22_sella($arr);
$ret = satxmlsv22_termina($arr,$dir);
echo $ret;
}
// }}}
// {{{  satxmlsv22_genera_xml
function satxmlsv22_genera_xml($arr, $edidata, $dir,$nodo,$addenda) {
global $xml, $ret;
$xml = new DOMdocument("1.0","UTF-8");
satxmlsv22_generales($arr, $edidata, $dir,$nodo,$addenda);
satxmlsv22_emisor($arr, $edidata, $dir,$nodo,$addenda);
satxmlsv22_receptor($arr, $edidata, $dir,$nodo,$addenda);
satxmlsv22_conceptos($arr, $edidata, $dir,$nodo,$addenda);
satxmlsv22_impuestos($arr, $edidata, $dir,$nodo,$addenda);
//satxmlsv22_complemento($arr, $edidata, $dir,$nodo,$addenda);
//$ok = satxmlsv22_valida();
}
// }}}
// {{{  Datos generales del Comprobante
function satxmlsv22_generales($arr, $edidata, $dir,$nodo,$addenda) {
global $root, $xml;
$root = $xml->createElement("cfdi:Comprobante");
$root = $xml->appendChild($root);
 
 
satxmlsv22_cargaAtt($root, array("xmlns:cfdi"=>"http://www.sat.gob.mx/cfd/3",
                          "xmlns:xsi"=>"http://www.w3.org/2001/XMLSchema-instance",
                          "xsi:schemaLocation"=>"http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd"
                         )
                     );
 
satxmlsv22_cargaAtt($root, array("version"=>"3.2",
                      "serie"=>"A",
                      "folio"=>"1",
                      #"fecha"=>satxmlsv22_xml_fech(date),
              "fecha"=>date("Y-m-d"). "T" .date("H:i:s"),
                      "sello"=>"@",
                      "formaDePago"=>"PAGO EN UNA SOLA EXHIBICION",
                      "noCertificado"=>"3030303031303030303030343030353438303230",
                      "certificado"=>"@",
                      "subTotal"=>"385.72",
                      "descuento"=>"0",
                      "total"=>"447.44",
                      "tipoDeComprobante"=>"ingreso",
                      "metodoDePago"=>"NO IDENTIFICADO",
                      "LugarExpedicion"=>"COLIMA,COL. MEXICO",
              "tipoDeComprobante"=>"ingreso",
              "TipoCambio"=>"1",
              "Moneda"=>"PESOS"
                   )
                );
}
 
// }}}
// {{{ Datos del Emisor
function satxmlsv22_emisor($arr, $edidata, $dir,$nodo,$addenda) {
global $root, $xml;
$emisor = $xml->createElement("cfdi:Emisor");
$emisor = $root->appendChild($emisor);
satxmlsv22_cargaAtt($emisor, array("rfc"=>"CAHH901031T73",
                       "nombre"=>"ASOCIACION DE AGRICULTORES DEL DISTRITO DE RIEGO 004 DN MARTIN"
                   )
                );
$domfis = $xml->createElement("cfdi:DomicilioFiscal");
$domfis = $emisor->appendChild($domfis);
satxmlsv22_cargaAtt($domfis, array("calle"=>"CARLOS B. ZETINA",
                        "noExterior"=>"80",
                        "noInterior"=>"",
                        "colonia"=>"PARQUE INDUSTRIAL XALOSTOC",
                        "municipio"=>"ECATEPEC DE MORELOS",
                        "estado"=>"MEXICO",
                        "pais"=>"MEXICO",
                        "codigoPostal"=>"55348"
                   )
                );
$regimen = $xml->createElement("cfdi:RegimenFiscal");
$expedido = $emisor->appendChild($regimen);
satxmlsv22_cargaAtt($regimen, array("Regimen"=>"sdfasdf"
                   )
                );
}
// }}}
// {{{ Datos del Receptor
function satxmlsv22_receptor($arr, $edidata, $dir,$nodo,$addenda) {
global $root, $xml;
$receptor = $xml->createElement("cfdi:Receptor");
$receptor = $root->appendChild($receptor);
satxmlsv22_cargaAtt($receptor, array("rfc"=>"ABA920310QW0",
                          "nombre"=>"ABA SEGUROS, S.A. DE C.V."
                      )
                  );
$domicilio = $xml->createElement("cfdi:Domicilio");
$domicilio = $receptor->appendChild($domicilio);
satxmlsv22_cargaAtt($domicilio, array("calle"=>"LOPEZ COTILLA",
                        "noExterior"=>$arr['Receptor']['Domicilio']['noExterior'],
                        "noInterior"=>"1889",
                       "colonia"=>"OBRERA",
                       "municipio"=>"GUADALAJARA",
                       "estado"=>"JALISCO",
                       "pais"=>"MEXICO",
                       "codigoPostal"=>"44140",
                   )
               );
}
// }}}
// {{{ Detalle de los conceptos/productos de la factura
function satxmlsv22_conceptos($arr, $edidata, $dir,$nodo,$addenda) {
global $root, $xml;
$conceptos = $xml->createElement("cfdi:Conceptos");
$conceptos = $root->appendChild($conceptos);
for ($i=1; $i<=sizeof(1); $i++) {
    $concepto = $xml->createElement("cfdi:Concepto");
    $concepto = $conceptos->appendChild($concepto);
    $prun = $arr['Conceptos'][$i]['valorUnitario'];
    satxmlsv22_cargaAtt($concepto, array("cantidad"=>"1",
                              "unidad"=>"M3",
                              "descripcion"=>"PIEDRA",
                              "valorUnitario"=>"0",
                              "importe"=>"0",
                   )
                );
}
}
// }}}
// {{{ Impuesto (IVA)
function satxmlsv22_impuestos($arr, $edidata, $dir,$nodo,$addenda) {
global $root, $xml;
$impuestos = $xml->createElement("cfdi:Impuestos");
$impuestos = $root->appendChild($impuestos);
#if (isset($arr['Traslados']['importe'])) {
    $traslados = $xml->createElement("cfdi:Traslados");
    $traslados = $impuestos->appendChild($traslados);
    $traslado = $xml->createElement("cfdi:Traslado");
    $traslado = $traslados->appendChild($traslado);
    satxmlsv22_cargaAtt($traslado, array("impuesto"=>"IVA",
                              "tasa"=>"16",
                              "importe"=>"0"
                             )
                         );
#}
$impuestos->SetAttribute("totalImpuestosTrasladados","0");
}
// }}}
// {{{ genera_cadena_original
function satxmlsv22_genera_cadena_original() {
global $xml, $cadena_original;
$paso = new DOMDocument;
$paso->loadXML($xml->saveXML());
$xsl = new DOMDocument;
$file="xslt/3.2/cadenaoriginal_3_2.xslt";      // Ruta al archivo
$xsl->load($file);
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);
$cadena_original = $proc->transformToXML($paso);
#echo $cadena_original;
}
// }}}
// {{{ Calculo de sello
function satxmlsv22_sella($arr) {
global $root, $cadena_original, $sello;
$salida = shell_exec('openssl x509 -inform DER -in cahh901031t73.cer -noout -serial > "'.$a.'.txt"');
$fp = fopen($a.".txt", "r");
$linea = fgets($fp);
$certificado = substr($linea, 7);
// $certificado = "3030303031303030303030343030353438303230";
$file="CAHH901031T73_20151007_102013.key.pem";      // Ruta al archivo
// Obtiene la llave privada del Certificado de Sello Digital (CSD),
//    Ojo , Nunca es la FIEL/FEA
$pkeyid = openssl_get_privatekey(file_get_contents($file));
openssl_sign($cadena_original, $crypttext, $pkeyid, OPENSSL_ALGO_SHA1);
openssl_free_key($pkeyid);
 
$sello = base64_encode($crypttext);      // lo codifica en formato base64
$root->setAttribute("sello",$sello);
 
$file="cahh901031t73.cer.pem";      // Ruta al archivo de Llave publica
$datos = file($file);
$certificado = ""; $carga=false;
for ($i=0; $i<sizeof($datos); $i++) {
    if (strstr($datos[$i],"END CERTIFICATE")) $carga=false;
    if ($carga) $certificado .= trim($datos[$i]);
    if (strstr($datos[$i],"BEGIN CERTIFICATE")) $carga=true;
}
// El certificado como base64 lo agrega al XML para simplificar la validacion
$root->setAttribute("certificado",$certificado);
fclose($fp);
}
// }}}
// {{{ Termina, graba en edidata o genera archivo en el disco
function satxmlsv22_termina($arr,$dir) {
global $xml, $conn;
$xml->formatOutput = true;
$xml->save("file.xml");
$todo = $xml->saveXML();
$nufa = $arr['serie'].$arr['folio'];    // Junta el numero de factura   serie + folio
$paso = $todo;
return($todo);
}
// {{{ Funcion que carga los atributos a la etiqueta XML
function satxmlsv22_cargaAtt(&$nodo, $attr) {
$quitar = array('sello'=>1,'noCertificado'=>1,'certificado'=>1);
foreach ($attr as $key => $val) {
    $val = preg_replace('/\s\s+/', ' ', $val);   // Regla 5a y 5c
    $val = trim($val);                           // Regla 5b
    if (strlen($val)>0) {   // Regla 6
        $val = utf8_encode(str_replace("|","/",$val)); // Regla 1
        $nodo->setAttribute($key,$val);
    }
}
}
 

// {{{ valida que el xml coincida con esquema XSD
// function satxmlsv22_valida($docu) {
// global $xml;
// $xml->formatOutput=true;
// $paso = new DOMDocument;
// $texto = $xml->saveXML();
// $paso->loadXML($texto);
// libxml_use_internal_errors(false);
// $maquina = trim(`uname -n`);
// $ruta = ($maquina == "www.fjcorona.com.mx") ? "/home/httpd/htdocs/cfds/" : "./cfds/";
// if (strpos($texto,"detallista:")===FALSE) {
//     $file=$ruta."cfdv22.xsd";
//     $ok = $paso->schemaValidate($file);
// } else {
//     $file=$ruta."cfdv22detallista.xsd";
//     $ok = $paso->schemaValidate($file);
// }
// return $ok;
// }

 
// }}}
?>