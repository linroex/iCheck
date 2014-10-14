<?php
class IndexController extends Controller{
    public function showIndex(){

        return View::make('index')->with(array(
            'login_history'=>Login::getAllRecentLoginHistory()

        ));
    }
}