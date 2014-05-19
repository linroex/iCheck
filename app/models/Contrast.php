<?php
class Contrast extends Eloquent{
    protected $table = 'contrast';
    protected $guarded = array('id');
    public $primaryKey = 'student_id';
    public $timestamps = false;

    public static function getStudentData($stu_id){
        return self::where('student_id','=',$stu_id)->get()[0]->toArray();
    }
}