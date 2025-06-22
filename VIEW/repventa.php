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
        $this->Cell(0, 10, 'Reporte de Ventas', 0, 1, 'C');
        // Salto de línea
        $this->Ln(10);
        // Encabezados de tabla
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 5, 'ID', 1);
        $this->Cell(50, 5, 'Categoria', 1);
        $this->Cell(40, 5, 'Nombre.Pro', 1);
        $this->Cell(20, 5, 'Valor unt', 1);
        $this->Cell(20, 5, 'cantidad', 1);
        $this->Cell(20, 5, 'valor.t', 1);
        $this->Cell(30, 5, 'etd.producto', 1);
    
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
$pdf->SetFont('Arial', '', 9);


try {
    $pdo = (new Database())->StartUp();
    $stmt = $pdo->query("SELECT * FROM Venta");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $pdf->Cell(10, 10, $row['idVenta'], 1);
        $pdf->Cell(50, 10, $row['categoria'], 1);
        $pdf->Cell(40, 10, $row['nombreProducto'], 1);
        $pdf->Cell(20, 10, $row['valorUnitario'], 1);
        $pdf->Cell(20, 10, $row['cantidad'], 1);
        $pdf->Cell(20, 10, $row['valorTotal'], 1);
        $pdf->Cell(30, 10, $row['estadoProducto'], 1);
        $pdf->Cell(30, 10, $row['idProducto'], 1);
        $pdf->Ln();
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

// Salida del PDF
$pdf->Output();
?>
