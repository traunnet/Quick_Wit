<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../ASSETS/IMG/Personal/LennyOnline.png', 9, 8, 22);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(60, 25, 'Reporte Domicilios', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
        // Encabezados de tabla
        $this->Cell(20, 15, 'ID', 1, 0, 'C');
        $this->Cell(40, 15, 'Hora', 1, 0, 'C');
        $this->Cell(40, 15, 'Estado', 1, 0, 'C');
        $this->Cell(30, 15, 'ID Usuario', 1, 1, 'C');
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 12);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

require '../MODEL/bd.php';

// Consulta a la base de datos
$consulta = "SELECT idDomicilio, horaDomicilio, estadoDomicilio, idUsuario FROM Domicilio";
$resultado = $mysqli->query($consulta);

if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(20, 10, $row['idDomicilio'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['horaDomicilio'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['estadoDomicilio'], 1, 0, 'C');
    $pdf->Cell(30, 10, $row['idUsuario'], 1, 1, 'C');
}

$pdf->Output();
?>
