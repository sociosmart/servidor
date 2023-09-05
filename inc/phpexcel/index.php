<?php
session_start();
include("../../conexion.php");
require_once('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
if(!isset($_SESSION['Cve_Usuario']))
  { 
     echo "<script>window.location='login.php?opc=1';</script>"; 
  }
  else
  { 
/* Start to develop here. Best regards https://php-download.com/ */

    



$spreadsheet = new Spreadsheet();

//Specify the properties for this document
$spreadsheet->getProperties()
    ->setTitle('PHP Download Example')
    ->setSubject('A PHPExcel example')
    ->setDescription('A simple example for PhpSpreadsheet. This class replaces the PHPExcel class')
    ->setCreator('php-download.com')
    ->setLastModifiedBy('php-download.com');

//Adding data to the excel sheet
    $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Folio')
            ->setCellValue('B1', 'Nombre')
            ->setCellValue('C1', 'Celular')
            ->setCellValue('D1', 'Fecha Generado')
            ->setCellValue('E1', 'Nombre Generado')
            ->setCellValue('F1', 'Estacion')
            ->setCellValue('G1', 'Tipo Movimiento')
            ->setCellValue('H1', 'Material')
            ->setCellValue('I1', 'Peso Gramos')
            ->setCellValue('J1', 'Precio Kilo')
            ->setCellValue('K1', 'Puntos');


$F_inicial=$_GET['F_inicial'];
$F_Final=$_GET['F_Final'];
      
$cont=1;
  
           $rs2= $conexion->Execute("SELECT * FROM puntosverdesacumulacioneslista where  F_Alta>='$F_inicial' and F_Alta<='$F_Final'");
          
                while (!$rs2->EOF) {    
                     if($rs2!=null){
              $cont=$cont+1;
         if($rs2->fields["TipoMovimiento"]==1)
         {
             $TipoMovimiento="Acumulacion";
             $PUNTOS=($rs2->fields["PrecioKilo"]/1000)*$rs2->fields["Cantidad"];
             $cantidad=$rs2->fields["Cantidad"];
             $PrecioKilo=$rs2->fields["PrecioKilo"];
             $Material=$rs2->fields["Material"];
        }else{
            $TipoMovimiento="Canje";
            $PUNTOS=$rs2->fields["Cantidad"];
            $cantidad="";
            $PrecioKilo="";
            $Material="";
         }

$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A'.$cont, $rs2->fields["Cve_puntosverdes_acumulaciones"])
->setCellValue('B'.$cont, utf8_encode($rs2->fields["Nombre"].' '.$rs2->fields["Ap_Paterno"].' '.$rs2->fields["Ap_Materno"]))
->setCellValue('C'.$cont, $rs2->fields["Telefono"])
->setCellValue('D'.$cont, $rs2->fields["F_Alta"])
->setCellValue('E'.$cont, utf8_encode($rs2->fields["NombreU"].' '.$rs2->fields["AP_PaternoU"].' '.$rs2->fields["AP_MaternoU"]))
->setCellValue('F'.$cont, $rs2->fields["NombreComercial"])
->setCellValue('G'.$cont, $TipoMovimiento)
->setCellValue('H'.$cont, $Material)
->setCellValue('I'.$cont, $cantidad)
->setCellValue('J'.$cont, $PrecioKilo)
->setCellValue('K'.$cont, $PUNTOS);
  $rs2->MoveNext();
      }
  }



$spreadsheet->getActiveSheet()->setTitle('Movimientos');

for($col = 'A'; $col !== 'Z'; $col++) {
    $spreadsheet->getActiveSheet(0)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}
$spreadsheet->getActiveSheet(0)->getStyle("A1:K1")->getFont()->setBold(true);



    date_default_timezone_set('America/Mazatlan');
    $fecha=date(DATE_ATOM);
    
    $F_inicialcorta=substr($fecha,0,10);
$NombreArchivo='Reciclaje '.$F_inicialcorta;

$writer = IOFactory::createWriter($spreadsheet, "Xls"); //Xls is also possible
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$NombreArchivo.'.xls"');
$writer->save("php://output");
        }