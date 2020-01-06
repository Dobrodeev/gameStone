<?php
session_start();
// Подключаем библиотечный класс
include("Classes/PHPExcel.php");
$data = $_SESSION['arr'];
// Определяем массивы стилей:
//$data[1]['status'] = 'Error';
$style_arr = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THICK
        ),
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '909090')
        )
    )
);
$style_center = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);
$style_left = array(
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
);
// Создать новый массив стилей, чтобы он был таким же как в примере тестового задания
$style_ok = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '93c47d')
    )
);
$style_error = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'e06666')
    )
);
$style_header = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'a2c4c9')
    ),
    'font' => array(
        'name' => 'Arial',
        'size' => 10,
        'bold' => true,
        'italic' => false
    )
);
$style_between = array(
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'efefef'),
    )
);

$objExcel = new PHPExcel();
$objExcel->setActiveSheetIndex(0);

$active_sheet = $objExcel->getActiveSheet();
$active_sheet->setTitle("Test Table");
$active_sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$active_sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

$active_sheet->getColumnDimension('B')->setWidth(60);
$active_sheet->getColumnDimension('B')->setWidth(30);

$active_sheet->setCellValue('A1', '№');
$active_sheet->setCellValue('B1', 'Название проверки');
$active_sheet->setCellValue('C1', 'Статус');

$objExcel->getActiveSheet()->getStyle('A:C')->applyFromArray($style_center);
$objExcel->getActiveSheet()->getStyle('B')->applyFromArray($style_left);
$objExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($style_header);
$active_sheet->getStyle('1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_GENERAL);

$num_row = 2;
foreach ($data as $value) {
    $active_sheet->mergeCells('A' . $num_row . ':C' . $num_row);
    $active_sheet->getStyle('A' . $num_row . ':C' . $num_row)->applyFromArray($style_between);
    $num_row++;
    $active_sheet->getRowDimension($num_row)->setRowHeight(40);
    $active_sheet->setCellValueByColumnAndRow(0, $num_row, $value['id']);
    $active_sheet->setCellValueByColumnAndRow(1, $num_row, $value['check']);
    $active_sheet->setCellValueByColumnAndRow(2, $num_row, $value['status']);
    if ($value['status'] == 'OK') {
        $objExcel->getActiveSheet()->getStyle('C' . $num_row)->applyFromArray($style_ok);
    } else {
        $objExcel->getActiveSheet()->getStyle('C' . $num_row)->applyFromArray($style_error);
    }
    // после каждой строки результата сделать пустую строку серого цвета
    $num_row++;
}

$active_sheet->getStyle('A1:C' . ($num_row - 1))->applyFromArray($style_arr);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="our_table.xlsx"');

$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
$objWriter->save('php://output');



