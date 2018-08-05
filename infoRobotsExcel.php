<?php
session_start();
// Подключаем библиотечный класс
include("Classes/PHPExcel.php");
//        include 'infoRobots.php';
//require_once 'infoRobots.php';

        $data = array(
	array(
		'id' => 1,
		'title' => 'bmw',
		'model' => '323',
		'price' => 5670
		 ),
	array(
		'id' => 2,
		'title' => 'bmw',
		'model' => '525',
		'price' => 12670
		 ),
	array(
		'id' => 3,
		'title' => 'audi',
		'model' => 'A6',
		'price' => 8570
		 ),
	array(
		'id' => 4,
		'title' => 'vaz',
		'model' => '2106',
		'price' => 800
		 )
	);
        
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        //$objExcel->createSheet();
        
        $active_sheet = $objExcel->getActiveSheet();
        $active_sheet->setTitle("Test Table");
        $active_sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $active_sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
         
        $active_sheet->mergeCells('A1:D1');
        
        $active_sheet->getColumnDimension('A')->setWidth(3);
        
        $active_sheet->setCellValue('A1', 'Наша таблица:');
        $active_sheet->setCellValue('A2', 'id');
        $active_sheet->setCellValue('B2', 'title');
        $active_sheet->setCellValue('C2', 'model');
        $active_sheet->setCellValue('D2', 'price');
        
        $num_row = 3;
        foreach ($data as $value) 
        {
            $active_sheet->setCellValueByColumnAndRow(0, $num_row , $value['id']);
            $active_sheet->setCellValueByColumnAndRow(1, $num_row , $value['title']);
            $active_sheet->setCellValueByColumnAndRow(2, $num_row , $value['model']);
            $active_sheet->setCellValueByColumnAndRow(3, $num_row , $value['price']);
            $num_row++;
        }

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename='our_table.xlsx'");
        
        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->setReadDataOnly(true);
        $objWriter->save('php://output');

if (isset($_POST['go']))
{
    echo "Наш новый тестовый файл!<br>";

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
/**
    $arrayResult = array(
        array('id'=>1, 'check'=>'Проверка наличия файла robots.txt', 'status'=>$_POST['proverca0']),
        array('id'=>2, 'check'=>'Проверка указания директивы Host', 'status'=>$_POST['proverca1']),
        array('id'=>3, 'check'=>'Проверка количества директив Host, прописанных в файле', 'status'=>$_POST['proverca2']),
        array('id'=>4, 'check'=>'Проверка размера файла robots.txt', 'status'=>$_POST['proverca3']),
        array('id'=>5, 'check'=>'Проверка указания директивы Sitemap', 'status'=>$_POST['proverca4']),
        array('id'=>6, 'check'=>'Проверка кода ответа сервера для файла robots.txt', 'status'=>$_POST['proverca5'])
    );
*/
//    echo '<pre>';
//    print_r($_SESSION['arr']);
//    echo '</pre>';
    $forExcel = $_SESSION['arr'];
    echo '<pre>';
    print_r($forExcel);
    echo '</pre>';
}
