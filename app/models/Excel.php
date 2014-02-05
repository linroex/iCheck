<?php
class Excel{
    private $obj;
    private $reader;
    private $filename = '';
    public function __construct($sheet_name, $author, $title){
        $this->filename = $title . 'xls';
        $this->obj = new PHPExcel();

        $this->obj->getProperties()
                  ->setCreator($author)
                  ->setTitle($title);
        
        $this->obj->setActiveSheetIndex(0)
                  ->setTitle($sheet_name);
    }
    public function readXLS($path, $width, $height){
        if(file_exists($path)){
            $this->reader = PHPExcel_IOFactory::load($path);
            $worksheet = $this->reader->getActiveSheet();
            $result = array();
            for($i = 1; $i <= $height; $i++){
                $row = array();
                for($ii = 65; $ii < $width+64; $ii++){
                    array_push($row, $worksheet->getCellByColumnAndRow(chr($ii),$i)->getValue());
                }
                array_push($result, $row);
            }
            return $result;
        }else{
            return 'This file path is error.';
        }
        
    }
    public function makeXLS($thead, $tbody){

        $path_x = 65;
        foreach ($thead as $block) {
            $this->obj->getActiveSheet()->setCellValue(chr($path_x) . '1',$block);
            $path_x++;
        }

        
        $path_y = 2;
        foreach ($tbody as $row) {
            $path_x = 65;
            foreach ($row as $block) {
                $this->obj->getActiveSheet()->setCellValue(chr($path_x) . $path_y ,$block);
                $path_x++;
            }
            $path_y++;
        }
    }

    public function download(){
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $this->filename . '"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($this->obj, 'Excel5');
        $objWriter->save('php://output');
    }
}