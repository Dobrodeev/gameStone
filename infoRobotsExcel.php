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
        $data[1]['status'] = 'Error';
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
                 'name'=>'Calibri',
                 'size'=>11,
                 'italic'=>true
             )
         );
         // Создать новый массив стилей, чтобы он был таким же как в примере тестового задания
         /**
         'font'=>array(
    'bold'=>true,
    'italic'=>true,
          */
        $style_ok = array(
            'fill'=>array(
                'type'=> PHPExcel_Style_Fill::FILL_SOLID,
                'color'=>array('rgb'=>'33FF33')
            )
        );
        $style_error = array(
            'fill'=>array(
                'type'=> PHPExcel_Style_Fill::FILL_SOLID,
                'color'=>array('rgb'=>'f48642')
            )
        );
        $style_between = array(
            'fill'=>array(
                'type'=> PHPExcel_Style_Fill::FILL_PATTERN_DARKDOWN,
                'color'=>array('rgb'=>'8b008b')
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
//            $objExcel->getActiveSheet()->getStyle('A-C', ++$num_row)->applyFromArray($style_between);
            if ($value['status'] == 'OK')
            {
                $objExcel->getActiveSheet()->getStyle('C'.$num_row)->applyFromArray($style_ok);
            }
            else
            {
                $objExcel->getActiveSheet()->getStyle('C'.$num_row)->applyFromArray($style_error);
            }
            // после каждой строки результата сделать пустую строку серого цвета
//            $active_sheet->setCellValueByColumnAndRow(3, $num_row , $value['price']);
            //$active_sheet->getStyle('D'.$num_row)->applyFromArray($style_ok);
            $num_row++;
        }
//        $active_sheet->getStyle();
        $active_sheet->getStyle('A1:C'.($num_row-1))->applyFromArray($style_arr);
        //$objExcel->getActiveSheet()->getStyle('C3:C8')->applyFromArray($style_ok);
        //$objExcel->getActiveSheet()->getStyle('C7:C8')->applyFromArray($style_error);

        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename='our_table.xlsx'");

        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');



