<?php
class UserController extends Controller{
    public function test(){
         // $user = new user();
        user::addUser();

        var_dump(user::count());
        // return '123';
    }
}