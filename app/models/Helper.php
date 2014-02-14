<?php
class Helper{
    public static function convert_card_id($card_id){
        return DB::select('select student_id from contrast where card_id = ? limit 1',array($card_id))[0]->student_id;
    }
}