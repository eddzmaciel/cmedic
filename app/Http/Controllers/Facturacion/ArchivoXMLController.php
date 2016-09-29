<?php namespace App\Http\Controllers\Facturacion;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArchivoXMLController extends Controller {

	public function index()
	{
		header('Content-Type: text/html; charset=UTF-8');
		### 1. CONFIGURACIÓN INICIAL ######################################################
	    # 1.1 Configuración de zona horaria
	    date_default_timezone_set('America/Mexico_City'); //

	    # 1.2 Muestra la zona horaria predeterminada del servidor (opcional a mostrar)
	    echo '<div style="font-size: 10pt; color: #000099; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
	    echo 'ZONA HORARIA PREDETERMINADA';
	    echo '</div>';
	    echo '<div style="font-size: 10pt; color: #000000; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
	    echo date_default_timezone_get();
	    echo '</div><br>';
	    ### 2. DEFINICIÓN DE CONSTANTES ###################################################
		    $SendaPEMS  = "archs_pem/";   // 2.1 Directorio en donde se encuentran los archivos *.cer.pem y *.key.pem (para efectos de demostración se utilizan los que proporciona el SAT para pruebas).
		    $SendaCFDI  = "archs_cfdi/";  // 2.2 Directorio en donde se almacenarán los archivos *.xml (CFDIs).
		    $SendaGRAFS = "archs_graf/";  // 2.3 Directorio en donde se almacenan los archivos .jpg (logo de la empresa) y .png (códigos bidimensionales).
		    $SendaXSD   = "archs_xsd/";   // 2.4 Directorio en donde se almacenan los archivos .xsd (esquemas de validación, especificaciones de campos del Anexo 20 del SAT);
		    

		### 3. DEFINICIÓN DE VARIABLES INICIALES ##########################################
		    $noCertificado  = "20001000000200000293";              // 3.1 Número de certificado.
		    $file_cer       = "aad990814bp7_1210261233s.cer.pem";  // 3.2 Nombre del archivo .cer.pem 
		    $file_key       = "aad990814bp7_1210261233s.key.pem";  // 3.3 Nombre del archivo .cer.key
		    
		    
		### 4. DATOS GENERALES DE LA FACTURA ##############################################
		    $fact_serie        = "A";                               // 4.1 Número de serie.
		    $fact_folio        = "524";                             // 4.2 Número de folio.
		    $NoFac             = "A".$this->Folio5(524);                   // 4.3 Serie de la factura concatenado con el número de folio.
		    $fact_tipcompr     = "ingreso";                         // 4.4 Tipo de comprobante.
		    $tasa_iva          = 16;                                // 4.5 Tasa del impuesto IVA.
		    $subTotal          = number_format(3000,2,'.','');      // 4.6 Subtotal (suma de los importes antes de descuentos e impuestos).
		    $descuento         = number_format(150,2,'.','');       // 4.7 Descuento (importe total a descontar).
		    $IVA               = number_format(456,2,'.','');       // 4.8 IVA (suma de los impuestos).
		    $total             = number_format(3306,2,'.','');      // 4.9 Total (Subtotal - Descuentos + Impuestos). 
		    $fecha_fact        = date("Y-m-d")."T".date("H:i:s");   // 4.10 Fecha y hora de facturación.
		    $metodoDePago      = "EFECTIVO";                        // 4.11 Método de pago.
		    $NumCtaPago        = "NO ESPECIFICADO";                 // 4.12 Número de cuenta.
		    $condicionesDePago = "CONTADO";                         // 4.13 Condiciones de pago.
		    $formaDePago       = "PAGO EN UNA SOLA EXHIBICION";     // 4.14 Forma de pago.
		    $TipoCambio        = 1;                                 // 4.15 Tipo de cambio de la moneda.
		    $LugarExpedicion   = "MEXICO";                          // 4.16 Lugar de expedición.
		    $moneda            = "MXP";                             // 4.17 Moneda
		    $MotivDesc         = "NO MENCIONADO";                   // 4.18 Descripción del motivo del descuento.
		    $iva_retenido1     = number_format(0,2,'.','');         // 4.19 Impuesto1 retenido, depende de los tipos de impuestos que se apliquen en el momento.
		    $iva_retenido2     = number_format(0,2,'.','');         // 4.20 Impuesto2 retenido, depende de los tipos de impuestos que se apliquen en el momento.
		    $isr_retenido      = number_format(0,2,'.','');         // 4.21 Impuesto ISR retenido.
		    $fact_impuesto     = $IVA - $iva_retenido1 - $iva_retenido2 - $isr_retenido;     // Total de impuestos a transferir.

		### 5. MUESTRA LA ZONA HORARIA PREDETERMINADA DEL SERVIDOR (OPCIONAL A MOSTRAR) ######
		    echo '<div style="font-size: 10pt; color: #000099; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo 'FECHA Y HORA DE SOLICITUD DE TIMBRADO';
		    echo '</div>';
		    echo '<div style="font-size: 10pt; color: #000000; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo $fecha_fact; // 5.1 Se muestra solo para consultar y confirmar que sea la correcta.
		    echo '</div><br>';
		### 6. ARRAYS QUE CONTIENEN LOS ARTICULOS QUE FORMAN PARTE DE LA VENTA ############
		    $ArrayCant      = ['200', '12', '10'];               // 6.1 Cantidades.
		    $ArrayUniMed    = ['PZ', 'PZ', 'PZ'];                // 6.2 Unidades de medida.
		    $ArrayClaArtSer = ['BLOCK1', 'VAHY3', 'CRUZA1'];     // 6.3 Claves de los artículos .
		    $ArrayArtSer    = ['BLOCK PESADO GRIS 12x19x39', 'VARILLA No. 3 9.50 mm. 3/8 x 12 m.', 'CEMENTO CRUZ AZUL 50 Kg'];  // 6.4 Descripciones de los artículos o servcios.
		    $ArrayPreUni    = ['5.00', '80.00', '104.00'];       // 6.5 Precios unitarios.
		    $ArrayImporte   = ['1000.00', '960.00', '1040.00'];  // 6.6 Importes.
		    $d_adn_numer    = ['', '', ''];                      // 6.7 Números aduana (opcionales).
		    $d_adn_fecha    = ['', '', ''];                      // 6.8 Fechas aduana (opcionales). 
		    $d_adn_aduan    = ['', '', ''];                      // 6.9 Aduanas (opcionales).
		    
		    
		### 7. DATOS GENERALES DEL EMISOR #################################################    
		    $emisor_rs     = "ASOCIACION DE AGRICULTORES DEL DISTRITO DE RIEGO 004 DON MARTIN"; // 7.1 Nombre o Razón social.
		    $emisor_rfc    = "AAD990814BP7";                        // 7.2 RFC.
		    $emisor_regfis = "REGIMEN GENERAL DE PERSONAS MORALES"; // 7.3 Régimen fiscal.
		    
		    #== Domicilio fiscal =======================================================
		    $emisor_cal      = "ALDAMA";            // 7.4 Calle.
		    $emisor_ne       = "56";                // 7.5 Número exterior.
		    $emisor_ni       = "L2";                // 7.6 Número interior.
		    $emisor_col      = "TRES MARIAS";       // 7.7 Colonia.
		    $emisor_delmpio  = "VALLE DE CHALCO";   // 7.8 Delagación o municipio.
		    $emisor_pais     = "MEXICO";            // 7.9 País.
		    $emisor_edo      = "ESTADO DE MEXICO";  // 7.10 Estado.
		    $emisor_cp       = "56900";             // 7.11 Código postal
		    $emisor_referdom = "NO ESPECIFICADO";   // 7.12 Referencias domiciliarias
		    
		    
		### 8. DATOS GENERALES DEL RECEPTOR (CLIENTE) #####################################
		    $RFC_Recep = "ANTR7508139T3";   // 8.1 RFC.
		    if (strlen($RFC_Recep)==12){$RFC_Recep = " ".$RFC_Recep; }else{$RFC_Recep = $RFC_Recep;} // 8.2 Al RFC de personas morales se le antecede un espacio en blanco para que su longitud sea de 13 caracteres ya que estos son de longitud 12.
		    $receptor_rfc = $RFC_Recep;             // 8.3 RFC.
		    $receptor_rs  = "ASOCIACION DE INDUSTRIALES, A.C."; // 8.4 Nombre o razón social.
		    $receptor_cal = "ALDAMA";               // 8.5 Calle.
		    $receptor_ne  = "452";                  // 8.6 Número exterior.
		    $receptor_ni  = "B15";                  // 8.7 Número interior.
		    $receptor_col = "TRES MARIAS";          // 8.8 Colonia.
		    $receptos_loc = "SAN ANDRES METLA";     // 8.9 Localidad.
		    $receptor_del = "CHALCO";               // 8.10 Delegación o municipio.
		    $receptor_edo = "ESTADO DE MEXICO";     // 8.11 Estado.
		    $receptor_pai = "MEXICO";               // 8.12 País.
		    $receptor_cp  = "56600";                // 8.13 Código postal.
		    

		### 9. CREACIÓN Y ALMACENAMIENTO DEL ARCHIVO .XML (CFDI) ANTES DE SER TIMBRADO ###################
		    
		    #== 9.1 Creación de la variable de tipo DOM, aquí se conforma el XML a timbrar posteriormente.
		    
		    $xml = new \DOMdocument('1.0', 'UTF-8'); 
		    $root = $xml->createElement("cfdi:Comprobante");
		    $root = $xml->appendChild($root); 
		    
		    $cadena_original='||';
		    $noatt=  array();
		    
		    #== 9.2 Se crea e inserta el primer nodo donde se declaran los namespaces ======
		    $this->cargaAtt($root, array("xsi:schemaLocation"=>"http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv32.xsd http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/TimbreFiscalDigital/TimbreFiscalDigital.xsd http://www.sat.gob.mx/detallista http://www.sat.gob.mx/sitio_internet/cfd/detallista/detallista.xsd http://www.sat.gob.mx/implocal http://www.sat.gob.mx/sitio_internet/cfd/implocal/implocal.xsd http://www.buzonfiscal.com/ns/addenda/bf/2 http://www.buzonfiscal.com/schema/xsd/Addenda_BF_v2.2.xsd",
		            "xmlns:cfdi"=>"http://www.sat.gob.mx/cfd/3",
		            "xmlns:tfd"=>"http://www.sat.gob.mx/TimbreFiscalDigital", 
		            "xmlns:xsi"=>"http://www.w3.org/2001/XMLSchema-instance"
		        )
		    );
		    
		    #== 9.3 Rutina de integración de nodos =========================================
		    $nombre_emi = utf8_decode($emisor_rs);    	           
		    $this->cargaAtt($root, array(
		                     "version"=>"3.2", 
		                     "fecha"=>date("Y-m-d")."T".date("H:i:s"),
		                     "tipoDeComprobante"=>$fact_tipcompr,
		                     "formaDePago"=>$formaDePago,
		                     "condicionesDePago"=>$condicionesDePago,
		                     "noCertificado"=> $noCertificado,
		                     "certificado"=>"@",
		                     "subTotal"=>$subTotal,
		                     "descuento"=>$descuento,
		                     "motivoDescuento"=>"",
		                     "TipoCambio"=>$TipoCambio,
		                     "Moneda"=>$moneda,
		                     "total"=>$total,
		                     "metodoDePago"=>$metodoDePago,
		                     "LugarExpedicion"=>$LugarExpedicion,
		                     "NumCtaPago"=>$NumCtaPago,
		                     "FolioFiscalOrig"=>"",
		                     "FechaFolioFiscalOrig"=>"",
		                     "MontoFolioFiscalOrig"=>""
		                  )
		               );
		               
		    $emisor = $xml->createElement("cfdi:Emisor");
		    $emisor = $root->appendChild($emisor);
		    $this->cargaAtt($emisor, array("rfc"=>$emisor_rfc,
		                                 "nombre"=>$emisor_rs
		                             )
		                          );
		    
		    $domfis = $xml->createElement("cfdi:DomicilioFiscal");
		    $domfis = $emisor->appendChild($domfis);
		    $this->cargaAtt($domfis, array("calle"=>$emisor_cal,
		                            "noExterior"=>$emisor_ne,
		                            "noInterior"=>$emisor_ni,
		                            "colonia"=>$emisor_col,
		                            "localidad"=>$emisor_delmpio,
		                            "referencia"=>$emisor_referdom,
		                            "municipio"=>$emisor_delmpio,
		                            "estado"=>$emisor_edo,
		                            "pais"=>$emisor_pais,
		                            "codigoPostal"=>$emisor_cp
		                       )
		                    ); 
		    
		    $expedido = $xml->createElement("cfdi:ExpedidoEn");
		    $expedido = $emisor->appendChild($expedido);
		    $this->cargaAtt($expedido, array("calle"=>$emisor_cal,
		                            "noExterior"=>$emisor_ne,
		                            "noInterior"=>$emisor_ni,
		                            "colonia"=>$emisor_col,
		                            "localidad"=>$emisor_delmpio,
		                            "referencia"=>$emisor_referdom,
		                            "municipio"=>$emisor_delmpio,
		                            "estado"=>$emisor_edo,
		                            "pais"=>$emisor_pais,
		                            "codigoPostal"=>$emisor_cp
		                       )
		                    ); 
		                    
		    $regfis = $xml->createElement("cfdi:RegimenFiscal");
		    $regfis = $emisor->appendChild($regfis);    
		    $this->cargaAtt($regfis, array("Regimen"=>$emisor_regfis)
		    );
		    
		    $receptor = $xml->createElement("cfdi:Receptor");
		    $receptor = $root->appendChild($receptor);
		    $this->cargaAtt($receptor, array("rfc"=>$receptor_rfc,
		                        "nombre"=>$receptor_rs
		                    )
		                );
		    
		    $domicilio = $xml->createElement("cfdi:Domicilio");
		    $domicilio = $receptor->appendChild($domicilio);
		    $this->cargaAtt($domicilio, array("calle"=>$receptor_cal,
		                            "noExterior"=>$receptor_ne,
		                            "noInterior"=>$receptor_ni,
		                            "colonia"=>$receptor_col,
		                            "localidad"=>$receptos_loc,
		                            "referencia"=>"",
		                            "municipio"=>$receptor_del,
		                            "estado"=>$receptor_edo,
		                            "pais"=>$receptor_pai,
		                            "codigoPostal"=>$receptor_cp
		                       )
		                   );
		    
		    $conceptos = $xml->createElement("cfdi:Conceptos");
		    $conceptos = $root->appendChild($conceptos);
		    
		    #== 9.4 Ciclo "for", recopilación de datos de artículos e integración de sus respectivos nodos =
		    for ($i=0; $i<count($ArrayCant); $i++){
		       	
		        $concepto = $xml->createElement("cfdi:Concepto");
		        $concepto = $conceptos->appendChild($concepto);
		        $this->cargaAtt($concepto, array("cantidad"=>$ArrayCant[$i],
		                           "unidad"=>$ArrayUniMed[$i],
		                           "noIdentificacion"=>$ArrayClaArtSer[$i],
		                           "descripcion"=>$ArrayArtSer[$i],
		                           "valorUnitario"=>$ArrayPreUni[$i],
		                           "importe"=>$ArrayImporte[$i]
		                )
		             );
		             
		          #== 9.5 Información aduanera de artúculos (opcional a insertar).
		//        if($d_adn_numer[$i] != ""){     
		//            $aduanera = $xml->createElement("cfdi:InformacionAduanera");
		//            $aduanera = $concepto->appendChild($aduanera);
		//            $this->cargaAtt($aduanera, array("numero"=>$d_adn_numer[$i],
		//                                      "fecha"=>$d_adn_fecha[$i],
		//                                      "aduana"=>$d_adn_aduan[$i]
		//                    )
		//            );   
		//        }     
		    }
		        
		    $impuestos = $xml->createElement("cfdi:Impuestos");
		    $impuestos = $root->appendChild($impuestos);
		    
		    if($iva_retenido1 > 0 || $iva_retenido2 > 0 || $isr_retenido > 0){
		        $retenciones = $xml->createElement("cfdi:Retenciones");
		        $retenciones = $impuestos->appendChild($retenciones);
		    }
		    
		    if($iva_retenido1 > 0){
		          $retencion = $xml->createElement("cfdi:Retencion");
		          $retencion = $retenciones->appendChild($retencion);
		          $this->cargaAtt($retencion,array("impuesto"=>"IVA","importe"=>$iva_retenido1)); 
		     }
		      
		     if($iva_retenido2 > 0){
		          $retencion = $xml->createElement("cfdi:Retencion");
		          $retencion = $retenciones->appendChild($retencion);
		          $this->cargaAtt($retencion, array("impuesto"=>"IVA",
		                              "importe"=>$iva_retenido2
		                  )
		          );
		     }  
		                             
		     if($isr_retenido > 0 ){
		          $retencion = $xml->createElement("cfdi:Retencion");
		          $retencion = $retenciones->appendChild($retencion);
		          $this->cargaAtt($retencion, array("impuesto"=>"ISR",
		                              "importe"=>$isr_retenido
		                  )
		          ); 
		     }                       
		             
		    $traslados = $xml->createElement("cfdi:Traslados");
		    $traslados = $impuestos->appendChild($traslados);
		    
		    $traslado = $xml->createElement("cfdi:Traslado");
		    $traslado = $traslados->appendChild($traslado);
		    $this->cargaAtt($traslado, array("impuesto"=>"IVA",
		                              "tasa"=>$tasa_iva,
		                              "importe"=> $fact_impuesto
		             )
		    );      
		                         
		    $complemento = $xml->createElement("cfdi:Complemento");
		    $complemento = $root->appendChild($complemento);
		    
		    #== 9.6 Termina de conformarse la "Cadena original" con doble ||
		    $cadena_original .= "|";   
		    
		    #=== Muestra la cadena original (opcional a mostrar) =======================
		    echo '<div style="font-size: 11pt; color: #000099; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo 'CADENA ORIGINAL';
		    echo '</div>';
		    echo '<div style="font-size: 9pt; color: #000000; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo $cadena_original;
		    echo '</div><br>';
		    
		    #== 9.7 Proceso para obtener el sello digital del archivo .pem.key =========
		    $keyid = openssl_get_privatekey(file_get_contents($SendaPEMS.$file_key));
		    openssl_sign($cadena_original, $crypttext, $keyid, OPENSSL_ALGO_SHA1);
		    openssl_free_key($keyid);

		    #== 9.8 Se convierte la cadena digital a Base 64 ===========================
		    $sello = base64_encode($crypttext);    
		    
		    #=== Muestra el sello (opcional a mostrar) =================================
		    echo '<div style="font-size: 11pt; color: #000099; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo 'SELLO';
		    echo '</div>';
		    echo '<div style="font-size: 9pt; color: #000000; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo $sello;
		    echo '</div><br>';    
		    
		    #== 9.9 Proceso para extraer el certificado del sello digital ==================
		    $file = $SendaPEMS.$file_cer;      // Ruta al archivo
		    $datos = file($file);
		    $certificado = ""; 
		    $carga=false;  
		    for ($i=0; $i<sizeof($datos); $i++){
		        if (strstr($datos[$i],"END CERTIFICATE")) $carga=false;
		        if ($carga) $certificado .= trim($datos[$i]);

		        if (strstr($datos[$i],"BEGIN CERTIFICATE")) $carga=true;
		    } 
		    
		    #=== Muestra el certificado del sello digital (opcional a mostrar) =========
		    echo '<div style="font-size: 11pt; color: #000099; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo 'CERTIFICADO DEL SELLO DIGITAL';
		    echo '</div>';
		    echo '<div style="font-size: 9pt; color: #000000; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo $certificado;
		    echo '</div><br>';    
		    
		    #== 9.10 Se continua con la integración de nodos ===========================   
		    $root->setAttribute("sello",$sello);
		    $root->setAttribute("certificado",$certificado);   # Incluimos en el nodo del certificado
		    $root->setAttribute("motivoDescuento",$MotivDesc); # Incluimos en el nodo del certificado 
		    $root->setAttribute("folio",$fact_folio);          # Folio de la factura (número entero).
		    $root->setAttribute("serie",$fact_serie);          # Serie de la factura (letra o letras).

		    #== Fin de la integración de nodos =========================================
		    
		    
		    #=== 9.11 Se guarda el archivo .XML antes de ser timbrado =======================
		    
		    $NomArchXML = "xml_SinTimbrar_".rand().".xml"; // Se crea la variable para asignar el nombre del archivo .XML sin timbrar.
		    
		    echo '<div style="font-size: 11pt; color: #000099; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo 'NOMBRE DEL ARCHIVO .XML SIN TIMBRAR';
		    echo '</div>';
		    echo '<div style="font-size: 11pt; color: #088A29; ; font-family: Verdana, Arial, Helvetica, sans-serif;">';
		    echo $NomArchXML;
		    echo '</div><br>';
		    
		    $cfdi = $xml->saveXML(); 
		    $xml->formatOutput = true;             
		    $xml->save($SendaCFDI.$NomArchXML); // Guarda el archivo .XML sin timbrar en el directorio predeterminado.
		    unset($xml);
		    
		    #=== 9.12 Se dan permisos de escritura al archivo .xml. =========================
		    chmod($SendaCFDI.$NomArchXML, 0777); 
		        
		##### FIN DE PROCEDIMIENTOS ####################################################   
	}

	function cargaAtt(&$nodo, $attr){
        global $xml, $cadena_original;
        $quitar = array('sello'=>1,'noCertificado'=>1,'certificado'=>1);
        foreach ($attr as $key => $val){
            $val = preg_replace('/\s\s+/', ' ', $val);
            $val = trim($val);
            if (strlen($val)>0){
                 $val = utf8_encode(str_replace("|","/",$val));
                 $nodo->setAttribute($key,$val);
                 if (!isset($quitar[$key])) 
                   if (substr($key,0,3) != "xml" &&
                       substr($key,0,4) != "xsi:")
                    $cadena_original .= $val . "|";
            }
         }
     }
  
    function cargaAtt_timbre(&$nodo_T, $attr_T){
        foreach ($attr_T as $key_T => $val_T){
                $val_T = preg_replace('/\s\s+/', ' ', $val_T);
                $val_T = trim($val_T);
                if (strlen($val_T)>0){
                     $val_T = utf8_encode(str_replace("|","/",$val_T));
                     $nodo_T->setAttribute($key_T,$val_T);
                } 
        }
    }
        
    function xml_fech($fech) {
         $ano = substr($fech,0,4);
         $mes = substr($fech,5,2);
         $dia = substr($fech,8,2);
         $hor = substr($fech,11,2);
         $min = substr($fech,14,2);
         $seg = substr($fech,17,2);
         $aux = $ano."-".$mes."-".$dia."T".$hor.":".$min.":".$seg;
         return ($aux);
    }        
         
     
    function Folio5($Num){
        if ($Num < 10){$Folio = "0000".$Num;}
        if ($Num > 9 and $Num < 100){$Folio = "000".$Num;}
        if ($Num > 99 and $Num < 1000){$Folio = "00".$Num;}
        if ($Num > 999 and $Num < 10000){$Folio = "0".$Num;}
        if ($Num > 9999 and $Num < 100000){$Folio = $Num;}
        if ($Num > 99999){$Folio = "N/A";}
        return $Folio;
    }    

    function ConvANum($str){
      $legalChars = "%[^0-9\-\. ]%";
      $str=preg_replace($legalChars,"",$str);
      return $str;
    }    
    
    function ProcesImpTot($ImpTot){
        $ArrayImpTot = explode(".", $ImpTot);
        $NumEnt = $ArrayImpTot[0];
        $NumDec = ProcesDecFac($ArrayImpTot[1]);
        return $NumEnt.".".$NumDec;
    }
    
    function ProcesDecFac($Num){
        $FolDec = "";
        if ($Num < 10){$FolDec = "00000".$Num;}
        if ($Num > 9 and $Num < 100){$FolDec = $Num."0000";}
        if ($Num > 99 and $Num < 1000){$FolDec = $Num."000";}
        if ($Num > 999 and $Num < 10000){$FolDec = $Num."00";}
        if ($Num > 9999 and $Num < 100000){$FolDec = $Num."0";}
        return $FolDec;
    }
}