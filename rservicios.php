<?php
require('reportes/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('reportes/Imagen/logo.png',5,6,40);
    // Arial bold 15
    $this->SetFont('Times','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Reporte de Servicios',0,0,'C');
    $this->SetFont('Times','',8);
     $this->Cell(80,4,utf8_decode('Calle 63B #178C Por 2 y 4 Cortés Sarmiento.'),0,2,'R');
    $this->Cell(80,4,'www.servtechweb.com.mx',0,2,'R');
    $this->Cell(80,4,utf8_decode('C.P: 97168 | Ciudad: Mérida, Yucatán.'),0,2,'R');
    $this->Cell(80,4,'Tel: (99) 9340-60-73',0,2,'R');

    // Line break
     $this->SetFont('Times','B',10);
    $this->Ln(20);
    $this->setfillColor( 6, 163, 211  );
    $this->cell(10,10,'', 0,0,'c');
    $this->cell(10,10,'ID', 0,0,'c',true);
    $this->cell(35,10,'T Servicios', 0,0,'c',true);
    $this->cell(45,10,'Nombre Servicio', 0,0,'c',true);
    $this->cell(40,10,'Descripcion', 0,0,'c',true);
    $this->cell(30,10,'Empleado', 0,1,'c',true);


}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

include('conexion.php');
 $query = "SELECT * FROM servicio INNER JOIN empleado ON servicio.idempleado = empleado.idempleado INNER JOIN persona ON empleado.idpersona = persona.idpersona INNER JOIN tiposervicio ON servicio.idtiposervicio = tiposervicio.idtiposervicio ";
$result = $mysqli->query($query);
$result = $mysqli->query($query);

$cont = 0;
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->setfillColor( 240, 252, 255 );

while ($row = $result->fetch_assoc()) {
    if ($cont %2 == 0) {
       $pdf->setfillColor( 240, 252, 255 );
    }
    else{
       $pdf->setfillColor( 255, 255, 255 );
    }
    $pdf->cell(10,10,'', 0,0,'c');
    $pdf->cell(10,8,$row['idservicio'], 0,0,'c',true);
    $pdf->cell(35,8,$row['nombreTS'], 0,0,'c',true);
    $pdf->cell(45,8,$row['nombreSV'], 0,0,'c',true);
    $pdf->cell(40,8,$row['descripcionSV'], 0,0,'c',true);
    $pdf->cell(10,8,$row['nombres'], 0,0,'c',true);
    $pdf->cell(10,8,$row['apellidos'], 0,1,'c',true);

    $cont = $cont + 1 ;


}
$pdf->Output();
?>