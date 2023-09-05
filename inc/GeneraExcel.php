<?php
session_start();
 include('../headerinc.php'); 

date_default_timezone_set('America/Mazatlan');
    $fecha=date(DATE_ATOM);
    $gruposeleccionado="";
    $F_inicialcorta=substr($fecha,0,10);
    $F_Finalcorta=substr($fecha,0,10);
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/excel/Classes/PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("German Felix")
							 ->setLastModifiedBy("German Felix")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Reciclaje desgloce ")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Desgloce por fecha de acumulaciones y canjes");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
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

// Miscellaneous glyphs, UTF-8


    $F_inicial=$_GET['F_inicial'];
    $F_Final=$_GET['F_Final'];
      
$cont=1;
  
           $rs2= $conexion->Execute("SELECT * FROM puntosverdesacumulacioneslista where Estacion='$Estacion' and F_Alta>='$F_inicial' and F_Alta<='$F_Final'");
          



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

$objPHPExcel->setActiveSheetIndex(0)
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




// Nombre de Libro
$objPHPExcel->getActiveSheet()->setTitle('Movimientos');

for($col = 'A'; $col !== 'Z'; $col++) {
    $objPHPExcel->getActiveSheet(0)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}
$objPHPExcel->getActiveSheet(0)->getStyle("A1:K1")->getFont()->setBold(true);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
$NombreArchivo='Reciclaje '.$F_inicialcorta;
header('Content-Disposition: attachment;filename="'.$NombreArchivo.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
//exit; 

