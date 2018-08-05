<?php
session_start();
        //echo "Наш новый тестовый файл!<br>";
        // Подключаем библиотечный класс
        include("Classes/PHPExcel.php");
/**
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
*/
        $data = $_SESSION['arr'];
        // Определяем массивы стилей:

         $style_arr = array(
             'borders'=>array(
                 'outline'=>array(
                     'style'=> PHPExcel_Style_Border::BORDER_THICK
                 ),
                 'allborders'=>array(
                     'style'=> PHPExcel_Style_Border::BORDER_THIN,
                     'color'=>array('rgb'=>'909090')
                 )
             ),
             'alignment'=>array(
                 'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                 'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
             ),
             'font'=>array(
                 'name'=>'Times New Roman',
                 'size'=>14,
                 'italic'=>true
             )
         );
        $style_ok = array(
            'fill'=>array(
                'type'=> PHPExcel_Style_Fill::FILL_SOLID,
                'color'=>array('rgb'=>'33FF33')
            )
        );


        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        //$objExcel->createSheet();

        $active_sheet = $objExcel->getActiveSheet();
        $active_sheet->setTitle("Test Table");
        $active_sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
        $active_sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

        $active_sheet->mergeCells('A1:C1');

        $active_sheet->getColumnDimension('B')->setWidth(80);
        $active_sheet->getRowDimension('1')->setRowHeight(30);

        $active_sheet->getStyle('C')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);


        $active_sheet->setCellValue('A1', 'Результат тестирования robots.txt:');
        $active_sheet->setCellValue('A2', 'id');
        $active_sheet->setCellValue('B2', 'check');
        $active_sheet->setCellValue('C2', 'status');
//        $active_sheet->setCellValue('D2', 'price');

        $num_row = 3;
        foreach ($data as $value)
        {
            $active_sheet->setCellValueByColumnAndRow(0, $num_row , $value['id']);
            $active_sheet->setCellValueByColumnAndRow(1, $num_row , $value['check']);
            $active_sheet->setCellValueByColumnAndRow(2, $num_row , $value['status']);
//            $active_sheet->setCellValueByColumnAndRow(3, $num_row , $value['price']);
            //$active_sheet->getStyle('D'.$num_row)->applyFromArray($style_ok);
            $num_row++;
        }



        $active_sheet->getStyle('A1:C'.($num_row-1))->applyFromArray($style_arr);


        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename='our_table.xlsx'");

        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');



