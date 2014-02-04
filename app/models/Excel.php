<?php
class Excel{
    private $obj;
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