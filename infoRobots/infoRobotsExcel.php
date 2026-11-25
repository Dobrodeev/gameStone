<?php
session_start();

// PhpSpreadsheet устанавливается через Composer: в папке infoRobots выполнить `composer install`
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$data = $_SESSION['arr'] ?? null;
if (!$data) {
    // проверка ещё не выполнялась — возвращаем на форму
    header('Location: infoRobots.php');
    exit;
}

$fill = function ($rgb) {
    return ['fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => $rgb]]];
};
$style_ok = $fill('93c47d');
$style_error = $fill('e06666');
$style_between = $fill('efefef');
$style_header = $fill('a2c4c9') + [
    'font' => ['name' => 'Arial', 'size' => 10, 'bold' => true],
];
$style_borders = [
    'borders' => [
        'outline' => ['borderStyle' => Border::BORDER_THICK],
        'allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => '909090']],
    ],
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Test Table');
$sheet->getPageSetup()
    ->setPaperSize(PageSetup::PAPERSIZE_A4)
    ->setOrientation(PageSetup::ORIENTATION_PORTRAIT);

$sheet->getColumnDimension('A')->setWidth(6);
$sheet->getColumnDimension('B')->setWidth(60);
$sheet->getColumnDimension('C')->setWidth(15);

$sheet->fromArray(['№', 'Название проверки', 'Статус'], null, 'A1');
$sheet->getStyle('A1:C1')->applyFromArray($style_header);

$row = 2;
foreach ($data as $value) {
    // перед каждой строкой результата — пустая строка серого цвета
    $sheet->mergeCells('A' . $row . ':C' . $row);
    $sheet->getStyle('A' . $row . ':C' . $row)->applyFromArray($style_between);
    $row++;

    $sheet->getRowDimension($row)->setRowHeight(40);
    $sheet->fromArray([$value['id'], $value['check'], $value['status']], null, 'A' . $row);
    $sheet->getStyle('C' . $row)->applyFromArray($value['status'] == 'OK' ? $style_ok : $style_error);
    $row++;
}

$lastRow = $row - 1;
$sheet->getStyle('A1:C' . $lastRow)->getAlignment()
    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
    ->setVertical(Alignment::VERTICAL_CENTER);
$sheet->getStyle('B1:B' . $lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
$sheet->getStyle('A1:C' . $lastRow)->applyFromArray($style_borders);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="robots_check.xlsx"');

(new Xlsx($spreadsheet))->save('php://output');
