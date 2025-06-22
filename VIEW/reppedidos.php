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
        $this->Cell(60, 25, 'Reporte Pedidos', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
        // Encabezados de tabla
        $this->Cell(10, 15, 'idP', 1, 0, 'c');
        $this->Cell(50, 15, 'FePed', 1, 0, 'c');
        $this->Cell(30, 15, 'CantPed', 1, 0, 'c');
        $this->Cell(30, 15, 'UniPed', 1, 0, 'c');
        $this->Cell(30, 15, 'PedDom', 1, 0, 'c');
        $this->Cell(40, 15, 'IdPro', 1, 1, 'c');
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

// Asegúrate de que los nombres de las columnas son correctos
$consulta = "SELECT idPedido, fechaPedido, cantidadPedido, valorUnitarioPedido, estadoPedido, idProducto FROM Pedido";
$resultado = $mysqli->query($consulta);

if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(10, 10, $row['idPedido'], 1, 0, 'c');
    $pdf->Cell(50, 10, $row['fechaPedido'], 1, 0, 'c');
    $pdf->Cell(30, 10, $row['cantidadPedido'], 1, 0, 'c');
    $pdf->Cell(30, 10, $row['valorUnitarioPedido'], 1, 0, 'c');
    $pdf->Cell(30, 10, $row['estadoPedido'], 1, 0, 'c');
    $pdf->Cell(40, 10, $row['idProducto'], 1, 1, 'c');
}

$pdf->Output();
?>
