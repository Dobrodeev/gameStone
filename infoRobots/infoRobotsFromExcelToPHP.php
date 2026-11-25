<?php

declare(strict_types=1);

// Пример выгрузки массива PHP в таблицу Excel с помощью PhpSpreadsheet.
// Перед запуском в папке infoRobots выполнить `composer install`.
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

final readonly class Car
{
    public function __construct(
        public int $id,
        public string $title,
        public string $model,
        public int $price,
    ) {
    }

    /** @return list<int|string> */
    public function toRow(): array
    {
        return [$this->id, $this->title, $this->model, $this->price];
    }
}

$cars = [
    new Car(id: 1, title: 'bmw', model: '323', price: 5670),
    new Car(id: 2, title: 'bmw', model: '525', price: 12670),
    new Car(id: 3, title: 'audi', model: 'A6', price: 8570),
    new Car(id: 4, title: 'vaz', model: '2106', price: 800),
];

$tableStyle = [
    'borders' => [
        'outline' => ['borderStyle' => Border::BORDER_THICK],
        'allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => '909090']],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
    'font' => [
        'name' => 'Times New Roman',
        'size' => 14,
        'italic' => true,
    ],
];

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Test Table');
$sheet->getPageSetup()
    ->setPaperSize(PageSetup::PAPERSIZE_A4)
    ->setOrientation(PageSetup::ORIENTATION_PORTRAIT);

$sheet->mergeCells('A1:D1');
$sheet->getRowDimension(1)->setRowHeight(30);
$sheet->setCellValue('A1', 'Наша таблица:');
$sheet->fromArray(['id', 'title', 'model', 'price'], null, 'A2');

// модель храним как текст, чтобы "2106" не превратилось в число
$sheet->getStyle('C')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);

$row = 3;
foreach ($cars as $car) {
    $sheet->fromArray($car->toRow(), null, 'A' . $row, true);
    $sheet->setCellValueExplicit('C' . $row, $car->model, DataType::TYPE_STRING);
    $row++;
}

foreach (['A', 'B', 'C', 'D'] as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}
$sheet->getStyle('A1:D' . ($row - 1))->applyFromArray($tableStyle);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="our_table.xlsx"');

(new Xlsx($spreadsheet))->save('php://output');
