<?php
require('fpdf186/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Write(10, 'Đơn hàng của bạn gồm có:');
$pdf->Ln(10);

$width_cell = array(5, 35, 80, 20, 30, 40);

$pdf->Cell($width_cell[0], 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($width_cell[1], 10, 'Mã hàng', 1, 0, 'C', true);
$pdf->Cell($width_cell[2], 10, 'Tên sản phẩm', 1, 0, 'C', true);
$pdf->Cell($width_cell[3], 10, 'Số lượng', 1, 0, 'C', true);
$pdf->Cell($width_cell[4], 10, 'Giá', 1, 0, 'C', true);
$pdf->Cell($width_cell[5], 10, 'Tổng tiền', 1, 1, 'C', true);
$pdf->SetFillColor(235, 236, 236);
$fill = false;
$i = 0;
while ($row = mysqli_fetch_array($query_lietke_dh)) {
    $i++;
    $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['code_cart'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[2], 10, $row['tensanpham'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $row['soluongmua'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, number_format($row['giasp']), 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[5], 10, number_format($row['soluongmua'] * $row['giasp']), 1, 1, 'C', $fill);
    $fill = !$fill;
}
$pdf->Write(10, 'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
$pdf->Ln(10);
$pdf->Output();
