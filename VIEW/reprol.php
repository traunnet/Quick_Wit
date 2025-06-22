<?php
require('fpdf/fpdf.php');

// Definir la clase para el reporte
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../ASSETS/IMG/Personal/LennyOnline.png', 9, 8, 22);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Título
        $this->Cell(0, 10, 'Reporte de Roles', 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);
        // Encabezados de tabla
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(10, 10, 'ID', 1);
        $this->Cell(150, 10, 'Descripción', 1);
        $this->Ln();
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Página ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Incluir la conexión a la base de datos
require '../MODEL/database.php';

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Consultar los datos de roles
try {
    $pdo = (new Database())->StartUp();
    $stmt = $pdo->query("SELECT * FROM Rol");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(10, 10, $row['idRol'], 1);
        $pdf->Cell(150, 10, $row['descripcionRol'], 1);
        $pdf->Ln();
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

// Salida del PDF
$pdf->Output();
?>
