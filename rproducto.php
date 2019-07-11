
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
    $this->Cell(30,10,'Reporte de Productos',0,0,'C');
    $this->SetFont('Times','',8);
     $this->Cell(80,4,utf8_decode('Calle 63B #178C Por 2 y 4 Cortés Sarmiento.'),0,2,'R');
    $this->Cell(80,4,'www.servtechweb.com.mx',0,2,'R');
    $this->Cell(80,4,utf8_decode('C.P: 97168 | Ciudad: Mérida, Yucatán.'),0,2,'R');
    $this->Cell(80,4,'Tel: (99) 9340-60-73',0,2,'R');
    // Line break
     $this->SetFont('Times','B',10);
    $this->Ln(20);
    $this->setfillColor( 6, 163, 211  );
    $this->cell(50,10,'ID Producto', 0,0,'c',true);
    $this->cell(90,10,'Nombre', 0,0,'c',true);
    $this->cell(20,10,'Precio', 0,0,'c',true);
    $this->cell(30,10,'Cantidad', 0,1,'c',true);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Times','I',10);
    // Page number
    $this->Cell(0,10,utf8_decode('pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}

include('conexion.php');
$query = "SELECT * FROM producto";
$result = $mysqli->query($query);
$cont = 0;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->setfillColor( 240, 252, 255 );

while ($row = $result->fetch_assoc()) {
     if ($cont %2 == 0) {
       $pdf->setfillColor( 240, 252, 255 );
    }
    else{
       $pdf->setfillColor( 255, 255, 255 );
    }
    $pdf->cell(50,10,$row['idproducto'], 0,0,'c',true);
    $pdf->cell(90,10,$row['nombrePD'], 0,0,'c',true);
    $pdf->cell(20,10,$row['precioPD'], 0,0,'c',true);
    $pdf->cell(30,10,$row['cantidad'], 0,1,'c',true);
    $cont = $cont + 1 ;

}
$pdf->Output();
?>