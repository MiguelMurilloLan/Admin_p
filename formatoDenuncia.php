<?php

require_once __DIR__ . '/vendor/autoload.php';
include_once('../php/connection.php');
include_once('../php/datos.php');

$datos = new Datos;
$q=$_GET['q'];


$listado = $datos->obtenerinfoDenuncias($q);

foreach ($listado as $item){

$html='<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Formato de Denundcia</title>
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img  src="css/logo_plata.png" height="60px">
      </div>
      <h1>Reporte de Denuncia-'.$item['tipodequeja'].'</h1>
      <div id="company" class="clearfix">
        <div><b>Procuraduría de los <br>
        Derechos Humanos<br /> del Estado de Guajauato</b></div>
        <div>Av. Guty Cárdenas #1444<br>
          León, Guanajuato 37480</div>
        <div>(477) 770 0845, 770 4113,<br>770 4128 y 770 1436</div>
      </div>
      <div id="project">
        <div><span>Nombre</span>' ;

        

$html.= $item['nombre']." ".$item['aprellidoP']." ".$item['apellidoM'].'</div>
        <div><span>Direccion</span>'.$item['direccion'].".".$item['municipio'];
        if($item['estado']!='Array'){
             $html.=",".$item['estado'];
        }else{
         
        }
$html .=' </div>
        <div><span>Telefono</span>'.$item['telefono'];
         if($item['celular']!=""){
             $html.="<span> Celular: </span>".$item['celular'];
        }else{
         
        }

$html .=' </div>
        <div><span>Email</span> <a href="mailto:'.$item['email'].'">'.$item['email'].'</a></div><div>';
        if($item['nacionalidad']!=""){
             $html.="<span>Nacionalidad </span>".$item['nacionalidad'];
        }else{
         
        }

$html .='<span> sexo</span>'.$item['sexo'].'</div>
        <div><span>Ocupacion</span>'.$item['Ocupacion'].' </div>
        <div><span>Fecha</span> '.$item['fecha'].'</div>
      </div>';

      if($item['nacionalidad']!=""){
             $html.="<br><br><span>Otras personas </span>".$item['otros'];
        }else{
         
        }

$html .=' </header>
    <main>
    <h5>Datos del demandando</h5>
      <table>
        <thead>
          <tr>
            <th class="service"></th>
            <th class="desc"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Nombre</td>
            <td class="desc">'.$item['nombreQueja'].'</td>
          </tr>
          <tr>
            <td class="service">Dependencia</td>
            <td class="desc">'.$item['dependenciaQ'].'</td>
          </tr>
          <tr>
            <td class="service">Cargo</td>
            <td class="desc">'.$item['cargoQ'].'</td>
          </tr>
          <tr>
            <td class="service">Municipio/Suprocuraduría</td>
            <td class="desc">'.$item['municipioQ'].$item['subprocuraduria'].'</td>
          </tr>
          <tr>
            <td class="service">Descripción</td>
            <td class="desc">'.$item['descripcion'].'</td>
          </tr>
        
          
        </tbody>
      </table>
      <div id="notices">
        <div>Pruebas:'.$item['pruebas'].'</div>
        <div class="notice"></div>
      </div>
    </main>
    <footer>
     Numero de folio <b>'.$item['folio'].'</b>
    </footer>
  </body>
</html>';}

$mpdf = new \Mpdf\Mpdf();
$css = file_get_contents('css/style.css');
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html);
$mpdf->Output(); 