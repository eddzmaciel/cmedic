<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte Poliza Diario</title>
    <style type="text/css">

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 18cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-size: 9px; 
  font-family: 'Source Sans Pro', sans-serif;
}

header {
  padding: 5px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 45px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #6e8f66;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.6em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #3b506e;
  font-size: 1.8em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 5px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
  margin-right: 40px;
}

table th,
table td {
  padding: 8px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.6em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.5em;
  background: #97bd44;
}

table .desc {
  font-size: 1.5em;
  text-align: left;
}

table .unit {
  font-size: 1.5em;
  background: #DDDDDD;
}

table .qty {
  font-size: 1.5em;
}

table .total {
  background: #97bd44;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #6e8f66;
  font-size: 1.4em;
  border-top: 1px solid #6e8f66; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}



    </style>
  </head>
  <body>
    <header class="clearfix" style="padding-bottom:15px;">
      <div id="logo">
        <img src="img/logo_title.png">
      </div>
      <div id="company" style="padding-top:-45px;">
        <h2 class="name"> {{ $query->nombre }}</h2>
        <h2 class="name"> {{ $query->rfc }}</h2>
        <h2 class="name">Folio : {{ $query->folio }}</h2>
        <h2 class="name">Fecha : {{ $query->fecha }}</h2>
      </div>
    </header>
      <div id="details" class="clearfix">
        <div id="client">
          <h2 class="name">Moneda : {{ $query->moneda }}</h2>         
          <h2 class="name">TC : {{ $cantidades['cantidad_tipo_cambio'] }}</h2>          
          <h2 class="name">Sucursal : {{ $query->id_sucursal }}</h2>
          <h2 class="name">CCostos : NA</h2>
          <h2 class="name">SCCostos : NA</h2>
          <h2 class="name">Origen : {{ $query->origen }}</h2>
        </div>
        <div id="invoice" style="padding-top:-115px;">
          <h2 class="name">Fecha {{ date('Y-m-d') }} </h2>
          <h2 class="name">Usuario {{ Auth::user()->name }} </h2>
        </div>
        </div>
      </div>      
      <table border="0" cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th class="no" style="width:85px;"># CUENTA</th>
            <th class="desc">DESCRIPCI&Oacute;N</th>
            <th class="unit" style="width:85px;">DEBE</th>
            <th class="qty" style="width:85px;">HABER</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td class="no">{{ $cantidades['numero_cuenta'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta'] }}</td>
              <td class="unit">$0.00</td>
              <td class="qty">${{ $cantidades['cuenta_banco'] }}</td>
            </tr>
            <tr>
              <td class="no">{{ $cantidades['numero_cuenta_base'] }}</td>
              <td class="desc">{{ $cantidades['descripcion_cuenta_base'] }}</td>
              @if($cantidades['importe_diferencia'] != 0)
              <td class="unit">${{ $cantidades['importe_diferencia'] }}</td>
              @else
              <td class="unit">${{ $cantidades['cuenta_banco'] }}</td>
              @endIf
              <td class="qty">$0.00</td>
            </tr>
            @foreach($cantidades['mov_pd'] as $pd)
            <tr>
              <td class="no">{{ $pd->codigo }}</td>
              <td class="desc">{{ $pd->cuenta_contable }}</td>
              <td class="qty">$ {{ $pd->debe }}</td>
              <td class="unit">$ {{ $pd->haber }}</td>
            </tr>
            @endforeach
            <!-- @if($cantidades['iva_t'] != 0)
            <tr>
              <td class="no">{{ $cantidades['cuenta_iva_t'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta_iva_t'] }}</td>
              <td class="unit">${{ round($cantidades['iva_t'],4) }}</td>
              <td class="qty">$0.00</td>
            </tr>
            <tr>
              <td class="no">{{ $cantidades['cuenta_fiscal_iva_t'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta_fiscal_iva_t'] }}</td>
              <td class="unit">$0.00</td>
              <td class="qty">${{ round($cantidades['iva_t'],4) }}</td>
            </tr>
            @endIf
            @if($cantidades['isr_r'] != 0)
            <tr>
              <td class="no">{{ $cantidades['cuenta_isr_r'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta_isr_r'] }}</td>
              <td class="unit">$0.00</td>
              <td class="qty">${{ round($cantidades['isr_r'],4) }}</td>
            </tr>
            <tr>
              <td class="no">{{ $cantidades['cuenta_fiscal_isr_r'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta_fiscal_isr_r'] }}</td>
              <td class="unit">${{ round($cantidades['isr_r'],4) }}</td>
              <td class="qty">$0.00</td>
            </tr>
            @endIf
            @if($cantidades['iva_r'] != 0)
            <tr>
              <td class="no">{{ $cantidades['cuenta_iva_r'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta_iva_r'] }}</td>
              <td class="unit">$0.00</td>
              <td class="qty">${{ round($cantidades['iva_r'],4) }}</td>
            </tr>
            <tr>
              <td class="no">{{ $cantidades['cuenta_fiscal_iva_r'] }}</td>
              <td class="desc">{{ $cantidades['nombre_cuenta_fiscal_iva_r'] }}</td>
              <td class="unit">$0.00</td>
              <td class="qty">${{ round($cantidades['iva_r'],4) }}</td>
            </tr>
            @endIf -->
            @if($cantidades['anticipo_e'] > 0)
            <tr>
              <td class="no">2131005</td>
              <td class="desc">ANTICIPO DE CLIENTES NACIONAL</td>
              <td class="unit">$0.00</td>
              <td class="qty">${{ round($cantidades['anticipo_e'],4) }}</td>
            </tr>
            @endIf
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="1">TOTAL CARGOS</td>
            <td>TOTAL ABONOS</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="1">${{ (FLOAT)round($cantidades['iva_t'],4)+(FLOAT)$cantidades['cuenta_banco']+round($cantidades['isr_r'],4)+round($cantidades['iva_r'],4)+round($cantidades['total_mov_pd_debe'],4)  }}</td>
            <td> ${{ (FLOAT)round($cantidades['iva_t'],4)+(FLOAT)$cantidades['cuenta_banco']+round($cantidades['isr_r'],4)+round($cantidades['iva_r'],4)+round($cantidades['total_mov_pd_haber'],4)  }}</td>
          </tr>          
        </tfoot>
      </table>

      <table border="0" cellspacing="0" cellpadding="0" >
        <thead>
          <tr>
            <th class="no"># UUID</th>
            <th class="desc">RFC</th>
            <th class="unit">Monto</th>
          </tr>
        </thead>
        <tbody>
          @foreach($uuid as $u)
              <tr>
                <td class="no">{{ $u->uuid }}</td>
                  @if($u->origen =='Nomina')
                      <td class="desc">{{ $u->rfc_nomina }}</td>
                  @endIf
                <td class="unit">{{ $u->total }}</td>
              </tr>
          @endforeach
        </tbody> 
         <tfoot>          
        </tfoot>       
      </table>
    <footer>
      Contadores 360, Copyright © 2016
    </footer>    
  </body>
</html>