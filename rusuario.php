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
    $this->Cell(30,10,'Reporte de Usuarios',0,0,'C');
    $this->SetFont('Times','',8);
     $this->Cell(80,4,utf8_decode('Calle 63B #178C Por 2 y 4 Cortés Sarmiento.'),0,2,'R');
    $this->Cell(80,4,'www.servtechweb.com.mx',0,2,'R');
    $this->Cell(80,4,utf8_decode('C.P: 97168 | Ciudad: Mérida, Yucatán.'),0,2,'R');
    $this->Cell(80,4,'Tel: (99) 9340-60-73',0,2,'R');

    // Line break
     $this->SetFont('Times','B',10);
    $this->Ln(20);
    $this->setfillColor( 6, 163, 211  );
    $this->cell(10,10,'ID', 0,0,'c',true);
    $this->cell(35,10,'NickName', 0,0,'c',true);
    $this->cell(25,10,'Nombres', 0,0,'c',true);
    $this->cell(25,10,'Apellidos', 0,0,'c',true);
    $this->cell(40,10,'Correo', 0,0,'c',true);
    $this->cell(30,10,'T Usuario', 0,0,'c',true);
    $this->cell(30,10,'Telefono', 0,1,'c',true);

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
$query = "SELECT * FROM persona INNER JOIN usuariolog ON persona.idpersona = usuariolog.idpersona INNER JOIN sucursal ON sucursal.idsucursal = persona.idsucursal INNER JOIN tipousuario ON usuariolog.idtipousuario = tipousuario.idtipousuario";
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
    $pdf->cell(10,8,$row['idusuarioLog'], 0,0,'c',true);
    $pdf->cell(35,8,$row['nickName'], 0,0,'c',true);
    $pdf->cell(25,8,$row['nombres'], 0,0,'c',true);
    $pdf->cell(25,8,$row['apellidos'], 0,0,'c',true);
    $pdf->cell(40,8,$row['correo'], 0,0,'c',true);
    $pdf->cell(30,8,$row['nombreTU'], 0,0,'c',true);
    $pdf->cell(30,8,$row['telefono'], 0,1,'c',true);

    $cont = $cont + 1 ;


}
$pdf->Output();
?>