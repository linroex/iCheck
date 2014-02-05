<?php
class ActivityCheck extends Eloquent{
    protected $table = 'activity_check';
    protected $guarded = array('cid');
    public $primaryKey = 'cid';
    public $timestamps = false;
}